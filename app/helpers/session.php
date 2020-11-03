<?php 


function simpanHasilHitungKedalamSession(array $dataUntukDihitung, int $nilaiK, array $dataHasilHitungYangTerurut, array $hasilHitung) {

	session_start();
	$_SESSION["ada_hasil_hitung"] = true;
	$_SESSION["nilai_k"] = $nilaiK;
	$_SESSION["hasil_hitung"] = $dataHasilHitungYangTerurut;
	$_SESSION["data_yang_diuji"] = $dataUntukDihitung;
	$_SESSION["klasifikasi_yang_terpilih"] = $hasilHitung["klasifikasi"];
	$_SESSION["jarak_hasil"] = $hasilHitung["jarak_hasil"];

	return true;

}

function bersihkanHasilHitungDariSession() {

	session_start();

	if (!$_SESSION["ada_hasil_hitung"]) {
		return true;
	}

	$_SESSION["ada_hasil_hitung"] = false;
	$_SESSION["nilai_k"] = null;
	$_SESSION["hasil_hitung"] = [];
	$_SESSION["data_yang_diuji"] = [];
	$_SESSION["klasifikasi_yang_terpilih"] = null;
	$_SESSION["jarak_hasil"] = null;

	return true;
}

function adaHasilHitung() {
	session_start();

	if ( isset($_SESSION["ada_hasil_hitung"]) && $_SESSION["ada_hasil_hitung"]) {
		return true;
	}

	return false;
}


function ambilSemuaHasilDariSession() {

	session_start();

	return [
		"ada_hasil_hitung" => $_SESSION["ada_hasil_hitung"],
		"nilai_k" => $_SESSION["nilai_k"],
		"hasil_hitung" => $_SESSION["hasil_hitung"],
		"data_yang_diuji" => $_SESSION["data_yang_diuji"],
		"klasifikasi_yang_terpilih" => $_SESSION["klasifikasi_yang_terpilih"],
		"jarak_hasil" => $_SESSION["jarak_hasil"],
	];
}