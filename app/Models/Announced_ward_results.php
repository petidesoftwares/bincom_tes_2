<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announced_ward_results extends Model
{
    use HasFactory;
    protected $table = "announced_ward_results";
    protected $primaryKey = "result_id";

    protected $fillable = [
        'ward_name',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];
}
