<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminlogin=[
            [
                'nama' => 'adminegc',
                'nim' => '10101010',
                'nohp' => '080000000',
                'pekerjaan' => 'Staff',
                'fakultas' => 'Saintek',
                'email' => 'adminegc@gmail.com',
                'password' => bcrypt('adminegc'),
                'role' => 'admin'
            ],
            [
                'nama' => 'ketuaegc',
                'nim' => '2020202020',
                'nohp' => '080000000',
                'pekerjaan' => 'Staff',
                'fakultas' => 'Saintek',
                'email' => 'ketua@gmail.com',
                'password' => bcrypt('ketua'),
                'role' => 'ketua'
            ],
            [
                'nama' => 'timegc',
                'nim' => '3030303030',
                'nohp' => '080000000',
                'pekerjaan' => 'Staff',
                'fakultas' => 'Saintek',
                'email' => 'tim@gmail.com',
                'password' => bcrypt('tim'),
                'role' => 'tim'
            ],
            // [
            //     'nama' => 'Isma Shafira',
            //     'nim' => '1930803070',
            //     'nohp' => '081239288012',
            //     'pekerjaan' => 'Mahasiswa',
            //     'fakultas' => 'Saintek',
            //     'email' => '1930803070@radenfatah.ac.id',
            //     'password' => bcrypt('12345'),
            //     'role' => 'user'
            // ],
           ];
    
           foreach ($adminlogin as $key =>$val){
                User::create($val);
           }
    }
}
