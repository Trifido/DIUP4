
<?php
	include("./src/php/basedatos/usershandler.php");
	$user = new Usuario;
	$user->connect();
	
?>
<div class = "eventos">
	
    <div id="users">
    	
        <?php $user->get_user( "jose" ); ?>
        
        <img id ="img1" src ="./assets/img/<?php echo($user->foto);?>">
        
        <div id="right">
        	
            <div id="title">
            	<?php $user->throw_name(); ?>
            </div>
            
            <div id="texto">
            	<?php echo( $user->info );?>
            </div>
            
        </div>
        
        <?php $user->get_user( "juan" ); ?>
        
        <img id="img1" src ="./assets/img/<?php echo($user->foto);?>">
        
        <div id="right">
        	
            <div id="title">
            	<?php $user->throw_name(); ?>
            </div>
            
            <div id="texto">
            	<?php echo( $user->info );?>
            </div>
            
        </div>
        
        <?php $user->get_user( "maria" ); ?>
        
        <img id="img1" src ="./assets/img/<?php echo($user->foto);?>">
        
        <div id="right">
        	
            <div id="title">
				<?php $user->throw_name(); ?>
            </div>
            
            <div id="texto">
            	<?php echo( $user->info );?>
            </div>
            
        </div>
        
	</div>
    
</div>