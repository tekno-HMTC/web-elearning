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
        $user_modul_collection = User::find(Auth::user()->id)->modul;
        $this_modul_syarat_collection = $this->syarat;
        foreach ($this_modul_syarat_collection as $modul_iterator) {
            if (!$user_modul_collection->contains('md_id', $modul_iterator->syarat_modul_id))
                return false;
        }
        return true;
    }
}
