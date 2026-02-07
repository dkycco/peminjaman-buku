<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $anggota = Role::create(['name' => 'anggota']);

        Permission::create(['name' => 'mengelola buku']);
        Permission::create(['name' => 'mengelola anggota']);
        Permission::create(['name' => 'mengelola transaksi']);
        Permission::create(['name' => 'buat transaksi']);
        Permission::create(['name' => 'lihat transaksi']);

        $admin->givePermissionTo(Permission::all());

        $anggota->givePermissionTo([
            'mengelola transaksi',
            'lihat transaksi'
        ]);

        $admin_01 = User::create([
            'nama' => 'Diki Muhamad Alfikri',
            'email' => 'dikimuhamad525@gmail.com',
            'password' => bcrypt('12345')
        ]);

        $admin_01->assignRole('admin');
    }
}
