<?php

namespace App\Models;

use App\Models\User;
use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'reviews';
    protected $fillable = [
        'destination_id',
        'user_id',
        'comment',
        'rating',
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
