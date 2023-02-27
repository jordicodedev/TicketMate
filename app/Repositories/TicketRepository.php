<?php

namespace App\Repositories;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketRepository
{
    public function countAssignedTicketsByStatus($userName, $status)
    {
        return Ticket::where('assigned_to', $userName)
            ->where('status', $status)
            ->count();
    }

    public function countAssignedTicketsByAllStatuses($userName)
    {
        return Ticket::where('assigned_to', $userName)->count();
    }
}
