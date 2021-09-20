<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(UsuarioSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(TipoCuentaSeeder::class);
        $this->call(ResidenciasSeeder::class);
        $this->call(ProveedoresSeeder::class);

    }
}
