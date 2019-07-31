$(function() {

	$('#req-btn').click(function(event) {
		var formData = new FormData();
		event.preventDefault();
		formData.set('text', $('#text').val());
		formData.set('file1', $('#file1')[0].files);
		formData.set('file2', $('#file2')[0].files);
		$.ajax({
			url: 'cargaArchivos/cargar',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST'
		})
		.done(function(data) {
			console.log(data);
		});
	});
	
});
