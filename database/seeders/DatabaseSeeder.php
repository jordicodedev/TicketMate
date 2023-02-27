<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Generate 5 users from the factory method
        User::factory(5)->create();

        //Generate TicketStatus using the Seeder class
        $this->call([
            TicketStatusSeeder::class
        ]);

        //Generate 20 tickets from the factory method
        Ticket::Factory(20)->create();
    }
}
