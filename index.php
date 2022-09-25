<?php  
    /** DATA BASE */

        // // IMPORTAR CONEXION
        // require 'includes/templates/config/database.php';
        // $db = conectarDB();

        // // ESCRIBIR EL QUERY
        // $query = "SELECT * FROM propiedades";

        // // CONSULTAR DATABASE
        // $resultadoConsulta = mysqli_query($db, $query);

    /**  CONSULTAR DATABASE, PARA DATOS ANUNCIOS */



    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor">
        <h1>Más Sobre Nosotros</h1>
        <div class="contenedor-iconos">

            <div class="icono">
                <img src="build/img/icono1.svg" loading="lazy" alt="icono ">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, temporibus. Esse labore officia deleniti? Enim officiis aliquid id pariatur itaque, culpa voluptas labore illo nisi! Cupiditate ad ab neque animi.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" loading="lazy" alt="icono Precio">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, temporibus. Esse labore officia deleniti? Enim officiis aliquid id pariatur itaque, culpa voluptas labore illo nisi! Cupiditate ad ab neque animi.</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" loading="lazy" alt="icono Tiempo">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident, temporibus. Esse labore officia deleniti? Enim officiis aliquid id pariatur itaque, culpa voluptas labore illo nisi! Cupiditate ad ab neque animi.</p>
            </div>

        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>
            
                <?php 
                $limite = 3;
                include 'includes/templates/anuncios.php' ; 
                ?>
         

            
            <div class="ver-todas alinear-derecha">
                <a href="anuncios.php" class="boton-verde ">Ver Todas</a>
            </div>
     </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp" alt="Texto Entrada Blog">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg" alt="Texto Entrada Blog">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">

                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                        
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero
                        </p>
                    </a>

                </div> <!--Termina entrada-->
            </article> <!-- termina entrada blog-->

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp" alt="Texto Entrada Blog">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg" alt="Texto Entrada Blog">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">

                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        
                        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                        
                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>

                </div> <!--Termina entrada-->
            </article><!-- termina entrada blog-->
        </section>

        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>~Freddy Murillo</p>
            </div>
        </section>
    </div>

<?php  
    // CLOSE DATABASE CONECTION
    incluirTemplate('footer');
?>