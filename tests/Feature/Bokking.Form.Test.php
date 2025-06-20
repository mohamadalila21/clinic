<?php

namespace Tests\Feature;

use Tests\TestCase;

class BookingFormTest extends TestCase
{
    public function test_booking_form_requires_name_and_email()
    {
        $response = $this->post('/booked', []);

        $response->assertSessionHasErrors(['name', 'email']);
    }
}


