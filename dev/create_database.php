<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..//");
$dotenv->load();

$DB_HOST = $_ENV["DB_HOST"];
$DB_NAME = $_ENV["DB_NAME"];
$DB_USER = $_ENV["DB_USER"];
$DB_PASS = $_ENV["DB_PASS"];

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function createTabelDataset() {
	global $conn;

	$query = "CREATE TABLE IF NOT EXISTS `dataset` (
			id INT PRIMARY KEY AUTO_INCREMENT,
			nama VARCHAR(255),
			jenis_kelamin INT(1),
			umur INT(6),
			berat_badan FLOAT,
			tinggi_badan FLOAT,
			lingkar_kepala FLOAT,
			klasifikasi VARCHAR(20)
	)";

	return $conn->query($query);
}

function createTabelHasilHitung() {
	global $conn;

	$query = "CREATE TABLE IF NOT EXISTS `hasil_hitung` (
			id INT PRIMARY KEY AUTO_INCREMENT,
			nama VARCHAR(255),
			jenis_kelamin INT(1),
			umur INT(6),
			berat_badan FLOAT,
			tinggi_badan FLOAT,
			lingkar_kepala FLOAT,
			jarak_hasil FLOAT,
			klasifikasi VARCHAR(20),
			nilai_k INT
	)";

	return $conn->query($query);
}


createTabelDataset();
createTabelHasilHitung();

die(print("Database telah di set.\n"));