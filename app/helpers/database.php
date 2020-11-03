<?php

define('DB_HOST', $_ENV["DB_HOST"]);
define('DB_NAME', $_ENV["DB_NAME"]);
define('DB_USER', $_ENV["DB_USER"]);
define('DB_PASS', $_ENV["DB_PASS"]);

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function tambahData($data, $namaTabel) {
	global $conn;

	$query = "INSERT INTO `".$namaTabel."` (nama, jenis_kelamin, umur, berat_badan, tinggi_badan, lingkar_kepala, klasifikasi) VALUES ('".$data[0]."', ".$data[1].", ".$data[2].", ".$data[3].", ".$data[4].", ".$data[5].", '".$data[6]."')";

	return $conn->query($query) === TRUE ? true : $conn->error;
}

function ambilSemuaDataset() {
	global $conn;

	$data = [];
	$query = "SELECT * FROM `dataset`";
	$hasil = $conn->query($query);

	if ($hasil->num_rows > 0) {
		while ($barisData = $hasil->fetch_assoc()) {
			$data[] = $barisData;
		}
	}

	return $data;
}


function tambahDataset($dataPost) {
	global $conn;
	
	$nama = htmlspecialchars($dataPost["nama"]);
	$jenis_kelamin = htmlspecialchars($dataPost["jenis_kelamin"]);
	$umur = htmlspecialchars($dataPost["umur"]);
	$berat_badan = htmlspecialchars($dataPost["berat_badan"]);
	$tinggi_badan = htmlspecialchars($dataPost["tinggi_badan"]);
	$lingkar_kepala = htmlspecialchars($dataPost["lingkar_kepala"]);
	$klasifikasi = htmlspecialchars($dataPost["klasifikasi"]);

	$query = "INSERT INTO `dataset` (id, nama, jenis_kelamin, umur, berat_badan, tinggi_badan, lingkar_kepala, klasifikasi) VALUES (null, '$nama', '$jenis_kelamin', '$umur', '$berat_badan', '$tinggi_badan', '$lingkar_kepala', '$klasifikasi')";

	$hasil = $conn->query($query);

	if ($hasil) {
	  return true;
	} else {
	  return false;
	}
}


function ambildataBerdasarkanId(int $id) {
	global $conn;

	$query = "SELECT * FROM `dataset` WHERE id=$id";
	$hasil = $conn->query($query);

	if ($hasil->num_rows > 0) {
		return $hasil->fetch_assoc();
	}

	return null;
}

function editDataBerdasarkanId(array $dataBaru) {
	global $conn;

	$id = htmlspecialchars(($dataBaru["id"]));
	$nama = htmlspecialchars($dataBaru["nama"]);
	$jenis_kelamin = htmlspecialchars($dataBaru["jenis_kelamin"]);
	$umur = htmlspecialchars($dataBaru["umur"]);
	$berat_badan = htmlspecialchars($dataBaru["berat_badan"]);
	$tinggi_badan = htmlspecialchars($dataBaru["tinggi_badan"]);
	$lingkar_kepala = htmlspecialchars($dataBaru["lingkar_kepala"]);
	$klasifikasi = htmlspecialchars($dataBaru["klasifikasi"]);

	$query = "UPDATE `dataset` SET `nama`='$nama', jenis_kelamin='$jenis_kelamin', umur='$umur', berat_badan='$berat_badan', tinggi_badan='$tinggi_badan', lingkar_kepala='$lingkar_kepala', klasifikasi='$klasifikasi' WHERE id=$id";

	$hasil = $conn->query($query);

	if ($hasil) {
		return true;
	}

	return false;
}


function hapusDataBerdasarkanId(int $id) {
	global $conn;

	$query = "DELETE FROM `dataset` WHERE id=$id";
	$hasil = $conn->query($query);

	if ($hasil) {
		return true;
	}

	return false;
}



/*
 * TABEL HASIL HITUNG
 */
function ambilSemuaDataHasilHitung() {
	global $conn;

	$data = [];
	$query = "SELECT * FROM `hasil_hitung`";
	$hasil = $conn->query($query);

	if ($hasil->num_rows > 0) {
		while ($barisData = $hasil->fetch_assoc()) {
			$data[] = $barisData;
		}
	}

	return $data;
}

function simpanDataHasilHitung(array $dataYangDiuji, string $klasifikasi, float $jarakHasil, int $nilaiK) {
	global $conn;

	$nama = $dataYangDiuji["nama"];
	$jenis_kelamin = $dataYangDiuji["jenis_kelamin"];
	$umur = $dataYangDiuji["umur"];
	$berat_badan = $dataYangDiuji["berat_badan"];
	$tinggi_badan = $dataYangDiuji["tinggi_badan"];
	$lingkar_kepala = $dataYangDiuji["lingkar_kepala"];
	$klasifikasi = $klasifikasi;
	$jarak_hasil = $jarakHasil;
	$nilai_k = $nilaiK;

	$query = "INSERT INTO `hasil_hitung` (id, nama, jenis_kelamin, umur, berat_badan, tinggi_badan, lingkar_kepala, jarak_hasil, klasifikasi, nilai_k) VALUES (null, '$nama', '$jenis_kelamin', '$umur', '$berat_badan', '$tinggi_badan', '$lingkar_kepala', '$jarak_hasil', '$klasifikasi', '$nilai_k')";

	$hasil = $conn->query($query);

	if ($hasil) {
	  return true;
	} else {
	  return false;
	}
}


function hapusDataHasilHitungBerdasarkanId(int $id) {
	global $conn;

	$query = "DELETE FROM `hasil_hitung` WHERE id=$id";
	$hasil = $conn->query($query);

	if ($hasil) {
		return true;
	}

	return false;
}