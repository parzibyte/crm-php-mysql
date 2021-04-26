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
$cliente = obtenerClientePorId($_GET["id"]);
$departamentos = obtenerDepartamentos();
?>
<div class="row">
    <div class="col-12">
        <h1>Editar cliente</h1>
        <form action="actualizar_cliente.php" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente->id ?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input value="<?php echo $cliente->nombre ?>" required type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input value="<?php echo $cliente->edad ?>" required type="number" class="form-control" name="edad" id="edad" placeholder="Edad">
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <select class="form-control" name="departamento" id="departamento">
                    <?php foreach ($departamentos as $departamento) { ?>
                        <option <?php
                                if ($departamento === $cliente->departamento) {
                                    echo "selected";
                                } ?> value="<?php echo $departamento ?>"><?php echo $departamento ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once "pie.php" ?>