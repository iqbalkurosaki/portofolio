jQuery(document).ready(function(){
	jQuery("#provinsi").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'id_provinsi' : jQuery(this).val()
			},
			url : 'page/sekret/data-kota.php',
			success : function(data){
				jQuery("#kota").html(data);
				jQuery("#kecamatan").html('<option disabled="" selected="">--Pilih Kecamatan--</option>');
				jQuery("#kelurahan").html('<option disabled="" selected="">--Pilih Desa/Kelurahan--</option>');
			}
		});
		
	});
	jQuery("#kota").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'id_kota' : jQuery(this).val()
			},
			url : 'page/sekret/data-kecamatan.php',
			success : function(data){
				jQuery("#kecamatan").html(data);
				jQuery("#kelurahan").html('<option disabled="" selected="">--Pilih Desa/Kelurahan--</option>');
			}
		});
		
	});
	jQuery("#kecamatan").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'id_kecamatan' : jQuery(this).val()
			},
			url : 'page/sekret/data-kelurahan.php',
			success : function(data){
				jQuery("#kelurahan").html(data);
			}
		});
	});
	jQuery("#kelurahan").on('change',function(){

		jQuery.ajax({
			type:'post',
			data : {
				'id_kelurahan' : jQuery(this).val()
			},
			url : 'page/sekret/data-kodepos.php',
			success : function(data){
				jQuery("#kodepos").val(data);
			}
		});
		
	});
});
