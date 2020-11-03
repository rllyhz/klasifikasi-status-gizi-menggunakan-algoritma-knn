<?php

require_once __DIR__ . '/app/init.php';

bersihkanHasilHitungDariSession();

$data = ambilSemuaDataHasilHitung();

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
	
	<title>Data Hasil Hitung | Klasifikasi Status Gizi</title>
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
			<a href="data_hasil_hitung.php" class="btn btn-secondary-outline btn-sm link" style="margin-right: 20px;">Data Hasil Hitung</a>
		</div>

		<div class="container-fluid my-4">
			<div class="card">
				<div class="card-title">
					<h3>Tabel Data Hasil Hitung</h3>
				</div>
				<div class="card-body mt-3">
					<table class="table">
						<thead class="thead-light">
					    <tr>
					      <th class="text-center">No</th>
					      <th class="text-center">Nama</th>
					      <th class="text-center">Jenis Kelamin</th>
					      <th class="text-center">Umur</th>
					      <th class="text-center">Berat Badan</th>
					      <th class="text-center">Tinggi Badan</th>
					      <th class="text-center">Lingkar Kepala</th>
					      <th class="text-center">Jarak Hasil</th>
					      <th class="text-center">Nilai K</th>
					      <th class="text-center">Klasifikasi</th>
					      <th class="text-center">Aksi</th>
					    </tr>
					  </thead>
						<tbody>
						<?php if ( !isset($data) || $data === null || empty($data) ) { ?>
							<tr>
								<th colspan="11" style="padding: 1rem;">Belum ada data hitung</th>
							</tr>
						<?php } else { ?>
					  	<?php $i = 1; ?>
					  	<?php foreach ($data as $dt) : ?>
					  		<tr>
					  			<td align="center"><?= $i; ?></td>
					  			<td><?= $dt['nama']; ?></td>
					  			<td><?= $dt['jenis_kelamin'] == 1 ? "Laki - laki" : "Perempuan";  ?></td>
					  			<td align="center"><?= $dt['umur']; ?> Bulan</td>
					  			<td align="center"><?= $dt['berat_badan']; ?> Kg</td>
					  			<td align="center"><?= $dt['tinggi_badan']; ?> Cm</td>
					  			<td align="center"><?= $dt['lingkar_kepala']; ?> Cm</td>
					  			<td align="center"><?= $dt['jarak_hasil']; ?></td>
					  			<td align="center"><?= $dt['nilai_k']; ?></td>
					  			<?php if ($dt['klasifikasi'] == 'buruk') { ?>
					  				<td align="center">
					  					<span class="badge badge-danger"><?= ucfirst($dt['klasifikasi']); ?></span>
					  				</td>
					  			<?php } else if ($dt['klasifikasi'] == 'kurang') { ?>
					  				<td align="center">
					  					<span class="badge badge-warning"><?= ucfirst($dt['klasifikasi']); ?></span>
				  					</td>
					  			<?php } else if ($dt['klasifikasi'] == 'baik') { ?>
					  				<td align="center">
					  					<span class="badge badge-success"><?= ucfirst($dt['klasifikasi']); ?></span>
				  					</td>
				  				<?php } else if ($dt['klasifikasi'] == 'lebih') { ?>
				  					<td align="center">
				  						<span class="badge badge-primary"><?= ucfirst($dt['klasifikasi']); ?></span>
			  						</td>
			  					<?php } ?>

			  					 <td align="center" class="nowrap">
							  	 	<a href="./app/proses/hapus_hasil_hitung.php?id=<?= $dt['id']; ?>" role="button" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
							  	 </td>
					  		</tr>
					  	 <?php $i++; ?>
					  	 <?php endforeach; ?>
					  	 <?php } ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>

	</div>


	<script src="./public/js/app.js"></script>
</body>
</html>