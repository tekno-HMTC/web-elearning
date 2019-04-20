<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'komunitas_id', 'nama', 'konten', 'tgl_tampil', 'tgl_selesai',
    ];

    /**
     * Convert dates attribute into carbon instances
     */
    protected $dates = [
        'tgl_tampil', 'tgl_selesai',
    ];

    /**
     * One to Many relationship
     */
    public function komunitas()
    {
        return $this->belongsTo('App\Komunitas');
    }
}
