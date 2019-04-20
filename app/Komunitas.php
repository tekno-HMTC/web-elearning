<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komunitas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'deskripsi',
    ];

    /**
     * Many to one relationship
     *
     * 
     */

    public function pengumuman()
    {
        return $this->hasMany('App\Pengumuman');
    }

    /**
     * Many to one relationship
     *
     * 
     */

    public function modul()
    {
        return $this->hasMany('App\Modul');
    }

    /**
     * Many to many relationship
     *
     * 
     */

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('status');
    }
}
