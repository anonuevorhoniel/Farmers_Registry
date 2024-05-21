<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class farm extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'farms';
    protected $fillable = ['name',	'location',	'size',	'crop_type'];
}
