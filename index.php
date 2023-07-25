<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("location:bienvenida.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Motors Toys</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/gaia.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top" color-on-scroll="200">
        
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="#" class="navbar-brand"><small>INICIO</small></a>
                <a href="#Servicios" class="navbar-brand"><small>SERVICIOS</small></a>
                <a href="#Equipos" class="navbar-brand"><small>JUGUETES</small> </a>
                <a href="#Contacto" class="navbar-brand"><small>CONTACTANOS</small></a>
                <a href="../integradora/sesion/inicio.php" class="navbar-brand"><small>INICIAR DE SESION</small></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    
                    <li>
                    </li>
                    <li class="dropdown">
                        <a href="gaiga" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="#"><i
                                        class="fa fa-facebook-square"></i> Facebook</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <div class="section section-header">
        <div class="parallax filter filter-color-Black">
            <div class="image" style="background-image: url('assets/img/mario.webp')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h3>Bienvenido a</h3>
                        <h1 class="title-modern">Motors Toys</h1>
                        <h3>Los mejores juguetes para tus hijos</h3>
                        <div class="separator line-separator">✻</div>
                    </div>
                    <a target="_blannc" a>
                </div>
            </div>

        </div>
    </div>
    </div>


    <div class="section" id="Servicios">
        <div class="container">
            <div class="row">
                <div class="title-area">
                    <h2>Cotiza tus juguetes</h2>
                    <div class="separator separator-black">✻</div>
                    <p class="description">Mandanos un mensaje para saber que juguete necesitas.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4.5">
                    <div class="info-icon">
                        <div class="icon text-black">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <h2>Cotizaciones</h2>
                        <a class="description">Comunicate con nosotros para cotizar algun juguete.</p>
                        <ul>
                            <a class="btn btn-primary" href="https://wa.me/524422390155" role="button">CLICK</a>
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <div class="section section-our-team-freebie" id="Equipos">
        <div class="parallax filter filter-color-black">
            <div class="image" style="background-image:url('assets/img/Amarillo.webp')">
                
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="title-area">
                            <h2>Nuestros juguetes mas vendidos:</h2>
                            <div class="separator separator-danger">✻</div>
                            <p class="description">Te mostramos nuestros juguetes mas vendidos:</p>
                        </div>
                    </div>

                    <div class="team">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="AvatarCuadrado">
                                                    <img alt="..." class="card-img-top"
                                                        src="assets/img/carro1.jpg" />
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Doodge Charger</h3>
                                                    <p class="small-text">$2,000</p>
                                                    <p class="description">Descripción...</p>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="AvatarCuadrado ">
                                                    <img alt="..." class="" src="assets/img/carro2.jpg" />
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Doodge Challenger Turbo</h3>
                                                    <p class="small-text">$2,000</p>
                                                    <p class="description">Descripción...</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="AvatarCuadrado">
                                                    <img alt="..." class="" src="assets/img/carro3.jpg" />
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Lamborghini Terzo Millenio</h3> 
                                                    <p class="small-text">$2,000</p>
                                                    <p class="description">Descripción...</p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>

                                        <a class="btn btn-primary"  href="/compra/catalogo.php" role="button">Catalogo</a>
                                    
                                   
                                    <ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-small section-get-started" id="Contacto">
        <div class="parallax filter">
            <div class="image" style="background-image: url('assets/img/Fondo\ gris.jpg')">
            </div>
            <div class="container">
                <div class="title-area">
                    <h2 class="text-white">¿Quieres saber mas de nosotros?</h2>
                    <div class="separator line-separator">♦</div>
                    <p class="description">Comunicate con nosotros para saber mas de nuestra empresa y los juguetes que te
                        podremos ofrecer.</p>
                </div>

                <div class="button-get-started">
                    <a href="https://wa.me/524422390155" class="btn btn-primary">CONTACTANOS</a>
                </div>

            </div>
        </div>
    </div>



    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-3 co3-sm-3">
                    <div class="info">
                        <h5 class="title"> Ayuda y soporte</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://wa.me/524428672255">Contactanos</a>
                                </li>
                                <li>
                                    <a href="#">Como funciona</a>
                                </li>
                                <li>
                                    <a href="https://www.montacargaspsm.com/terminos-y-condiciones">Terminos &amp; Condiciones</a>
                                </li>
                                <li>
                                    <a href="https://www.ealde.es/tipos-politica-empresa/">Politica de la empresa</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                </li>
                <div class="col-md-4 col-md-offset-4 col-sm-4">
                    <div class="info">
                        <h5 class="title">Siguenos en nuestras redes sociales.</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/Mitservice-107396134396904"
                                        class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-instagram btn-simple">
                                        <i class="fa fa-instagram"></i> Instagram
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.google.com.mx " class="btn btn-social btn-reddit btn-simple">
                                        <i class="fa fa-google-plus-square"></i> Google+
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                ©
                <script> document.write(new Date().getFullYear()) </script> NOVATECH-PAGINA DE JUGUETES.
            </div>
        </div>
    </footer>

</body>

<!--   core js files    -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="assets/js/gaia.js"></script>

</html>
