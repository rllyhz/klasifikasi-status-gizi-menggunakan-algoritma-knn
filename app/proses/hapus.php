<?php

require_once __DIR__ . '/../init.php';

if (dataFormLengkap($_GET, 'formHapusDataset')) {

	$hasil = hapusDataBerdasarkanId(intval($_GET["id"]));

	if ($hasil) {

		echo "<script>
			alert('Berhasil menghapus data!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";

	} else {
		
		echo "<script>
			alert('Gagal menghapus data!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";
	}

} else {
	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";
	return;
}