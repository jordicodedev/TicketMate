<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'New',
                'description' => 'A new request has been submitted'
            ],
            [
                'name' => 'In Progress',
                'description' => 'The request is actively being worked on by one of the team members'
            ],
            [
                'name' => 'Blocked',
                'description' => 'The person working on the ticket is at a stopping point waiting for some action to occur before continuing working on the request'
            ],
            [
                'name' => 'Resolved',
                'description' => 'The request has been completed and no more work is required'
            ],
            [
                'name' => 'Closed',
                'description' => 'The request has been validated to be closed'
            ],
       ];

       foreach ($statuses as $status) {
            TicketStatus::create($status);
       }
    }
}
