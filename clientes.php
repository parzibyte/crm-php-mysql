<?php
/*

  ____          _____               _ _           _       
 |  _ \        |  __ \             (_) |         | |      
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___ 
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |        
        |___/                               |___/         
    
____________________________________
/ Si necesitas ayuda, contáctame en \
\ https://parzibyte.me               /
 ------------------------------------
        \   ^__^
         \  (oo)\_______
            (__)\       )\/\
                ||----w |
                ||     ||
Creado por Parzibyte (https://parzibyte.me).
------------------------------------------------------------------------------------------------
            | IMPORTANTE |
Si vas a borrar este encabezado, considera:
Seguirme: https://parzibyte.me/blog/sigueme/
Y compartir mi blog con tus amigos
También tengo canal de YouTube: https://www.youtube.com/channel/UCroP4BTWjfM0CkGB6AFUoBg?sub_confirmation=1
Twitter: https://twitter.com/parzibyte
Facebook: https://facebook.com/parzibyte.fanpage
Instagram: https://instagram.com/parzibyte
Hacer una donación vía PayPal: https://paypal.me/LuisCabreraBenito
------------------------------------------------------------------------------------------------
*/ ?>
<?php
include_once "encabezado.php";
include_once "funciones.php";
if (!isset($_GET["busqueda"]) || empty($_GET["busqueda"])) {
    $clientes = obtenerClientes();
} else {
    $clientes = buscarClientes($_GET["busqueda"]);
}
?>
<div class="row">
    <div class="col-12">
        <h1>Clientes</h1>
        <a href="formulario_agregar_cliente.php" class="btn btn-success mb-2">Agregar</a>
        <form action="clientes.php">
            <div class="form-row align-items-center">
                <div class="col-6 my-1">
                    <input value="<?php echo isset($_GET["busqueda"]) && !empty($_GET["busqueda"]) ?  $_GET["busqueda"] : "" ?>" name="busqueda" class="form-control" type="text" placeholder="Buscar cliente por nombre">
                </div>
                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>Departamento</th>
                    <th>Edad</th>
                    <th>Fecha de registro</th>
                    <th>Dashboard</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente) { ?>
                    <tr>
                        <td><?php echo $cliente->nombre ?></td>
                        <td><?php echo $cliente->departamento ?></td>
                        <td><?php echo $cliente->edad ?></td>
                        <td><?php echo $cliente->fecha_registro ?></td>
                        <td>
                            <a class="btn btn-info" href="dashboard_cliente.php?id=<?php echo $cliente->id ?>">Dashboard</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="formulario_editar_cliente.php?id=<?php echo $cliente->id ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="eliminar_cliente.php?id=<?php echo $cliente->id ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once "pie.php" ?>