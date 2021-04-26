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
$departamentos = obtenerDepartamentos();
?>
<div class="row">
    <div class="col-12">
        <h1>Agregar cliente</h1>
        <form action="guardar_cliente.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input required type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input required type="number" class="form-control" name="edad" id="edad" placeholder="Edad">
            </div>
            <div class="form-group">
                <label for="departamento">Departamento</label>
                <select class="form-control" name="departamento" id="departamento">
                    <?php foreach ($departamentos as $departamento) { ?>
                        <option value="<?php echo $departamento ?>"><?php echo $departamento ?></option>
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