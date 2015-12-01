<div class="content">

	<div class="button_square">
    
    	<ul>
        	<span><a href="index.php?register=empresa"><li>Empresa </li></a></span>
            <a href="index.php?register=usuario"><li>Usuario</li></a>
        </ul>
    
    </div>
	
    <?php
	
		if( $_GET["register"] == "empresa" )
			include( "registro_empresa.php" );
		else if( $_GET["register"] == "usuario" )
			include( "registro_usuario.php" );
			
	?>
    
</div>