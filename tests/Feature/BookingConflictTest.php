<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingConflictTest extends TestCase
{
    use RefreshDatabase;

    public function test_approving_booking_updates_unit_status_to_booked_for_rent_listing(): void
    {
        $unit = Unit::create([
            'name' => 'Unit Test Rent',
            'type' => 'studio',
            'tower' => 'A',
            'floor' => '10',
            'room_number' => '101',
            'size_sqm' => 30,
            'price' => 5000000,
            'listing_type' => 'rent',
            'status' => 'available',
        ]);

        $user = User::factory()->create();

        $booking = Booking::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking->update(['status' => 'approved']);

        $this->assertEquals('booked', $unit->fresh()->status);
    }

    public function test_approving_booking_updates_unit_status_to_sold_for_sell_listing(): void
    {
        $unit = Unit::create([
            'name' => 'Unit Test Sell',
            'type' => 'studio',
            'tower' => 'A',
            'floor' => '10',
            'room_number' => '102',
            'size_sqm' => 30,
            'price' => 500000000,
            'listing_type' => 'sell',
            'status' => 'available',
        ]);

        $user = User::factory()->create();

        $booking = Booking::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking->update(['status' => 'approved']);

        $this->assertEquals('sold', $unit->fresh()->status);
    }

    public function test_approving_booking_auto_rejects_other_pending_bookings_for_same_unit(): void
    {
        $unit = Unit::create([
            'name' => 'Unit Test Conflict',
            'type' => 'studio',
            'tower' => 'A',
            'floor' => '10',
            'room_number' => '103',
            'size_sqm' => 30,
            'price' => 5000000,
            'listing_type' => 'rent',
            'status' => 'available',
        ]);

        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();

        $booking1 = Booking::create([
            'user_id' => $user1->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking2 = Booking::create([
            'user_id' => $user2->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking3 = Booking::create([
            'user_id' => $user3->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking1->update(['status' => 'approved']);

        $this->assertEquals('approved', $booking1->fresh()->status);
        $this->assertEquals('rejected', $booking2->fresh()->status);
        $this->assertEquals('rejected', $booking3->fresh()->status);

        $this->assertEquals('Unit sudah disetujui untuk booking lain.', $booking2->fresh()->admin_note);
        $this->assertEquals('Unit sudah disetujui untuk booking lain.', $booking3->fresh()->admin_note);
    }

    public function test_reverting_approved_booking_status_makes_unit_available_again(): void
    {
        $unit = Unit::create([
            'name' => 'Unit Test Revert',
            'type' => 'studio',
            'tower' => 'A',
            'floor' => '10',
            'room_number' => '104',
            'size_sqm' => 30,
            'price' => 5000000,
            'listing_type' => 'rent',
            'status' => 'available',
        ]);

        $user = User::factory()->create();

        $booking = Booking::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'status' => 'pending',
        ]);

        $booking->update(['status' => 'approved']);
        $this->assertEquals('booked', $unit->fresh()->status);

        $booking->update(['status' => 'pending']);
        $this->assertEquals('available', $unit->fresh()->status);
    }

    public function test_deleting_approved_booking_makes_unit_available_again(): void
    {
        $unit = Unit::create([
            'name' => 'Unit Test Delete',
            'type' => 'studio',
            'tower' => 'A',
            'floor' => '10',
            'room_number' => '105',
            'size_sqm' => 30,
            'price' => 5000000,
            'listing_type' => 'rent',
            'status' => 'available',
        ]);

        $user = User::factory()->create();

        $booking = Booking::create([
            'user_id' => $user->id,
            'unit_id' => $unit->id,
            'status' => 'approved',
        ]);

        $booking->delete();

        $this->assertEquals('available', $unit->fresh()->status);
    }
}
