<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itinerary extends Model
{
    use HasFactory;
    protected $fillable = ['id','title', 'description', 'start_date', 'end_date','user_id'];

    // Define the relationship with User model
    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getExpenses()
    {
        return $this->hasMany(Expense::class);
    }

}

class ItineraryPolicy
{
    public function create(User $user)
    {
        // Allow any authenticated user to create an itinerary
        return $user->exists;
    }
}

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Itinerary::class => ItineraryPolicy::class,
    ];

    // Other code...
}
