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
$totalVentas = totalAcumuladoVentasPorCliente($cliente->id);
$totalVentasUltimoMes = totalAcumuladoVentasPorClienteEnUltimoMes($cliente->id);
$totalVentasUltimoAnio = totalAcumuladoVentasPorClienteEnUltimoAnio($cliente->id);
$totalVentasEnOtroPeriodo = totalAcumuladoVentasPorClienteAntesDeUltimoAnio($cliente->id);
?>

<div class="row">
    <div class="col-12">
        <h1>Dashboard de <?php echo $cliente->nombre ?></h1>
        <a href="clientes.php" class="btn btn-info mb-2">Volver</a>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/money.png" alt="">
                    </div>
                </div>
                <h1 class="card-title">$<?php echo number_format($totalVentas, 2) ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Total de ventas</h6>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/date.png" alt="">
                    </div>
                </div>
                <h1 class="card-title">$<?php echo number_format($totalVentasUltimoMes, 2) ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Total de ventas último mes</h6>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/sales.png" alt="">
                    </div>
                </div>
                <h1 class="card-title">$<?php echo number_format($totalVentasUltimoAnio, 2) ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Total de ventas último año</h6>
            </div>
        </div>
    </div>
    <div class="col-12 my-2">
        <h2 class="text-center">Gráfica de ventas</h2>
        <canvas id="grafica"></canvas>
    </div>
</div>
<script>
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    // Las etiquetas son las porciones de la gráfica
    const etiquetas = ["En otro período", "Último mes", "Último año", ]
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const datos = {
        data: [parseFloat("<?php echo $totalVentasEnOtroPeriodo ?>"), parseFloat("<?php echo $totalVentasUltimoMes ?> "), parseFloat("<?php echo $totalVentasUltimoAnio ?> ")], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
        // Ahora debería haber tantos background colors como datos, es decir, para este ejemplo, 4
        backgroundColor: [
            'rgba(163,221,203,0.2)',
            'rgba(232,233,161,0.2)',
            'rgba(230,181,102,0.2)',
            'rgba(229,112,126,0.2)',
        ], // Color de fondo
        borderColor: [
            'rgba(163,221,203,1)',
            'rgba(232,233,161,1)',
            'rgba(230,181,102,1)',
            'rgba(229,112,126,1)',
        ], // Color del borde
        borderWidth: 1, // Ancho del borde
    };
    new Chart($grafica, {
        type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
        data: {
            labels: etiquetas,
            datasets: [
                datos,
                // Aquí más datos...
            ]
        },
    });
</script>
<?php include_once "pie.php"; ?>