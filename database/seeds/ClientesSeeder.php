<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\registro;
use App\VentaModel;
class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $localidades = array(
            0 => 'Granollers',
            1 => 'Hospitalet',
            2 => 'Rubi',
            3 => 'Barcelona',
            4 => 'Sant Boi',
            5 => 'Manresa',
            6 => 'Molins de Rei'
        );
        $nombres = array(
            0 => 'MERCADONA SA',
            1 => 'REPSOL PETROLEO SA',
            2 => 'COMPAÑIA ESPAÑOLA DE PETROLEOS SAU',
            3 => 'REPSOL COMERCIAL DE PRODUCTOS PETROLIFEROS SA',
            4 => 'CEPSA TRADING SAU',
            5 => 'ENDESA ENERGIA SAU',
            6 => 'EL CORTE INGLES SA',
            7 => 'INDUSTRIA DE DISEÑO TEXTIL SA',
            8 => 'SEAT SA',
            9 => 'FORD ESPAÑA SL',
            10 => 'IBM GLOBAL SERVICES REDES DE ORDENADORES Y SERVICIOS SA',
            11 => 'SYNCREON SPAIN SA.',
            12 => '3GH INFORMATICA INTEGRAL SL',
            13 => 'CENTRO DE REPARACIONES INFORMATICAS SL',
            14 => 'DIGWIND SOCIEDAD LIMITADA.',
            15 => 'TKT SERVICIOS INFORMATICOS SOCIEDAD LIMITADA.',
            16 => 'AL-TEC REDES Y SISTEMAS SL',
            17 => 'CONDIS SA',
            18 => 'DIA SA'
        );
        $cp = array(
            0 => '08231',
            1 => '08960',
            2 => '08332',
            3 => '08196',
            4 => '08541',
            5 => '08657',
            6 => '08196',
            7 => '08541',
            8 => '08231',
            9 => '08750',
            10 => '08657',
            11 => '08960',
            12 => '08541',
            13 => '08657',
            14 => '08332',
            15 => '08196',
            16 => '08694',
            17 => '05874',
            18 => '08578'

        );
        $telefonos = array(
            0 => '932713658',
            1 => '932208483',
            2 => '932204086',
            3 => '932711185',
            4 => '932712924',
            5 => '932712921',
            6 => '936854854',
            7 => '934587144',
            8 => '934458778',
            9 => '934111125',
            10 => '934458778',
            11 => '936554874',
            12 => '935521478',
            13 => '937844544',
            14 => '936658877',
            15 => '936521547',
            16 => '934121458',
            17 => '936654858',
            18 => '936622544'
        );
        $nif = array(
            0 => '55429536L',
            1 => '73812205F',
            2 => '77832482E',
            3 => '63508986Y',
            4 => '89447918K',
            5 => '20328169X',
            6 => '99938627Q',
            7 => '55562783G',
            8 => '47612498Z',
            9 => '52158494Z',
            10 => '08049118S',
            11 => '52282227F',
            12 => '72832512E',
            13 => '37121229B',
            14 => '38172335V',
            15 => '68870171Y',
            16 => '12353522S',
            17 => '57287125J',
            18 => '99163405D',
        );
        $mails = array(
            1 => 'merk@gmail.com',
            2 => 'alboc@outlook.com',
            3 => 'mlg@gmail.es',
            4 => 'ppxt@yahoo.es',
            5 => 'bbc@yahoo.com',
            6 => 'sav@gmail.com',
            7 => 'gfdf@outlook.com',
            8 => 'qert@gmail.es',
            9 => 'astor@outlook.es',
            10 => 'umibony-5373@outlook.com',
            11 => 'ixynnajo-3733@gmail.com',
            12 => 'aperraruv-9683@outlook.com',
            13 => 'elleffodduw-7908@yahoo.es',
            14 => 'oxekupin-7189@gmail.com',
            15 => 'ginnawosunnu-9176@outlook.com',
            16 => 'oloxivy-1500@outlook.com',
            17 => 'empresa@outlook.com',
            18 => 'tcc@outlook.com'
        );
        $calles = array(
            0 => 'Calle de Alcalá',
            1 => 'Calle de Balmes',
            2 => 'Ronda de San Pedro',
            3 => 'Calle de Muntaner',
            4 => 'Avenida de Sarriá',
            5 => 'Calle de Sants',
            6 => 'Avenida Valencia',
            7 => 'Calle San Pere',
            8 => 'Avenida San Quire',
            9 => 'Calle Srt. Rosa',
            10 => 'Calle Les Corsts',
            11 => 'Calle Sant Marío',
            12 => 'Av. Carril',
            13 => 'Calle Tintoré',
            14 => 'Calle Francisco 14',
            15 => 'Av. Barceló',
            16 => 'Calle de los caidos',
            17 => 'Calle Agustí',
            18 => 'Calle Esteban',
        );
        for ($i=1; $i<18; $i++){
            $rand_localidades = rand(0,6);
            $localidad_escogida = $localidades[$rand_localidades];
            $rand_nombres = rand(0,16);
            $nombre_escogido = $nombres[$rand_nombres];
            $rand_cp = rand(0,16);
            $cp_escogido = $cp[$rand_cp];
            $rand_telefono = rand(0,16);
            $telefono_escogido = $telefonos[$rand_telefono];
            $rand_calle = rand(0,16);
            $calle_escogida = $calles[$rand_calle];
            registro::create([
                'Nombre' 		=>	$nombre_escogido,
                'Email'		=>      $mails[$i],
                'Telefono'		=>	$telefono_escogido,
                'Direccion'		=>	$calle_escogida,
                'NIFCIF'	=>	    $nif[$i],
                'Provincia'		=>	'Barcelona',
                'Localidad'		=>	$localidad_escogida,
                'CP'		=>	    $cp_escogido,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        for($i=1; $i<20; $i++){
            $id_cliente = rand(1,16);
            $estadorandom = rand(0,1);
            $estado = '';
            if($estadorandom == 0){
                $estado = "No Activo";
            }
            else if($estadorandom == 1){
                $estado = "Activo";
            }
            VentaModel::create([
                'id_cliente' => $id_cliente,
                'Comprador' => 'venta'.$i,
                'nombreVentas' => 'Ejemplo Nombre venta'.$i,
                'Estado' => $estado,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        /*
        DB::table('ventas')->insert([
            'id_cliente' => '1',
            'Comprador' => 'Nestle',
            'nombreVentas' => 'Venta1',
            'Estado'=>'Activo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        */
        // Tabla clientes seedeS
    }
        
}
/**
 *         DB::table('ventas')->insert([
            'id_cliente' => '1',
            'Comprador' => 'Nestle',
            'nombreVentas' => 'Venta1',
            'Estado'=>'Activo',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
 */