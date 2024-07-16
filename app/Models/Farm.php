<?php

namespace App\Models;

use App\Models\City;
use App\Models\Farmer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class farm extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'farms';
    protected $fillable = ['name',	'city_id',	'size'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function farmers()
    {
       return $this->hasMany(Farmer::class);
    }
    public function delete()
    {
        $this->farmers()->delete();
        parent::delete();
    }
    public function farm_crops()
    {
        return $this->hasMany(FarmCrop::class);
    }
}
