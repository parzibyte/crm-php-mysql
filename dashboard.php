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
$totalClientes = obtenerNumeroTotalClientes();
$totalClientesUltimos30Dias = obtenerNumeroTotalClientesUltimos30Dias();
$totalClientesUltimoAnio = obtenerNumeroTotalClientesUltimoAnio();
$totalClientesAniosAnteriores = obtenerNumeroTotalClientesAniosAnteriores();
$totalVentas = obtenerTotalDeVentas();
$clientesPorDepartamento = obtenerClientesPorDepartamento();
$clientesPorEdad = obtenerReporteClientesEdades();
$ventasAnioActual = obtenerVentasAnioActualOrganizadasPorMes();
?>

<div class="row">
    <div class="col-12 text-center">
        <h1>Dashboard general</h1>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/money.png" alt="">
                    </div>
                </div>
                <h1 class="card-title">$<?php echo number_format($totalVentas, 2) ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Total ventas</h6>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/target.png" alt="">
                    </div>
                </div>
                <h1 class="card-title"><?php echo $totalClientes ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Clientes registrados</h6>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/customer.png" alt="">
                    </div>
                </div>
                <h1 class="card-title"><?php echo $totalClientesUltimos30Dias ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Clientes en los últimos 30 días</h6>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <img class="img-fluid" src="./img/meeting.png" alt="">
                    </div>
                </div>
                <h1 class="card-title"><?php echo $totalClientesUltimoAnio ?></h1>
                <h6 class="card-subtitle mb-2 text-muted">Clientes en el último año</h6>
            </div>
        </div>
    </div>
    <div class="col-3 my-2">
        <div class="card text-center">
            <div class="card-body">
                <h3>Clientes por departamento</h3>
                <canvas id="grafica"></canvas>
            </div>
        </div>
    </div>
    <div class="col-3 my-2">
        <div class="card text-center">
            <div class="card-body">
                <h3>Clientes por edad</h3>
                <canvas id="graficaEdad"></canvas>
            </div>
        </div>
    </div>
    <div class="col-3 my-2">
        <div class="card text-center">
            <div class="card-body">
                <h3>Ventas del año actual</h3>
                <canvas id="graficaVentas"></canvas>
            </div>
        </div>
    </div>
    <div class="col-3 my-2">
        <div class="card text-center">
            <div class="card-body">
                <h3>Clientes por año</h3>
                <canvas id="graficaClientes"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    const clientesPorDepartamento = <?php echo json_encode($clientesPorDepartamento) ?>;
    const clientesPorEdad = <?php echo json_encode($clientesPorEdad) ?>;
    const ventasPorMes = <?php echo json_encode($ventasAnioActual, JSON_NUMERIC_CHECK) ?>;
    // Transformar los meses de número a letra
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    ventasPorMes.forEach(v => {
        v.mes = meses[v.mes - 1];
    });
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    const $graficaEdad = document.querySelector("#graficaEdad");
    const $graficaVentas = document.querySelector("#graficaVentas");
    const $graficaClientes = document.querySelector("#graficaClientes");

    new Chart($grafica, {
        type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
        data: {
            labels: clientesPorDepartamento.map(dato => dato.departamento),
            datasets: [{
                data: clientesPorDepartamento.map(dato => dato.conteo), // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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
            }]
        },
    });
    new Chart($graficaEdad, {
        type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
        data: {
            labels: clientesPorEdad.map(dato => dato.etiqueta),
            datasets: [{
                data: clientesPorEdad.map(dato => dato.valor), // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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
            }]
        },
    });
    new Chart($graficaVentas, {
        type: 'bar', // Tipo de gráfica. Puede ser dougnhut o pie
        data: {
            labels: ventasPorMes.map(dato => dato.mes),
            datasets: [{
                label: "Ventas por mes",
                data: ventasPorMes.map(dato => dato.total), // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
    new Chart($graficaClientes, {
        type: 'pie', // Tipo de gráfica. Puede ser dougnhut o pie
        data: {
            labels: ["Año actual", "Otros años"],
            datasets: [{
                data: [<?php echo $totalClientesUltimoAnio ?>, <?php echo $totalClientesAniosAnteriores ?>], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
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
            }]
        },
    });
</script>

<?php include_once "pie.php"; ?>