jQuery(document).ready(function(){
	jQuery("#profesi").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'id_profesi' : jQuery(this).val()
			},
			url : '../page/sekret/data-profesi.php',
			success : function(data){
				jQuery("#institusi").html(data);
			}
		});
		
	});
	
});