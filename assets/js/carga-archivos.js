$(function() {

	$('#req-btn').click(function(event) {
		var formData = new FormData();
		event.preventDefault();
		formData.append('text', $('#text').val());
		formData.append('file1', $('#file1')[0].files[0]);
		formData.append('file2', $('#file2')[0].files[0]);
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
