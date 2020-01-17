    $(document).ready(function(){
					
				$("#unit_chosen").click(function(){
						var location = $(this).val();
						  
						if(!location == ""){
							$.post(
							"loactionRetreival.php",
							{location:location}
							,function(data){
									$("#Locs_has").html(data);
							})
									
							
						}
				});	
				
			});