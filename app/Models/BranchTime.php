<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchTime extends Model
{
    use HasFactory;
    
    protected $fillable = ['branch_id', 'week_day_id', 'start_time', 'end_time'];
}
