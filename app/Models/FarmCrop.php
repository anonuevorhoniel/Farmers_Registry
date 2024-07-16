<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FarmCrop extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'farm_crops';
    protected $fillable = ['farm_id', 'crop_id'];

    public function crop()
    {
       return $this->belongsTo(CropType::class);
    }
}
