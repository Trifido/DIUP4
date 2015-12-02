$(document).ready(function(){

	$( "[ id^=desc_empresa_ ]" ).mouseenter(
	
		function(){
			
			var num = this.id.slice(13);
			
			$( '#desc_empresa_' + num ).css({
				
				'opacity' : '0.6'
				
			});
		}
	);
	
	$( "[ id^=desc_empresa_ ]" ).mouseleave(
	
		function(){
			
			var num = this.id.slice(13);
			
			$( '#desc_empresa_' + num ).css({
				'opacity' : '0.0'
			});
		}
	);
	
	$( "[ id^=boton_cursos ]" ).click(
	
		function(){
			
			var num = this.id.slice(12);
			var color;
			var texto;
			
			if( $( '#boton_cursos' + num ).text().length == 8 ){
				
				color = "#E5C9E0";
				texto = "apuntarse";
				
			}else{
				
				color = "#80C498";
				texto = "cancelar";
				
			}
			
			if( num == 1 )
				$( '#ev' ).css("background-color", color);
			else if( num == 2)
				$( '#ev' ).next().css("background-color", color);
			else
				$( '#ev' ).next().next().css("background-color", color);
			
			$( '#boton_cursos' + num ).text( texto );
			
		}
	);
});