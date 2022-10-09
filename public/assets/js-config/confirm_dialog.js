function confirmDialog(data, reload = true) {
	var link 	= $(data).data().link;
    var title 	= $(data).data().title;
    var text 	= $(data).data().text;
	var post	= $(data).data().post;

	if (!reload) {
		var table = $(data).data().table;
	}
	
	swal({
		title: title,
		text: text,
		icon: "warning",
		showCancelButton: true,
		buttons: {
			cancel: {
				text: "Batal",
				value: null,
				visible: true,
				className: "btn-warning",
				closeModal: true,
			},
			confirm: {
				text: "Ya",
				value: true,
				visible: true,
				className: "btn-success",
				closeModal: false,
			},
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			$.ajax({
				type: "POST",
				url: link,
				dataType: "json",
				data: post,
				success: function(data) {
					if (data.response) {
						swal({
							title: "Sukses!",
							text: data.text,
							icon: "success"
						}).then(function() {
							if (reload) {
								location.reload();
							} else {
								$('#' + table).DataTable().ajax.reload(null, false); //posisi paginantion tetap sesuai yang dibuka
							}
						});
					} else {
						swal({
							title: "Gagal!",
							text: data.text,
							icon: "error"
						}).then(function() {
							if (reload) {
								location.reload();
							} else {
								$('#' + table).DataTable().ajax.reload(null, false); //posisi paginantion tetap sesuai yang dibuka
							}
						});
					}
				},
				error: function(data) {
					swal({
						title: "Gagal!",
						text: 'Error saat kirim data',
						icon: "error"
					}).then(function() {
						if (reload) {
							location.reload();
						} else {
							$('#' + table).DataTable().ajax.reload(null, false); //posisi paginantion tetap sesuai yang dibuka
						}
					});
				}
			});
		}
	});
}