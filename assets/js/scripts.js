


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
	
	$( "[ id^=boton_baja ]" ).click(
	
		function(){
			
			var num = this.id.slice(10);
			var color;
			var texto;
			
			if( $( '#boton_baja' + num ).text().length == 13 ){
				
				color = "#E5C9E0";
				texto = "Dar de Baja";
				
			}else{
				
				color = "#FC363B";
				texto = "Cancelar Baja";
				
			}
			
			if( num == 1 )
				$( '#title' ).css("background-color", color);
			else if( num == 2)
				$( '#title' ).next().css("background-color", color);
			else if( num == 3)
				$( '#title' ).next().next().css("background-color", color);
			else
				$( '#title' ).next().next().next().css("background-color", color);
			
			$( '#boton_cursos' + num ).text( texto );
			
		}
	);


	$( "[ id^=boton_noticias ]" ).click(
	
		function(){
			
			var num = this.id.slice(14);
			var color;
			var texto;
			
			if( $( '#boton_noticias' + num ).text().length == 6 ){
				
				color = "#E5C9E0";
				texto = "Eliminar";
				
			}else{
				
				color = "#FC363B";
				texto = "Añadir";
				
			}
			
			if( num == 1 ){
				$( '#ev' ).css("background-color", color);
			}
			else if( num == 2)
				$( '#ev' ).next().css("background-color", color);
			else
				$( '#ev' ).next().next().css("background-color", color);
			
			$( '#boton_noticias' + num ).text( texto );
			
		}
	);
});