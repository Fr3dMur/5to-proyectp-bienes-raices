<?php  
    $inicio = true;
    include 'includes/templates/header.php';
    
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

        <div class="contenedor-anuncios">

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp" alt="Imagen de una casa">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg" alt="Imagen de una casa">
                    <img loading="lazy" src="build/img/anuncio1.jpg" alt="Imagen de una casa">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el Lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3.000.000</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>  
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--Contenido Anuncio-->
            </div> <!-- ANUNCIO-->

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp" alt="Imagen de una casa">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg" alt="Imagen de una casa">
                    <img loading="lazy" src="build/img/anuncio2.jpg" alt="Imagen de una casa">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa terminados de lujo</h3>
                    <p>Casa en el Lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3.000.000</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>  
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--Contenido Anuncio-->
            </div> <!-- ANUNCIO-->

            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp" alt="Imagen de una casa">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg" alt="Imagen de una casa">
                    <img loading="lazy" src="build/img/anuncio3.jpg" alt="Imagen de una casa">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con Alberca</h3>
                    <p>Casa en el Lago con excelente vista, acabados de lujo a un excelente precio</p>
                    <p class="precio">$3.000.000</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" alt="icono_wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento" loading="lazy">
                            <p>3</p>
                        </li>  
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono_dormitorio" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>

                    <a href="anuncio.php" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div> <!--Contenido Anuncio-->
            </div> <!-- ANUNCIO-->

        </div> <!-- CONTENEDOR ANUNCIOS-->

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

<?php  include 'includes/templates/footer.php';?>