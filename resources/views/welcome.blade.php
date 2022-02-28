<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>Comentarios Shambalante </title>
    <link href="comentarios/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="comentarios/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="plugins/sweetalert/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="comentarios/js/jquery.min.js"></script>
    <!--<script src="js/jquery.easydropdown.js"></script>-->
    <!--start slider -->
    <link rel="stylesheet" href="comentarios/css/fwslider.css" media="all">
    <script src="comentarios/js/jquery-ui.min.js"></script>
    <script src="comentarios/js/fwslider.js"></script>
    <!--end slider -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (!$clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>
</head>

<body>
<input type="hidden" name="route" value="{{url('/')}}">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-left">
                        <div class="logo">
                            <a href="#"><img src="comentarios/images/logoshambalante.webp" alt="" /></a>
                        </div>
                        <div class="menu">
                            <a class="toggleMenu" href="#"><img src="comentarios/images/nav.png" alt="" /></a>
                            <ul class="nav" id="nav">
                                <li><a href="#comentarios">Comentarios</a></li>
                                <li><a href="https://www.shambalante.com/">Shambalante</a></li>

                            </ul>
                            <script type="text/javascript" src="comentarios/js/responsive-nav.js"></script>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="header_right">
                        <!-- start search-->

                        <!----search-scripts---->
                        <script src="comentarios/js/classie.js"></script>
                        <script src="comentarios/js/uisearch.js"></script>
                        <script>
                            new UISearch(document.getElementById('sb-search'));
                        </script>
                        <!----//search-scripts---->
                        <ul class="icon1 sub-icon1 profile_img">
                            <!-- <li><a class="active-icon c1" href="#"> </a> -->

                            <ul class="sub-icon1 list">
                                <div class="product_control_buttons">
                                    <a href="#"><img src="comentarios/images/edit.png" alt="" /></a>
                                    <a href="#"><img src="comentarios/images/close_edit.png" alt="" /></a>
                                </div>
                                <div class="clear"></div>
                                <!-- <li class="list_img"><img src="comentarios/images/1.jpg" alt=""/></li> -->
                                <li class="list_desc">
                                    <h4><a href="#">velit esse molestie</a></h4><span class="actual">1 x
                                        $12.00</span>
                                </li>
                                <div class="login_buttons">
                                    <div class="check_button"><a href="checkout.html">Check out</a></div>
                                    <div class="login_button"><a href="login.html">Login</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </ul>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner">
        <!-- start slider -->
        <div id="fwslider">
            <div class="slider_container">
                <div class="slide">
                    <!-- Slide image -->
                    <img src="comentarios/img/casa grande.jpeg" class="img-responsive img-casa-grande" alt="" />
                    <!-- /Slide image -->
                    <!-- Texts container -->
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text title -->
                            <h1 class="title">Bienvenido(a)<br></h1>
                            <h1 class="title">Shambalante<br></h1>

                            <!-- /Text title -->
                            <!-- <div class="button"><a href="#">See Details</a></div> -->
                        </div>
                    </div>
                    <!-- /Texts container -->
                </div>
                <!-- /Duplicate to create more slides -->
                <div class="slide">
                    <img src="comentarios/img/6.jpeg" class="img-responsive img-casa-grande" alt="" />
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <h1 class="title">Gracias por visitarnos</h1>
                            <!-- <div class="button"><a href="#">See Details</a></div> -->
                        </div>
                    </div>
                </div>
                <!--/slide -->
            </div>
            <div class="timers"></div>
            <div class="slidePrev"><span></span></div>
            <div class="slideNext"><span></span></div>
        </div>
        <!--/slider -->
    </div>


    <div class="features">
        <div class="container">
            <h3 class="m_3">Galeria</h3>
            <div class="close_but"><i class="close1"> </i></div>
            <div class="galeria-st">

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/principal.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Casa hacienda mas importante</h2>
                            <p>Este es una de las casas hacienda mas importante del Shambalante</p>
                        </div>
                    </div>
                    <h4 class="m_4">Principal</h4>
                </div>


                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/9.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Una actividad </h2>
                            <p>Este es una actividad que se realiza con vapor, para vivir una nueva experiencia </p>
                        </div>
                    </div>
                    <h4 class="m_4">Termascales</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/4.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Parte lateral de Henequen</h2>
                            <p> Desde aqui se puede apreciar el observador</p>
                        </div>
                    </div>
                    <h4 class="m_4">Henequen</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/5.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Una de las puertas a principal</h2>
                            <p>Este es una de las entradas mas antiguas que estan en el hotel </p>
                        </div>
                    </div>
                    <h4 class="m_4">Puerta principal</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/11.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Posterior al termascal</h2>
                            <p>Se pasa si asi se desea, para bajar un poco el calor que se tiene en los termascales</p>
                        </div>
                    </div>
                    <h4 class="m_4">Tanque</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/13.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>El comendor</h2>
                            <p>Es donde se puede pasar a degustar los alimentos que esta en el menu de Shambalante</p>
                        </div>
                    </div>
                    <h4 class="m_4">Comedor</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/14.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Parte lateral de henequen</h2>
                            <p>En esta parte se puede ver los circulos donde se hace la fogata</p>
                        </div>
                    </div>
                    <h4 class="m_4">Henequen</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/8.jpeg" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2> la ceiba o ya’ax’che </h2>
                            <p>Para las comunidades mayas,es un árbol sagrado que sostiene el cielo con sus ramas y teje el inframundo con sus raíces.</p>
                        </div>
                    </div>
                    <h4 class="m_4">Ceiba</h4>
                </div>

                <div class="col-md-4 top_box1">
                    <div class="view view-ninth">
                        <img src="comentarios/img/shiba.png" class="img-responsive" alt="" />
                        <div class="mask mask-1"> </div>
                        <div class="mask mask-2"> </div>
                        <div class="content">
                            <h2>Estatua de Shiva</h2>
                            <p>Uno de los dioses más importantes del hinduismo, capaz de crear o destruir lo que desee</p>
                        </div>
                    </div>
                    <h4 class="m_4">Shiva</h4>
                </div>




            </div>
        </div>
    </div>
    <div class="content-bottom">
        <div class="container">
            <div class="row content_bottom-text">
                <div class="col-md-7">
                    <h3>Mas sobre<br>Shambalante</h3>
                    <div class="box" >
                    <p class="m_1">Se tiene una gran tradición espiritual, herencia del paso de diversas culturas y
                        de civilizaciones, que fueron creando templos y lugares para conectar con lo divino; por todo
                        el país hay pequeños y grandes santuarios. Existe un elemento etéreo con una energía muy poderosa,
                        que llena la atmósfera de secretos para el alma.
                    </p>
                    <p class="m_2">A 10 kilómetros de Izamal,
                        -el primer pueblo
                        mágico de nuestro país- en Yucatán, está Shambalanté,
                        una ex hacienda henequenera que ha trascendido el tiempo y el espacio.
                         Gracias a su conservación y a la combinación con la nueva arquitectura, es un viaje en la historia y un presente para
                         la memoria.</p></div>
                </div>
            </div>
        </div>
    </div>


    <div class="features" id="comentarios">
        <div class="container" id="comentario">
            <h3 class="m_3">Comentarios</h3>
            <hr class="h_1">
                    <div>
                        <label for="email" >Confirme su email para poder dar su comentario</label>
                        <!-- <span v-if="!emailconfirm">Coloque un email valido </span> -->
                        <input type="text" name="email" class="form-control " v-model="emailconfirm"><button class="btn btn-primary"  @click="verificarEmail">Verificar</button>
                    </div>
                <hr class="h_1">
            <div class="caja-comentarios" v-if="mostrar == true">

                <textarea v-model="descripcion" id="" cols="30" rows="10" class="input-comentario"></textarea>
            <div class="c-btn-comment">
                <button class="btn-comment" v-if="mostrar == true" @click="Guardar()"><i class="far fa-paper-plane"></i></button>
            </div>
            </div>
        </div>
    </div>





    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4><a class="a-terminos" href="https://www.shambalante.com/"> Shambalante</a></h4>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="footer_box">
                        <h4><a class="a-terminos" href="https://www.shambalante.com/avisoprivacidad"> TÉRMINOS, CONDICIONES Y AVISO DE PRIVACIDAD</a></h4>
                    </ul>

                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="footer_box">
                        <h4><a class="a-terminos"> INFO@SHAMBALANTE.COM</a></h4>
                    </ul>
                </div>

            </div>
            <div class="row footer_bottom">
                <div class="copy">
                    <p>© 2017 -Shambalante</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue-resource.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/apis/comentario.js')}}"></script>
    <script src="plugins/sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/underscore@1.11.0/underscore-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

</body>
</html>

