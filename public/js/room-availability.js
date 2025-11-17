/**
 * Room Availability Helper
 * Provides functions to check room availability on the frontend
 */
class RoomAvailabilityChecker {
    constructor() {
        this.baseUrl = '/api/rooms';
        this.cache = new Map();
        this.cacheTimeout = 5 * 60 * 1000; // 5 minutes
    }

    /**
     * Check availability for specific room type
     */
    async checkRoomAvailability(roomGroupId, checkin, checkout, numRooms = 1) {
        const cacheKey = `${roomGroupId}-${checkin}-${checkout}-${numRooms}`;
        
        // Check cache first
        if (this.cache.has(cacheKey)) {
            const cached = this.cache.get(cacheKey);
            if (Date.now() - cached.timestamp < this.cacheTimeout) {
                return cached.data;
            }
        }

        try {
            const response = await fetch(`${this.baseUrl}/check-availability`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    room_group_id: roomGroupId,
                    checkin: checkin,
                    checkout: checkout,
                    num_of_rooms: numRooms
                })
            });

            const data = await response.json();
            
            // Cache the result
            this.cache.set(cacheKey, {
                data: data,
                timestamp: Date.now()
            });

            return data;
        } catch (error) {
            console.error('Error checking availability:', error);
            return {
                available: false,
                message: 'Error checking availability. Please try again.',
                available_rooms: 0
            };
        }
    }

    /**
     * Get all available rooms for date range
     */
    async getAllAvailableRooms(checkin, checkout) {
        try {
            const response = await fetch(`${this.baseUrl}/available?checkin=${checkin}&checkout=${checkout}`);
            const result = await response.json();
            
            if (result.success) {
                return result.data;
            } else {
                throw new Error(result.message || 'Failed to fetch available rooms');
            }
        } catch (error) {
            console.error('Error fetching available rooms:', error);
            return [];
        }
    }

    /**
     * Validate booking before submission
     */
    async validateBooking(roomName, checkin, checkout, numRooms) {
        try {
            const response = await fetch(`${this.baseUrl}/validate-booking`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({
                    room: roomName,
                    checkin: checkin,
                    checkout: checkout,
                    num_of_rooms: numRooms
                })
            });

            return await response.json();
        } catch (error) {
            console.error('Error validating booking:', error);
            return {
                success: false,
                message: 'Error validating booking. Please try again.'
            };
        }
    }

    /**
     * Update room selection dropdown based on availability
     */
    async updateRoomOptions(checkin, checkout) {
        const availableRooms = await this.getAllAvailableRooms(checkin, checkout);
        const roomSelect = document.querySelector('#room-select');
        
        if (roomSelect && availableRooms) {
            // Clear existing options except the first one
            roomSelect.innerHTML = '<option value="">Select a room type</option>';
            
            availableRooms.forEach(room => {
                const option = document.createElement('option');
                option.value = room.name;
                option.textContent = `${room.name} - ₦${room.price.toLocaleString()} (${room.available_rooms} available)`;
                option.dataset.maxRooms = room.max_bookable;
                roomSelect.appendChild(option);
            });
        }

        return availableRooms;
    }

    /**
     * Validate form before submission
     */
    async validateForm(formData) {
        const validation = await this.validateBooking(
            formData.room,
            formData.checkin,
            formData.checkout,
            formData.num_of_rooms
        );

        if (!validation.success) {
            this.showError(validation.message);
            return false;
        }

        return true;
    }

    /**
     * Show error message to user
     */
    showError(message) {
        // Create or update error alert
        let errorDiv = document.querySelector('#availability-error');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.id = 'availability-error';
            errorDiv.className = 'alert alert-danger mt-3';
            
            const form = document.querySelector('form');
            if (form) {
                form.insertBefore(errorDiv, form.firstChild);
            }
        }
        
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
        
        // Hide after 5 seconds
        setTimeout(() => {
            errorDiv.style.display = 'none';
        }, 5000);
    }

    /**
     * Show success message to user
     */
    showSuccess(message) {
        let successDiv = document.querySelector('#availability-success');
        if (!successDiv) {
            successDiv = document.createElement('div');
            successDiv.id = 'availability-success';
            successDiv.className = 'alert alert-success mt-3';
            
            const form = document.querySelector('form');
            if (form) {
                form.insertBefore(successDiv, form.firstChild);
            }
        }
        
        successDiv.textContent = message;
        successDiv.style.display = 'block';
        
        // Hide after 3 seconds
        setTimeout(() => {
            successDiv.style.display = 'none';
        }, 3000);
    }
}

// Initialize the availability checker
const roomAvailability = new RoomAvailabilityChecker();

// Example usage for booking form
document.addEventListener('DOMContentLoaded', function() {
    const checkinInput = document.querySelector('#checkin');
    const checkoutInput = document.querySelector('#checkout');
    const roomSelect = document.querySelector('#room-select');
    const numRoomsInput = document.querySelector('#num-of-rooms');
    const bookingForm = document.querySelector('#booking-form');

    // Update available rooms when dates change
    if (checkinInput && checkoutInput) {
        const updateAvailability = async () => {
            const checkin = checkinInput.value;
            const checkout = checkoutInput.value;
            
            if (checkin && checkout && new Date(checkin) < new Date(checkout)) {
                await roomAvailability.updateRoomOptions(checkin, checkout);
            }
        };

        checkinInput.addEventListener('change', updateAvailability);
        checkoutInput.addEventListener('change', updateAvailability);
    }

    // Validate number of rooms when room or quantity changes
    if (roomSelect && numRoomsInput) {
        const validateRoomQuantity = async () => {
            const selectedOption = roomSelect.querySelector('option:checked');
            const maxRooms = selectedOption ? parseInt(selectedOption.dataset.maxRooms || 1) : 1;
            const requestedRooms = parseInt(numRoomsInput.value || 1);
            
            if (requestedRooms > maxRooms) {
                numRoomsInput.value = maxRooms;
                roomAvailability.showError(`Maximum ${maxRooms} rooms available for this room type.`);
            }
        };

        roomSelect.addEventListener('change', validateRoomQuantity);
        numRoomsInput.addEventListener('change', validateRoomQuantity);
    }

    // Validate form before submission
    if (bookingForm) {
        bookingForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {
                room: formData.get('selected_room_input') || formData.get('room'),
                checkin: formData.get('checkin'),
                checkout: formData.get('checkout'),
                num_of_rooms: parseInt(formData.get('num_of_rooms'))
            };

            const isValid = await roomAvailability.validateForm(data);
            
            if (isValid) {
                // Submit the form
                this.submit();
            }
        });
    }
});

// Make it globally available
window.roomAvailability = roomAvailability;