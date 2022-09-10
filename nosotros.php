<?php  
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="nosotros">
            <div class="nosotros__imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp" alt="Una habitacion muy acogedora">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg" alt="Una habitacion muy acogedora">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Una habitacion muy acogedora">
                </picture>
            </div>
            <div class="nosotros__contenido">
                <blockquote>25 años de Experiencia</blockquote>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quidem optio eos nam deleniti et aspernatur quo, similique hic id! Tenetur, voluptatem. Rem veritatis pariatur tenetur sequi facilis quos odio?
                Aliquam incidunt alias dicta obcaecati eos id delectus repellat fugiat, sed, minus optio. Aliquid necessitatibus nemo amet odit, debitis hic aliquam officiis illo asperiores, neque, assumenda vitae est ea aperiam?
                Vel illum, expedita, aperiam sunt blanditiis suscipit ad animi porro iusto pariatur enim, saepe ipsam nihil qui minima iure id asperiores obcaecati labore sed libero! Fuga qui facilis et dolores.
               
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores unde reprehenderit maiores vel laboriosam sed deleniti minus recusandae tempore, vitae doloremque! Accusantium sequi dolorem voluptas laborum asperiores? Eius, illo unde.
                Suscipit, adipisci dolorum neque pariatur incidunt quo culpa ullam fugit reiciendis obcaecati quia repellendus rem officia nihil debitis accusamus aperiam nam nesciunt consequuntur! Natus perspiciatis omnis, ratione dolores nihil eveniet?</p>
            </div>
        </div>
    </main>

    <section class="contenedor">
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
    </section>

    <?php  incluirTemplate('footer');;?>