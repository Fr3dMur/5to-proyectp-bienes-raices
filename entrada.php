<?php  
    require 'includes/App.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <div class="arrow">
            <a href="blog.php">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M20 15h-8v3.586a1 1 0 0 1 -1.707 .707l-6.586 -6.586a1 1 0 0 1 0 -1.414l6.586 -6.586a1 1 0 0 1 1.707 .707v3.586h8a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1z" />
                </svg>
            </a>
        </div>
        <h1 class="title-anuncio">Consejos para tu alberca en casa</h1>

        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp" alt="Imagen de una casa destacada">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg" alt="Imagen de una casa destacada">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de una casa destacada">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
           
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur quidem optio eos nam deleniti et aspernatur quo, similique hic id! Tenetur, voluptatem. Rem veritatis pariatur tenetur sequi facilis quos odio?
                Aliquam incidunt alias dicta obcaecati eos id delectus repellat fugiat, sed, minus optio. Aliquid necessitatibus nemo amet odit, debitis hic aliquam officiis illo asperiores, neque, assumenda vitae est ea aperiam?
                Vel illum, expedita, aperiam sunt blanditiis suscipit ad animi porro iusto pariatur enim, saepe ipsam nihil qui minima iure id asperiores obcaecati labore sed libero! Fuga qui facilis et dolores.
               
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores unde reprehenderit maiores vel laboriosam sed deleniti minus recusandae tempore, vitae doloremque! Accusantium sequi dolorem voluptas laborum asperiores? Eius, illo unde.
                Suscipit, adipisci dolorum neque pariatur incidunt quo culpa ullam fugit reiciendis obcaecati quia repellendus rem officia nihil debitis accusamus aperiam nam nesciunt consequuntur! Natus perspiciatis omnis, ratione dolores nihil eveniet?</p>
        </div>
    </main>


    <?php  incluirTemplate('footer');;?>