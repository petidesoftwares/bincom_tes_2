<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $primaryKey = "state_id";

    protected $fillable = [
        'state_id',
        'state_name'
    ];
}
