<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TokenControllerTest extends TestCase
{
    public function testNewToken()
    {
        //Given
        $applicationSid = config('services.twilio')['applicationSid'];
        $mockToken = 'th1stot3satok3n';

        $mockTwilioCapability = Mockery::mock('Services_Twilio_Capability')
                              ->makePartial();
        $mockTwilioCapability
            ->shouldReceive('allowClientOutgoing')
            ->with($applicationSid);

        $mockTwilioCapability
            ->shouldNotReceive('allowClientIncoming')
            ->with('customer');

        $mockTwilioCapability
            ->shouldReceive('allowClientIncoming')
            ->with('support_agent');

        $mockTwilioCapability
            ->shouldReceive('generateToken')
            ->andReturn($mockToken);

        $this->app->instance(
            'Services_Twilio_Capability',
            $mockTwilioCapability
        );

        // When
        $newTokenResponse = $this->call(
            'POST',
            route('new-token'),
            ['forPage' => route('dashboard', [], false)]
        );

        // Then
        $newToken = json_decode($newTokenResponse->getContent());
        $this->assertEquals(
            $mockToken,
            $newToken->token
        );
    }
}
