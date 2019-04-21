<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;
use App\User;

class BouncerSeeder extends Seeder
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
        $bouncer_crud_user = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-admin-komunitas',
            'title' => 'Angkat, turunkan admin komunitas',
        ]);
        $bouncer_crud_komunitas = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-komunitas',
            'title' => 'Buat, edit, hapus komunitas',
        ]);
        $bouncer_crud_modul = Bouncer::ability()->firstOrCreate([
            'name' => 'crud-modul',
            'title' => 'Buat, edit, hapus modul',
        ]);

        Bouncer::allow('admin')->to('crud-admins');
        Bouncer::allow('admin')->to('crud-komunitas');
        Bouncer::allow('admin')->to('crud-user');
        Bouncer::allow('admin')->to('crud-admin-komunitas');

        $user = User::find(1);
        $user->assign('admin');
        $user->assign('user');
    }
}
