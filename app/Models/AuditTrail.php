<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditTrail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'audit_trails';
    protected $fillable = ['user_id',	'user_name', 'table',	'action',	'date'	];
}
