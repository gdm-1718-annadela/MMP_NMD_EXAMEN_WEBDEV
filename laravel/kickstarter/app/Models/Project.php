<?php

namespace App\Models;
use App\Models\Categorie;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project_tabel';

    protected $fillable = [
        'naam',
        'uitleg',
        'credits_doelbedrag',
        'gepubliceerd_tot',
        'user_id',
        'categorie_id',
        'minimumbedrag',
        'minimumsouvenir',
        'maximumbedrag',
        'maximumsouvenir',
        'kijker',
    ];

    public function categorie(){
        return $this->hasOne('App\Models\Categorie');
    }

    public function user(){
        return $this->hasOne('App\User');
    }

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }

    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public function reactions() {
        return $this->hasMany('App\Models\Reactie');
    }

}
