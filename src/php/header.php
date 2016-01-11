	<div class ="header"> 			<!-- init header -->
 
		<div class="logo"> 			<!-- init logo -->
			<a href="index.php"><img id="imglogo" src="assets/img/logo.png" title="Ir a la página principal" alt="logo"/></a>
		</div> 						<!-- end logo -->
        
        <div id = "name_user">
        
        	<?php
				
				if( isset( $_SESSION['user'] ) ){

					echo $_SESSION['user'][0];
					
				}else if( isset( $_SESSION['empresa']) ){
					
					echo $_SESSION['empresa'][0];
	
				}else if ( isset( $_SESSION['admin']) ){
	
					echo "ADMIN";
					
				}else{
					
					echo "INVITADO";
					
				}
			
			?>
        
        </div>
        
        <div class="head_buttons"> 	<!-- init botones header -->
        	
            <div id="head_button_top">
            	<a href="index.php">Home</a> &emsp;&emsp;<a href="index.php?contenido=about">About</a> &emsp;&emsp; <a href="index.php?contenido=contacto">Contact</a>
            </div>
            	<br>
            <div id="head_button_bot">
            	<a>Twitter</a> &emsp; <a>Facebook</a> &emsp; <a>Google plus </a>
            </div>
        </div> 						<!-- end botones header -->
</div>