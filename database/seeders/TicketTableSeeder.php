<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Little test to check the ticket seed is working
        $ticket1 = new Ticket;
        $ticket1->summary = "Test";
        $ticket1->description = "Description Lorem ipsum";
        $ticket1->status = "New";
        $ticket1->assigned_to = "";
        $ticket1->save();
    }
}
