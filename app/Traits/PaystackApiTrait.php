<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

trait PaystackApiTrait
{
    protected string $baseUri;
    protected string $paystack_verify;
    protected array $headers;

    /**
     * Initialize Paystack configuration
     */
    protected function initializePaystack(): void
    {
        $secretKey = config('services.paystack.secret_key');
        
        if (empty($secretKey)) {
            throw new \RuntimeException('Paystack secret key is not configured');
        }
        
        $baseUrl = config('services.paystack.url', 'https://api.paystack.co');
        $this->baseUri = $baseUrl . '/transaction/initialize';
        $this->paystack_verify = $baseUrl . '/transaction/verify';
        
        $this->headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $secretKey,
        ];
    }

    /**
     * Make API call to external service
     */
    public function callApi(array $headers, string $requestUrl, string $method, ?array $formParams = null): \stdClass
    {
        try {
            $http = Http::withHeaders($headers);

            // Make the request based on the method
            $response = match (strtoupper($method)) {
                'POST' => $http->post($requestUrl, $formParams),
                'GET' => $http->get($requestUrl, $formParams),
                'PUT' => $http->put($requestUrl, $formParams),
                'DELETE' => $http->delete($requestUrl, $formParams),
                default => throw new \InvalidArgumentException("Unsupported HTTP method: {$method}"),
            };

            // Get response body
            $responseBody = $response->body();

            if ($response->successful()) {
                return json_decode($responseBody);
            }

            // Only log errors in non-production or for critical status codes
            if (!app()->environment('production') || $response->status() >= 500) {
                Log::error("API Request Failed [{$method} {$requestUrl}]", [
                    'status_code' => $response->status(),
                    'error' => substr($responseBody, 0, 500) // Limit error message length
                ]);
            }

            return (object)[
                'status' => false,
                'msg' => 'API request failed',
                'error' => $responseBody,
                'status_code' => $response->status()
            ];
        } catch (\InvalidArgumentException $e) {
            Log::error("Invalid Argument: " . $e->getMessage());
            return (object)[
                'status' => false,
                'msg' => 'Invalid request: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            Log::error("API Request Error [{$method} {$requestUrl}]: " . $e->getMessage());
            return (object)[
                'status' => false,
                'msg' => 'API request failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Process Paystack payment initialization
     */
    protected function initializePaystackPayment(array $data): \stdClass
    {
        $this->initializePaystack();

        $total = $data['amount'] * 100; // Convert to kobo
        $ref_no = $data['reference'];
        $email = $data['email'];
        $callback_url = $data['callback_url'] ?? route('callback');

        $fields_string = [
            'amount' => $total,
            'email' => $email,
            'reference' => $ref_no,
            'callback_url' => $callback_url,
            'metadata' => [
                'booking_id' => $data['booking_id'] ?? null,
                'custom_fields' => [
                    [
                        'display_name' => 'Booking Reference',
                        'variable_name' => 'booking_reference',
                        'value' => $ref_no
                    ]
                ]
            ]
        ];

        $transaction = $this->callApi($this->headers, $this->baseUri, 'POST', $fields_string);

        if (isset($transaction->status) && $transaction->status == true) {
            return (object)[
                'status' => true,
                'authorization_url' => $transaction->data->authorization_url,
                'reference' => $ref_no,
                'access_code' => $transaction->data->access_code ?? null
            ];
        } else {
            return (object)[
                'status' => false,
                'msg' => $transaction->msg ?? 'Payment initialization failed, try again'
            ];
        }
    }
}
