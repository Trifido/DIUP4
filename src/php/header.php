	<div class ="header"> <!-- init header -->
 
		<div class="logo"> <!-- init logo -->
			<a href="index.php"><img id="imglogo" src="assets/img/logo.png" title="Ir a la página principal" alt="logo"/></a>
		</div> <!-- end logo -->
        
        <div class="head_buttons">
        	
            home
            
        </div>
		
		<div class="login">
			<?php
				// Botones de login			
				/*if( isset( $_SESSION['user'] ) )
				{
					if( $_SESSION['admin'] )
						echo "<p><a id=admin href=index.php?contenido=admin>".$_SESSION['user']."</a><a id=boton href=index.php?salir>Salir</a></p>";
					else
						echo "<p><a href=index.php?contenido=pass>".$_SESSION['user']."</a><a id=boton href=index.php?salir>Salir</a></p>";
				}
				else
					echo "<a id=boton href=index.php?contenido=login>login</a>";*/
				
			?>
			
        </div>

		
	</div>