<?php

require_once __DIR__ . '/app/init.php';

bersihkanHasilHitungDariSession();

$data = ambilSemuaDataset();
$munculkanAlert = false;

if ($data == null || empty($data)) {
	$munculkanAlert = true;
	$n = 0;
} else {
	$n = floor(count($data) / 2);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
	<!-- FONT AWESOME ICON -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- CUSTOM CSS -->
	<link rel="stylesheet" href="./public/css/style.css">
	<link rel="stylesheet" href="./public/css/app.css">
	
	<title>Home | Klasifikasi Status Gizi</title>
</head>
<body>
	<nav class="nav mb-4">
		<div class="container">
			<h1>Klasifikasi Status Gizi Menggunakan Metode K-NN</h1>
		</div>
	</nav>

	<div class="container">

		<div class="button-group">
			<a href="index.php" class="btn btn-secondary-outline btn-sm link">Home</a>
			<a href="dataset.php" class="btn btn-secondary-outline btn-sm link">Dataset</a>
			<a href="data_hasil_hitung.php" class="btn btn-secondary-outline btn-sm link">Data Hasil Hitung</a>
		</div>

		<div class="container-fluid my-4">
			<div class="card">
				<div class="card-title">
					<h3>Form Hitung Klasifikasi Gizi</h3>
				</div>
				<div class="card-body">
					<form action="./app/proses/hitung.php" method="POST">
				   	<div class="form-group mb-3">
						   <label for="nama">Nama</label>
						   <input type="text" name="nama" class="form-control" placeholder="Rully Ihza Mahendra" id="nama" required>
						</div>					
						<div class="row row-cols-3">
							<div class="form-group">
							   <label for="jenisKelamin">Jenis Kelamin</label>
							   <select name="jenis_kelamin" id="jenisKelamin" class="form-control" required>
							   	<option value="1">Laki-laki</option>
							   	<option value="2">Perempuan</option>
							   </select>
							</div>
							<div class="form-group">
							   <label for="umur">Umur <small>(Bulan)</small></label>
							   <input type="number" min="0" name="umur" class="form-control" id="umur" required>
							</div>
							<div class="form-group">
							   <label for="beratBadan">Berat Badan <small>(Kg)</small></label>
							   <input type="number" step="any" min="0" name="berat_badan" class="form-control" id="beratBadan" required>
							</div>
						</div>
						<div class="row row-cols-3">
							<div class="form-group">
							   <label for="tinggiBadan">Tinggi Badan <small>(Cm)</small></label>
							   <input type="number" step="any" min="0" name="tinggi_badan" class="form-control" id="tinggiBadan" required>
							</div>
							<div class="form-group">
							   <label for="lingkarKepala">Lingkar Kepala <small>(Cm)</small></label>
							   <input type="number" step="any" min="0" name="lingkar_kepala" class="form-control" id="lingkarKepala" required>
							</div>
						</div>
						<div class="row row-cols-2">
							<div class="form-group">
							   <label for="tetanggaTerdekat">Tetangga Terdekat:</label>
							   <input type="number" min="0" name="tetangga_terdekat" class="form-control" id="tetanggaTerdekat" required>
							   <small id="passwordHelpBlock" class="form-text text-muted">
								  Disarankan untuk tidak melebihi setengah dari total dataset (yaitu <?= $n; ?>) dan sebaiknya ganjil.
								</small>
							</div>
						</div>
						<button type="submit" class="btn btn-primary cta">Hitung</button>
					</form>
				</div>
			</div>
		</div>	
	</div>

	<?php if ($munculkanAlert) : ?>
		<script>alert("Tidak ada dataset!")</script>
	<?php endif; ?>

</body>
</html>