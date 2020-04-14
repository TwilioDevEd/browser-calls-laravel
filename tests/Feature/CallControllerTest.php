<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CallControllerTest extends TestCase
{
    public function testNewCallWithPhoneNumber()
    {
        // Given
        $fakeCustomerNumber = '+15558736333';

        // When
        $response = $this->call(
            'POST',
            route('new-call'),
            ['phoneNumber' => $fakeCustomerNumber]
        );
        $responseDocument = new \SimpleXMLElement($response->getContent());

        // Then
        $this->assertNotNull($responseDocument->Dial);
        $this->assertNotNull($responseDocument->Dial->Number);
        $this->assertEquals(
            $fakeCustomerNumber,
            $responseDocument->Dial->Number
        );
        $this->assertEquals(
            $responseDocument->Dial->attributes()['callerId'],
            config('services.twilio')['number']
        );
    }

    public function testNewCallWithoutPhoneNumber()
    {
        // When
        $response = $this->call(
            'POST',
            route('new-call')
        );
        $responseDocument = new \SimpleXMLElement($response->getContent());

        // Then
        $this->assertNotNull($responseDocument->Dial);
        $this->assertNotNull($responseDocument->Dial->Client);
        $this->assertEquals('support_agent', $responseDocument->Dial->Client);
        $this->assertEquals(
            $responseDocument->Dial->attributes()['callerId'],
            config('services.twilio')['number']
        );
    }
}
