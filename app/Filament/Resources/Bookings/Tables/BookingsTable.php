<?php

namespace App\Filament\Resources\Bookings\Tables;

use App\Models\Booking;
use App\Notifications\BookingPaymentLinkNotification;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref_num')
                    ->label('Reference')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->tooltip('Click to copy')
                    ->weight('bold'),
                TextColumn::make('user.first_name')
                    ->label('Customer')
                    ->formatStateUsing(fn ($record) => $record->user ? $record->user->first_name . ' ' . $record->user->last_name : 'N/A')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->limit(30),
                TextColumn::make('room')
                    ->label('Room Type')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('checkin')
                    ->label('Check-in')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('checkout')
                    ->label('Check-out')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->label('Payment')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid', 'successful' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => ucfirst($state ?? 'pending'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('viewDetails')
                    ->label('View')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading(fn (Booking $record) => 'Booking #' . $record->ref_num)
                    ->modalContent(fn (Booking $record) => view('filament.resources.bookings.view-booking', ['record' => $record]))
                    ->modalWidth('3xl')
                    ->slideOver()
                    ->modalFooterActions(fn (Booking $record) => [
                        // Send Payment Link button (only for unpaid bookings)
                        $record->isPending() 
                            ? Action::make('sendPaymentLink')
                                ->label('Send Payment Link')
                                ->icon('heroicon-o-envelope')
                                ->color('success')
                                ->requiresConfirmation()
                                ->modalHeading('Send Payment Link')
                                ->modalDescription(fn (Booking $record) => 
                                    'A payment link will be sent to ' . $record->user?->email . '. The customer will receive an email with instructions to complete their booking payment.'
                                )
                                ->modalSubmitActionLabel('Send Link')
                                ->action(function (Booking $record) {
                                    try {
                                        // Check if user exists
                                        if (!$record->user) {
                                            \Filament\Notifications\Notification::make()
                                                ->danger()
                                                ->title('User Not Found')
                                                ->body('The booking does not have an associated user.')
                                                ->send();
                                            return;
                                        }

                                        // Check if email exists
                                        if (!$record->user->email) {
                                            \Filament\Notifications\Notification::make()
                                                ->danger()
                                                ->title('Email Not Found')
                                                ->body('The user does not have an email address.')
                                                ->send();
                                            return;
                                        }

                                        // Check if Paystack is configured
                                        if (!config('services.paystack.secret_key')) {
                                            \Filament\Notifications\Notification::make()
                                                ->danger()
                                                ->title('Paystack Not Configured')
                                                ->body('Please configure Paystack in your environment settings.')
                                                ->send();
                                            return;
                                        }

                                        $paymentLink = $record->generatePaystackPaymentLink();
                                        
                                        if ($paymentLink) {
                                            $record->user->notify(new BookingPaymentLinkNotification($record, $paymentLink));
                                            
                                            \Filament\Notifications\Notification::make()
                                                ->success()
                                                ->title('Payment Link Sent!')
                                                ->body('The payment link has been successfully sent to ' . $record->user->email)
                                                ->send();
                                        } else {
                                            \Filament\Notifications\Notification::make()
                                                ->danger()
                                                ->title('Failed to Generate Payment Link')
                                                ->body('Unable to generate payment link. Please try again or contact support.')
                                                ->send();
                                        }
                                    } catch (\Exception $e) {
                                        \Filament\Notifications\Notification::make()
                                            ->danger()
                                            ->title('Error')
                                            ->body('An unexpected error occurred. Please try again.')
                                            ->send();
                                        
                                        Log::error('Payment link send error', [
                                            'booking_id' => $record->id,
                                            'error' => $e->getMessage()
                                        ]);
                                    }
                                })
                            : null,
                        
                        // Close button
                        Action::make('close')
                            ->label('Close')
                            ->color('gray')
                            ->modalCancelAction(),
                    ])->modalSubmitAction(false),
            ])
            ->defaultSort('created_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50, 100]);
    }
}
