<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    /**
     * Get the tickets associated with this status.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'status');
    }
}
