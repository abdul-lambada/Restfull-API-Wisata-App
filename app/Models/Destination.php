<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'destinations';
    protected $fillable = [
        'name',
        'description',
        'location',
        'latitude',
        'longitude',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
