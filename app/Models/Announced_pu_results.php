<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announced_pu_results extends Model
{
    use HasFactory;
    protected $table = "announced_pu_results";
    protected $primaryKey ="result_id";
//    protected $dates =['date_entered'];
    public $timestamps = false;

    protected $fillable = [
        'polling_unit_uniqueid',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];
}
