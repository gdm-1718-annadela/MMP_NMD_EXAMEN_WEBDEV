<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='image_tabel';

    protected $fillable = [
        'path',
        'caption',
        'title',
        'product_id',
    ];
    public function projects() {
        return $this->hasOne('App\Models\Project');
    }
}
