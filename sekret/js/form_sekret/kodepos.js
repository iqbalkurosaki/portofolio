jQuery(document).ready(function () {
	jQuery("#kota").on('change', function () {

		jQuery.ajax({
			type: 'post',
			data: {
				'id_kelurahan': jQuery(this).val()
			},
			url: '../page/sekret/data-kodepos.php',
			success: function (data) {
				jQuery("#kodepos").html(data);
			}
		});

	});
});
