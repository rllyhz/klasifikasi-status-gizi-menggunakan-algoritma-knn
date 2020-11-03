<?php

function dataFormLengkap(array $data, string $formAsal) {
	if ($formAsal === 'formHitungKlasifikasi') {

		if ( isset($data["nama"]) && isset($data["jenis_kelamin"]) && isset($data["umur"]) && isset($data["berat_badan"]) && isset($data["tinggi_badan"]) && isset($data["lingkar_kepala"]) && isset($data["tetangga_terdekat"]) )
		{
			return true;
		} 

	}

	if ($formAsal === 'formEditDataset') {

		if ( isset($data["nama"]) && isset($data["jenis_kelamin"]) && isset($data["umur"]) && isset($data["berat_badan"]) && isset($data["tinggi_badan"]) && isset($data["lingkar_kepala"]) && isset($data["klasifikasi"]) && isset($data["id"]) )
		{
			return true;
		} 

	}

	if ($formAsal === 'formTambahDataset') {

		if ( isset($data["nama"]) && isset($data["jenis_kelamin"]) && isset($data["umur"]) && isset($data["berat_badan"]) && isset($data["tinggi_badan"]) && isset($data["lingkar_kepala"]) && isset($data["klasifikasi"]) )
		{
			return true;
		} 

	}

	if ($formAsal === 'formHapusDataset') {

		if ( isset($data["id"]) )
		{
			return true;
		} 

	}

	return false;
}
