<?php 

require_once __DIR__ . '/app/init.php';

if (isset($_GET["id"])) {

	$data = ambilDataBerdasarkanId($_GET["id"]);

} else {

	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/dataset.php';
		</script>";

	die;
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
	
	<title>Edit Dataset | Klasifikasi Status Gizi</title>
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
					<h3>Form Edit Dataset</h3>
				</div>
				<div class="card-body">
					<form action="./app/proses/edit.php" method="POST">
						<input type="number" hidden name="id" value="<?= $data['id']; ?>" required>
				   	<div class="form-group mb-3">
						   <label for="nama">Nama</label>
						   <input type="text" class="form-control" placeholder="Rully Ihza Mahendra" id="nama" name="nama" value="<?= $data['nama']; ?>" required>
						</div>					
						<div class="row row-cols-3">
							<div class="form-group">
							   <label for="jenisKelamin">Jenis Kelamin</label>
							   <select name="jenis_kelamin" id="jenisKelamin" class="form-control" required>
						   		<option <?= $data["jenis_kelamin"] == "1" ? 'selected' : ''; ?> value="1">Laki-laki</option>
						   		<option <?= $data["jenis_kelamin"] == "2" ? 'selected' : ''; ?> value="2">Perempuan</option>
							   </select>
							</div>
							<div class="form-group">
							   <label for="umur">Umur <small>(Bulan)</small></label>
							   <input type="number" min="0" name="umur" class="form-control" id="umur" value="<?= $data['umur']; ?>" required>
							</div>
							<div class="form-group">
							   <label for="beratBadan">Berat Badan <small>(Kg)</small></label>
							   <input type="number" step="any" min="0" name="berat_badan" class="form-control" id="beratBadan" value="<?= $data['berat_badan']; ?>" required>
							</div>
						</div>
						<div class="row row-cols-3">
							<div class="form-group">
							   <label for="tinggiBadan">Tinggi Badan <small>(Cm)</small></label>
							   <input type="number" step="any" min="0" name="tinggi_badan" class="form-control" id="tinggiBadan" value="<?= $data['tinggi_badan']; ?>" required>
							</div>
							<div class="form-group">
							   <label for="lingkarKepala">Lingkar Kepala <small>(Cm)</small></label>
							   <input type="number" step="any" min="0" name="lingkar_kepala" class="form-control" id="lingkarKepala" value="<?= $data['lingkar_kepala']; ?>" required>
							</div>
							<div class="form-group">
						   <label for="klasifikasi">Klasifikasi</label>
						   <select name="klasifikasi" id="klasifikasi" class="form-control" required>
					   		<option <?= $data["klasifikasi"] == "lebih" ? "selected" : ""; ?> value="lebih">Lebih</option>
					   		<option <?= $data["klasifikasi"] == "baik" ? "selected" : ""; ?> value="baik">Baik</option>
						   	<option <?= $data["klasifikasi"] == "kurang" ? "selected" : ""; ?> value="kurang">Kurang</option>
						   	<option <?= $data["klasifikasi"] == "buruk" ? "selected" : ""; ?> value="buruk">Buruk</option>
						   </select>
						</div>
						</div>
						<button type="submit" class="btn btn-primary cta">Ubah</button>
						<a href="./dataset.php"><button type="button" class="btn btn-secondary cta">Kembali</button></a>
					</form>
				</div>
			</div>
		</div>	
	</div>

</body>
</html>