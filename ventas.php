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
<?php include_once "encabezado.php";
include_once "funciones.php";
$clientes = obtenerClientes();

?>
<div class="row">
    <div class="col-12">
        <h1>Registrar venta</h1>
        <form action="guardar_venta.php" method="post">
            <div class="form-group">
                <label for="id_cliente">Cliente</label>
                <select required name="id_cliente" id="id_cliente" class="form-control">
                    <?php foreach ($clientes as $cliente) { ?>
                        <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input required type="number" class="form-control" placeholder="Monto" name="monto" id="monto">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input required type="date" value="<?php echo date("Y-m-d") ?>" class="form-control" placeholder="Fecha" name="fecha" id="fecha">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php"; ?>