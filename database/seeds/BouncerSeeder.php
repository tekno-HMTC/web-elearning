<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;
use Illuminate\Foundation\Auth\User;

class BouncerSeeder extends Bouncer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bouncer_admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Admin',
        ]);
        $bouncer_admin_komunitas = Bouncer::role()->firstOrCreate([
            'name' => 'admin-komunitas',
            'title' => 'Admin Komunitas',
        ]);
        $bouncer_user = Bouncer::role()->firstOrCreate([
            'name' => 'user',
            'title' => 'User',
        ]);
        $bouncer_crud_user = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-users',
            'title' => 'Buat, edit, hapus user',
        ]);
        $bouncer_crud_komunitas = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-komunitas',
            'title' => 'Buat, edit, hapus komunitas',
        ]);
        $bouncer_crud_member = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-komunitas',
            'title' => 'Buat, edit, hapus komunitas',
        ]);
        $bouncer_crud_modul = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-modul',
            'title' => 'Buat, edit, hapus modul',
        ]);
        $bouncer_use_komunitas = Bouncer::ability()->firstOrCreate([
            'name' => 'use-komunitas',
            'title' => 'Lihat, berpartisipasi dalam komunitas',
        ]);
        $bouncer_use_modul = Bouncer::ability()->firstOrCreate([
            'name' => 'use-modul',
            'title' => 'Lihat, berpartisipasi dalam modul',
        ]);

        Bouncer::allow($bouncer_admin)->to($bouncer_crud_komunitas);
        Bouncer::allow($bouncer_admin)->to($bouncer_crud_user);
        Bouncer::allow($bouncer_admin_komunitas)->to($bouncer_crud_modul);
        Bouncer::allow($bouncer_admin_komunitas)->to($bouncer_crud_member);
        Bouncer::allow($bouncer_user)->to($bouncer_use_komunitas);
        Bouncer::allow($bouncer_user)->to($bouncer_use_modul);

        $user = User::find(1);
        $user->assign($bouncer_admin);
    }
}
