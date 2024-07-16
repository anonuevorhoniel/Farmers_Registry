<?php

namespace App\Models;

use App\Models\Farm;
use App\Models\FarmerType;
use App\Models\AssistanceHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class farmer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'farmers';
    protected $fillable = ['first_name',	'middle_name',	'last_name',	'name_extension',	'birth_date',	'birth_place',	'sex',	'contact_number',	'other_information',	'farm_id',	'farmer_type_id'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function farmerType()
    {
        return $this->belongsTo(FarmerType::class);
    }

    public function assistanceHistory()
    {
        return $this->hasMany(AssistanceHistory::class);
    }
}
