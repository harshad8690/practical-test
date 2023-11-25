<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['business_id', 'week_day_id', 'name'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
