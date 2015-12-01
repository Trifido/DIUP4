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
	
});