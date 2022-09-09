<?php  include 'includes/templates/header.php';?>

    <main class="contenedor seccion contenido-centrado relativo">
        <div class="arrow">
            <a href="anuncios.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z" />
                </svg>
            </a>
        </div>
        <h1 class="title-anuncio">Casa en Venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" alt="Imagen de una casa destacada">
            <source srcset="build/img/destacada.jpg" type="image/jpeg" alt="Imagen de una casa destacada">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de una casa destacada">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$ 3.000.000</p>

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
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quidem optio eos nam deleniti et aspernatur quo, similique hic id! Tenetur, voluptatem. Rem veritatis pariatur tenetur sequi facilis quos odio?
                Aliquam incidunt alias dicta obcaecati eos id delectus repellat fugiat, sed, minus optio. Aliquid necessitatibus nemo amet odit, debitis hic aliquam officiis illo asperiores, neque, assumenda vitae est ea aperiam?
                Vel illum, expedita, aperiam sunt blanditiis suscipit ad animi porro iusto pariatur enim, saepe ipsam nihil qui minima iure id asperiores obcaecati labore sed libero! Fuga qui facilis et dolores.
               
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores unde reprehenderit maiores vel laboriosam sed deleniti minus recusandae tempore, vitae doloremque! Accusantium sequi dolorem voluptas laborum asperiores? Eius, illo unde.
                Suscipit, adipisci dolorum neque pariatur incidunt quo culpa ullam fugit reiciendis obcaecati quia repellendus rem officia nihil debitis accusamus aperiam nam nesciunt consequuntur! Natus perspiciatis omnis, ratione dolores nihil eveniet?</p>
        </div>
    </main>

    <?php  include 'includes/templates/footer.php';?>