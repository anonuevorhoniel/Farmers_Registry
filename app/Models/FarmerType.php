<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmerType extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'farmer_types';
    protected $fillable = ['name'];
}
