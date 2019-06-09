<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reactie extends Model
{
    protected $table = 'reactie_tabel';

    protected $fillable = [
        'reactie',
        'project_id',
        'user_id',
    ];

    public function users(){
        return $this->hasOne('App\User');
    }
}
