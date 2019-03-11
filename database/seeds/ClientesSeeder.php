<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('clientes')->insert([
            'Nombre' => 'Nestle España SA',
            'Email' => 'nestle@nestle.es',
            'Telefono' => '934805100',
            'Direccion' => 'CALLE CLARA CAMPOAMOR, 2.',
            'NIFCIF' => 'A08005449',
            'Provincia' => 'Barcelona',
            'Localidad' => 'Esplugues de Llobregat',
            'CP' => '08950',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('clientes')->insert([
            'Nombre' => 'Renault España SA',
            'Email' => 'renault@renault.com',
            'Telefono' => '983416000',
            'Direccion' => 'AVENIDA DE MADRID Nº 72',
            'NIFCIF' => 'A47000518',
            'Provincia' => 'Valladolid',
            'Localidad' => 'Valladolid',
            'CP' => '47008',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('clientes')->insert([
            'Nombre' => 'Mapfre España Compañia de Seguros y Reaseguros SA',
            'Email' => 'renault@renault.com',
            'Telefono' => '915811828',
            'Direccion' => 'CTRA POZUELO, 50',
            'NIFCIF' => 'A28141935',
            'Provincia' => 'MADRID',
            'Localidad' => 'MAJADAHONDA',
            'CP' => '28222',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
