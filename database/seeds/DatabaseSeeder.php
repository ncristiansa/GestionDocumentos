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
        $this->truncateTables([
            'clientes'
        ]);

        $this->call(ClientesSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Quitará el proceso de restriccion de claves foraneas
        foreach ($tables as $table) 
        {
            DB::table($table)->truncate(); // Vaciará la tabla clientes
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Activará el proceso de restriccion de claves foraneas
    }
}
