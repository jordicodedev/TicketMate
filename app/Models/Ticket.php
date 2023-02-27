<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['summary', 'description', 'status', 'assigned_to'];

    /**
     * Get the status that the ticket belongs to.
     */
    public function status()
    {
        return $this->belongsTo(TicketStatus::class);
    }
}
