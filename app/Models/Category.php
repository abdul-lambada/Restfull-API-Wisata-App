<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
