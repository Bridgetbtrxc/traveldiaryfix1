<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['id','title', 'description', 'amount', 'expense_date', 'itinerary_id', 'user_id'];

    public function getItinerary()
    {
        return $this->belongsTo(Itinerary::class);
    }
}
