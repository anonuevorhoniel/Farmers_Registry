<?php

namespace App\Models;

use App\Models\Farm;
use App\Models\Farmer;
use App\Models\AssistanceHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cities';
    protected $fillable = ['name', 'area_code'];

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    public function farmers()
    {
        return $this->hasManyThrough(Farmer::class, Farm::class);

    }
    public function assistanceHistory()
    {
        return $this->hasManyThrough(AssistanceHistory::class, Farmer::class);
    }
    public function delete()
    {
        $this->farms()->each(function ($farm) {
            $farm->farmers()->each(function ($farmer) {
                $farmer->assistanceHistory()->delete();
            });
            $farm->farmers()->delete();
        });
        $this->farms()->delete();
        return parent::delete();
    }

}
