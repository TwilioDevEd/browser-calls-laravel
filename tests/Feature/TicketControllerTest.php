<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Ticket;

class TicketControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateNewTicket()
    {
        // Given
        $this->startSession();
        $validPhoneNumber = '+15558180101';
        $this->assertCount(0, Ticket::all());

        // When
        $response = $this->call(
            'POST',
            route('new-ticket'),
            ['name' => 'Customer name',
             'phone_number' => $validPhoneNumber,
             'description' => 'I lost my ability to even',
             '_token' => csrf_token()]
        );

        // Then
        $this->assertCount(1, Ticket::all());
        $ticket = Ticket::first();

        $this->assertEquals($ticket->name, 'Customer name');
        $this->assertEquals($ticket->phone_number, $validPhoneNumber);
        $this->assertEquals($ticket->description, 'I lost my ability to even');

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('status');

        $flashMessage = $this->app['session']->get('status');
        $this->assertEquals(
            $flashMessage,
            "We've received your support ticket. We'll be in touch soon!"
        );
    }

    public function testPhoneNumberValidation()
    {
        // Given
        $this->startSession();
        $invalidPhoneNumber = '5558180';

        // When
        $response = $this->call(
            'POST',
            route('new-ticket'),
            ['name' => 'Customer name',
             'phone_number' => $invalidPhoneNumber,
             'description' => 'I lost my ability to even',
             '_token' => csrf_token()]
        );

        // Then
        $flashMessage = $this
            ->app['session']
            ->get('errors')
            ->getBag('default')
            ->get('phone_number');

        $this->assertEquals(
            ['The phone number must be in E.164 format'],
            $flashMessage
        );
        $this->assertCount(0, Ticket::all());
    }
}
