<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announced_lga_results extends Model
{
    use HasFactory;
    protected $table = "announced_lga_results";

    protected $primaryKey = "result_id";

    protected  $fillable =[
        'lga_name',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];
}
