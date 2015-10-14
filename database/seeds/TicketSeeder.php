<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Ticket(
            ['name' => 'Charles Holdsworth',
             'phone_number' => '+14153674129',
             'description' => 'I played for Middlesex in the championships and my ' .
                              'mallet squeaked the whole time! I demand a refund!']
        ))->save();

        (new Ticket(
            ['name' => 'John Woodger',
             'phone_number' => '+15712812415',
             'description' => 'The mallet you sold me broke! Call me immediately!']
        ))->save();
    }
}
