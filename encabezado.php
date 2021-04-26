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
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CRM">
    <title>CRM</title>
    <!-- Cargar el CSS de Boostrap-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/Chart.min.js"></script>
    <!-- Cargar estilos propios -->
    <link href="estilo.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
    .nav-link{
        font-size: 1.2rem;
    }
    </style>
</head>

<body>
    <!-- Definición del menú -->
    <nav class="navbar navbar-expand-md navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="https://parzibyte.me">CRM By Parzibyte</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#miNavbar" aria-controls="miNavbar" aria-expanded="false" aria-label="Mostrar u ocultar menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="miNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="clientes.php"><span class="mdi mdi-account-multiple"></span> Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ventas.php"><span class="mdi mdi-store"></span> Ventas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><span class="mdi mdi-desktop-mac-dashboard"></span> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="creditos.php"><span class="mdi mdi-information"></span> Créditos</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="https://parzibyte.me#contacto"><span class="mdi mdi-handshake-outline"></span>Ayuda y soporte</a>
                </li>
            </ul>
        </div>
    </nav>
    <main role="main" class="container-fluid">