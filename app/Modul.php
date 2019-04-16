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
        'komunitas_id', 'nama', 'konten', 'submit'
    ];

    /**
     * Many to One relationship
     * @return tabel SYARAT
     */
    public function syarat()
    {
        return $this->hasMany('App\Syarat');
    }

    /**
     * Many to Many relationship
     * @return tabel USER
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('attachment');
    }

    /**
     * Menentukan apakah modul ini sudah dapat diikuti oleh user
     *
     * @return boolean
     */
    public function isUnlocked()
    {
        $modulCollection = User::find(Auth::user()->id)->modul;
        $modulSyaratCollection = $this->syarat;
        foreach ($modulSyaratCollection as $modul_iterator) {
            if (!$modulCollection->contains('md_id', $modul_iterator->syarat_modul_id))
                return false;
        }
        return true;
    }
}
