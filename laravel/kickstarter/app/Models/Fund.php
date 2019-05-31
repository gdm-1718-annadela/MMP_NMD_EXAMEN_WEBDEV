<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = 'fund_tabel';

    protected $fillable = [
        'bedrag',
        'user_id',
        'project_id',
        'user_name',
    ];
}
