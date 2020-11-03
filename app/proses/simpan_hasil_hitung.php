<?php 

require_once __DIR__ . '/../init.php';


if ( adaHasilHitung() ) {

	$data = ambilSemuaHasilDariSession();
	$dataYangDiuji = $data["data_yang_diuji"];
	$nilaiK = $data["nilai_k"];
	$klasifikasi = $data["klasifikasi_yang_terpilih"];
	$jarakHasil = $data["jarak_hasil"];

	bersihkanHasilHitungDariSession();


	if ( simpanDataHasilHitung($dataYangDiuji, $klasifikasi, $jarakHasil, $nilaiK) ) {

		echo "<script>
				alert('Berhasil menyimpan data!')
				const getUrl = window.location;
				const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
				window.location.href = baseUrl + '/data_hasil_hitung.php';
			</script>";
		return;

	} else {

		echo "<script>
				alert('Gagal menyimpan data!')
				const getUrl = window.location;
				const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
				window.location.href = baseUrl + '/index.php';
			</script>";
		return;

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