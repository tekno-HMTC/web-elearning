<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modul_id','syarat_modul_id',
    ];

    /**
     * One to Many relationship
     */
    public function modul(){
        return $this->belongsTo('App\Modul');
    }
}
