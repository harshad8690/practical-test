<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BranchTime;

class WeekDay extends Model
{
    use HasFactory;

    protected $fillable = ['day_name'];

    public function branch_time()
    {
        return $this->hasMany(BranchTime::class);
    }
}
