<?php

require_once __DIR__ . '/../init.php';

use \Rllyhz\Dev\KNN\Schema;
use \Rllyhz\Dev\KNN\DataSet;
use \Rllyhz\Dev\KNN\Data;

if (dataFormLengkap($_POST, 'formHitungKlasifikasi')) {

	$k = intval($_POST["tetangga_terdekat"]);

	$dataUntukDihitung = [
		"nama" =>  $_POST["nama"],
		"jenis_kelamin" =>  intval($_POST["jenis_kelamin"]),
		"umur" =>  intval($_POST["umur"]),
		"berat_badan" =>  doubleval($_POST["berat_badan"]),
		"tinggi_badan" =>  doubleval($_POST["tinggi_badan"]),
		"lingkar_kepala" =>  doubleval($_POST["lingkar_kepala"]),
	];

	$semuaData = ambilSemuaDataset();

	$schema = new Schema();
	$schema
		->tambahParameter('jenis_kelamin')
		->tambahParameter('umur')
		->tambahParameter('berat_badan')
		->tambahParameter('tinggi_badan')
		->tambahParameter('lingkar_kepala')
		->setParameterKlasifikasi('klasifikasi');

	$dataset = new DataSet($schema, $k);


	foreach ($semuaData as $data) {

		$dataset->tambah(new Data([
			'nama' => $data['nama'],
			'jenis_kelamin' => intval($data['jenis_kelamin']),
			'umur' => intval($data['umur']),
			'berat_badan' => floatval($data['berat_badan']),
			'tinggi_badan' => floatval($data['tinggi_badan']),
			'lingkar_kepala' => floatval($data['lingkar_kepala']),
			'klasifikasi' => $data['klasifikasi']
		]));

	}

	$hasil = $dataset->hitung(
		new Data([
			'nama' => $dataUntukDihitung["nama"],
			'jenis_kelamin' => $dataUntukDihitung["jenis_kelamin"],
			'umur' => $dataUntukDihitung["umur"],
			'berat_badan' => $dataUntukDihitung["berat_badan"],
			'tinggi_badan' => $dataUntukDihitung["tinggi_badan"],
			'lingkar_kepala' => $dataUntukDihitung["lingkar_kepala"]
		])
	);

	$hasilHitung = $hasil["hasil_hitung"];
	$tetanggaTerdekat = $hasil["tetangga_terdekat"];
	$dataHasilHitungYangTerurut = $hasil["data_hasil_hitung_yang_terurut"];

	simpanHasilHitungKedalamSession($dataUntukDihitung, $k, $dataHasilHitungYangTerurut, $hasilHitung);

	echo "<script>
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/hasil_hitung.php';
		</script>";
	return;

} else {
	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/index.php';
		</script>";
	return;
}

