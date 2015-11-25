
<div class="content">
	
    <div class = "busqueda">
        <form class = "barra_busqueda" action="index.php?contenido=busqueda" method="post">
        <input type="text" id="texto" size ="80" required>
    	<input type="submit" id="submit" value="Buscar">
        </form>
    </div>
	
    
    
	<?php
		
		include("./src/php/contents/".$contenido.".php");
		
	?>

</div>