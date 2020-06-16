<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;

use Tests\TestCase;

class TokenControllerTest extends TestCase
{
    public function testNewToken()
    {
        //Given
        $applicationSid = config('services.twilio')['applicationSid'];
        $mockToken = 'th1stot3satok3n';

        $mockVoiceGrant = Mockery::mock(VoiceGrant::class)
            ->makePartial();
        $mockVoiceGrant
            ->shouldReceive('setOutgoingApplicationSid')
            ->with($applicationSid);
        $mockVoiceGrant
            ->shouldReceive('setIncomingAllow')
            ->with(true);

        $mockTwilioCapability = Mockery::mock(AccessToken::class)
            ->makePartial();
        $mockTwilioCapability
            ->shouldReceive('addGrant')
            ->with($mockVoiceGrant);

        $mockTwilioCapability
            ->shouldReceive('toJWT')
            ->andReturn($mockToken);

        $this->app->instance(
            AccessToken::class,
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
        
        $newTokenResponse->assertSee('token', true);
        $this->assertEquals(
            $mockToken,
            $newToken->token
        );
    }
}
