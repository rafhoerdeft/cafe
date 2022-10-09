function deleteAllData(data) {
	var dataid      = data.dataid;
	var link        = data.link;
	var table       = data.table;
	var soft        = data.soft;
	
	swal({
		title: "Hapus Data",
		text: "Apakah data yang dipilih ingin dihapus?",
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
				text: "Ya, Hapus",
				value: true,
				visible: true,
				className: "btn-danger",
				closeModal: false,
			},
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			 $.ajax({
				type: "POST",
				url: link,
				dataType: "json",
				data: {
					table: table,
					dataid: dataid,
					soft: soft
				},
				success: function(data) {
					if (data.success) {
						swal({
							title: "Sukses!",
							text: "Data berhasil dihapus",
							icon: "success"
						}).then(function() {
							location.reload();
						});
					} else {
						swal({
							title: "Gagal!",
							text: "Data gagal dihapus. " + data.alert,
							icon: "error"
						}).then(function() {
							location.reload();
						});
					}
				},
				error: function(data) {
					swal({
						title: "Gagal!",
						text: 'Error saat kirim data',
						icon: "error"
					}).then(function() {
						location.reload();
					});
				}
			});
		}
	});
}

function deleteData(data, reload = true) {
	var link = $(data).data().link;
	var id = $(data).data().id;
	if (!reload) {
		var table = $(data).data().table;
	}
	
	swal({
		title: "Hapus Data",
		text: "Apakah data ini ingin dihapus?",
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
				text: "Ya, Hapus",
				value: true,
				visible: true,
				className: "btn-danger",
				closeModal: false,
			},
		},
	}).then((isConfirm) => {
		if (isConfirm) {
			$.ajax({
				type: "POST",
				url: link,
				dataType: "json",
				data: {
					id: id
				},
				success: function(data) {
					if (data.success) {
						swal({
							title: "Sukses!",
							text: "Data berhasil dihapus",
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
							text: "Data gagal dihapus. " + data.alert,
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

