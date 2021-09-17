<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table ="agentname";
    protected $primaryKey = "name_id";

    protected $fillable =[
        'firstname',
        'lastname',
        'email',
        'phone',
        'pullingunit_uniqueid'
    ];
}
