$(function() {

	function enviar(url) {
		var formData = new FormData();
		formData.append('text', $('#text').val());
		formData.append('file1', $('#file1')[0].files[0]);
		formData.append('file2', $('#file2')[0].files[0]);
		$.ajax({
			url: url,
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST'
		})
		.done(function(data) {
			console.log(data);
		});
	}

	$('#upload-php').click(function(event) {
		event.preventDefault();
		enviar('cargaArchivos/cargar/php');
	});

	$('#upload-ci3').click(function(event) {
		event.preventDefault();
		enviar('cargaArchivos/cargar/ci3');
	});
	
});
