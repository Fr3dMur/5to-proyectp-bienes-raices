    
    <fieldset>
                <legend>Informacion General</legend>

                    <label for="titulo">Titulo:</label>
                    <input type="text" 
                            name="propiedad[titulo]" 
                            id="titulo" 
                            placeholder="Titulo Propiedad" 
                            value="<?php
                                use App\Propiedad;
                                echo s($propiedad->titulo) ;?> ">

                    <label for="precio">Precio:</label>
                    <input type="number" 
                            name="propiedad[precio]" 
                            id="precio" 
                            placeholder="Precio Propiedad" 
                            value="<?php echo s($propiedad->precio) ;?>"
                    >

                    <label for="imagen">Imagen:</label>
                    <input type="file" 
                            name="propiedad[imagen]"
                            id="imagen" 
                            accept="image/jpeg, image/png"
                     >
                    <?php if($propiedad->imagen){ ?>
                        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                    <?php } ?>

                    <label for="descripcion">Descripcion:</label>
                    <textarea name="propiedad[descripcion]" 
                        id="descripcion" 
                        cols="30" 
                        rows="10" 
                        placeholder="Descripcion Propiedad">
                        <?php echo s($propiedad->descripcion) ;?> 
                    </textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion Propiedad</legend>

                    <label for="habitaciones">Habitaciones:</label>
                    <input type="number" 
                            name="propiedad[habitaciones]" 
                            id="habitaciones" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9" 
                            value="<?php echo s($propiedad->habitaciones) ;?>">

                    <label for="wc">Baños:</label>
                    <input type="number" 
                            name="propiedad[wc]" 
                            id="wc" 
                            placeholder="Ej: 3" 
                            min="1" 
                            max="9" 
                            value="<?php echo s($propiedad->wc) ;?>">

                    <label for="estacionamiento">Estacionamientos:</label>
                    <input type="number" 
                            name="propiedad[estacionamiento]" 
                            id="estacionamiento" 
                            placeholder="Ej: 3"
                            min="1" 
                            max="9" 
                            value="<?php echo s($propiedad->estacionamiento) ;?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedor</label>
                 <select name="propiedad[vendedorId" id="vendedor">
                        <option value="" selected>-- Seleccione --</option>
                        <?php foreach($vendedores as $vendedor){ ?>
                            <option 
                            <?php echo $propiedad->vendedores_id === $vendedor->id ? 'Selected' : '1' ?>
                            value="<?php echo s($vendedor->id)?>">
                            <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ?>
                            </option>
                        <?php } ?>
                 </select>
            </fieldset>