<fieldset>
 	<legend>Informacion General</legend>

 	<label for="titulo">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre Vendedor(a)" value="<?php echo s($vendedor->nombre); ?>">

    <label for="titulo">Nombre:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido Vendedor(a)" value="<?php echo s($vendedor->apellido); ?>">


</fieldset> 

<fieldset>
    <legend>Informacion Extra</legend>
    
    <label for="titulo">Numero Telefonico:</label>
    <input type="text" id="telefono" name="vendedor[telefono]" placeholder="Telefono Vendedor(a)" value="<?php echo s($vendedor->telefono); ?>">


</fieldset> 

