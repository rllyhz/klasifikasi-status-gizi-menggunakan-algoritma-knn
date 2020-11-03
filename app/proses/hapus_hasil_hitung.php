<?php 

require_once __DIR__ . '/../init.php';


if ( isset($_GET["id"]) ) {

	if ( hapusDataHasilHitungBerdasarkanId(intval($_GET["id"])) ) {

		echo "<script>
				alert('Berhasil menghapus data!')
				const getUrl = window.location;
				const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
				window.location.href = baseUrl + '/data_hasil_hitung.php';
			</script>";

	} else {

		echo "<script>
				alert('Gagal menghapus data!')
				const getUrl = window.location;
				const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
				window.location.href = baseUrl + '/data_hasil_hitung.php';
			</script>";

	}


} else {

	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/index.php';
		</script>";
	return;
}