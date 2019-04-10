<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'komunitas_id','nama', 'konten', 'submit'
    ];

    /**
     * Many to One relationship
     */
    public function syarat(){
        return $this->hasMany('App\Syarat');
    }

    /**
     * Many to Many relationship
     */
    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('attachment');
    }
}
