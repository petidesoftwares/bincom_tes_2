<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announced_state_results extends Model
{
    use HasFactory;
    protected $table = "announced_state_results";
    protected $primaryKey ="result_id";

    protected $fillable = [
        'state_name',
        'party_abbreviation',
        'party_score',
        'entered_by_user',
        'date_entered',
        'user_ip_address'
    ];
}
