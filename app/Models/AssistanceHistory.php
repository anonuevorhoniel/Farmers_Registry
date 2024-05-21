<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssistanceHistory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'assistance_histories';
    protected $fillable = ['farmer_id',	'assistance_id', 'given_date'];
        public function assistance()
        {
            return $this->belongsTo(Assistance::class);
        }
        public function farmer()
        {   
            return $this->belongsTo(Farmer::class);
        }
    }
