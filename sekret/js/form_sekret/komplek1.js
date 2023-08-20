jQuery(document).ready(function(){
	jQuery("#komplek").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'keterangan' : jQuery(this).val()
			},
			url : 'page/sekret/data-kamar.php',
			success : function(data){
				jQuery("#kamar").html(data);
			}
		});
		
	});
	
});