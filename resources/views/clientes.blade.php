<!doctype <!DOCTYPE html>
<html>
<head>
    @include('includes.head')
    <title>Vista - Clientes</title>
</head>
<body style="margin:2%; background-image:url('https://i2.wp.com/www.reginaldchan.net/wp-content/uploads/2018/01/How_To_Become_A_Web_Designer.jpg');">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <h1 class="display-3" style="text-shadow: 2px 2px 2px #000000; color:white;">Clientes</h1>
    </div>
</div>

<div class="row">
    <div class="col-12" style="background-color:white;padding:2%; border:1px solid;">
        <h2>Listado de Clientes</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" style="border:1px solid;">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Cod. Cliente</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Fecha Modificación</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">NIF/CIF</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">C.P</th>
                </tr>
                </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cristian</td>
                            <td>ncristiansalinasandia@gmail.com</td>
                            <td>665353444</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <br>
        <button type="button" class="btn btn-success">Agregar Cliente</button>
    </div>
    </div>
</div>

    
</body>
</html>