<?php 

require_once __DIR__ . '/../init.php';


if (isset($_FILES["file_dataset"])) {
	$namaFile = $_FILES["file_dataset"]["name"];
	$tipeFile = $_FILES["file_dataset"]["type"];
	$tmp_name = $_FILES["file_dataset"]["tmp_name"];
	$sizeFile = $_FILES["file_dataset"]["size"];
	$error = $_FILES["file_dataset"]["error"];

	$namaDanTipeFile = explode(".", $namaFile);
	$namaFile = $namaDanTipeFile[0];
	$tipeFileReal = $namaDanTipeFile[1];
	$namaBaruFile = date("Y-m-d") . "_" . $namaFile . "." . $tipeFileReal;

	if (!move_uploaded_file($tmp_name, __DIR__ . "/../file_import/" . $namaBaruFile))
		return false;
	

	$hasil = importDataset(__DIR__ . "/../file_import/" . $namaBaruFile);

	if ($hasil) {
		
		echo "<script>
			alert('Berhasil mengimport dataset!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/import_dataset.php';
		</script>";

	} else {

		echo "<script>
			alert('Gagal mengimport dataset!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/import_dataset.php';
		</script>";
	}

} else {
	echo "<script>
			alert('Maaf, aktivitas ini tidak diizinkan!')
			const getUrl = window.location;
			const baseUrl = getUrl .protocol + '//' + getUrl.host + '/' + getUrl.pathname.split('/')[1];
			window.location.href = baseUrl + '/import_dataset.php';
		</script>";
	return;
}