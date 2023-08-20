<?php
    function decode($teks){
        return html_entity_decode($teks,ENT_QUOTES);
    }
    require_once "../../config/config.php";
	require_once "../../library/php-excel/PHPExcel.php";
	$object = new PHPExcel();
	// $data['post'] = $_POST;
			
			// if (count($data['rekap'])<1){
			//	redirect('laporan/dataeskalasi?error=4');
			// }
			$styleArrayCenter = array(
				'font'  => array(
			  		'bold'  => TRUE
					),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
						)
					)
				);
			$styleBorderArray = array(
				'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
					),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
						)
					)
				);
			
			$styleCenter = array(
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
				)
			);
			
			$object->getProperties()->setCreator("Pondok Pesantren Miftahul Huda")
			->setLastModifiedBy("Pondok Pesantren Miftahul Huda")
			->setTitle("DAFTAR NAMA SANTRI PPMH")
			->setSubject("santri")
			->setDescription("Data Siswa MMH-PPMH")
			->setKeywords("Santri PPMH")
			->setCategory("Daftar Nama Santri");
		
	

			// $object->setActiveSheetIndex(0)
			// ->setCellValue('A1', 'NO')
			// ->setCellValue('B1', 'NIS')
			// ->setCellValue('C1', 'Nama Santri')
			// ->setCellValue('D1', 'KMR')
			// ->setCellValue('E1', 'KTS');

	
	$ke = 0;
	// $all = 25;
	$i=1;
	$coordinatRow=1;
	$year=date("Y")-1;

	
	//$object->getActiveSheet()->mergeCells("A".$coordinatRow.":F".$coordinatRow);
	$object->setActiveSheetIndex(0)
	->setCellValue('A'.$coordinatRow, 'NO.');
	$object->setActiveSheetIndex(0)
	->setCellValue('B'.$coordinatRow, 'NIS');
	$object->setActiveSheetIndex(0)
	->setCellValue('C'.$coordinatRow, 'Nama');
	$object->setActiveSheetIndex(0)
	->setCellValue('D'.$coordinatRow, '');
	$object->setActiveSheetIndex(0)
	->setCellValue('E'.$coordinatRow, 'Tipe Keanggotaan');
	$object->setActiveSheetIndex(0)
	->setCellValue('F'.$coordinatRow, '');
	$object->setActiveSheetIndex(0)
	->setCellValue('G'.$coordinatRow, 'Alamat');
	$object->setActiveSheetIndex(0)
	->setCellValue('H'.$coordinatRow, 'Kode Pos');
	$object->setActiveSheetIndex(0)
	->setCellValue('I'.$coordinatRow, 'Institusi');
	$object->setActiveSheetIndex(0)
	->setCellValue('J'.$coordinatRow, '');
	$object->setActiveSheetIndex(0)
	->setCellValue('K'.$coordinatRow, '');
	$object->setActiveSheetIndex(0)
	->setCellValue('L'.$coordinatRow, 'No. Identitas');
	$object->setActiveSheetIndex(0)
	->setCellValue('M'.$coordinatRow, 'No. Tlp');
		$object->setActiveSheetIndex(0)
	->setCellValue('N'.$coordinatRow, '');
	$object->setActiveSheetIndex(0)
	->setCellValue('O'.$coordinatRow, 'Tanggal Registrasi');
	$object->setActiveSheetIndex(0)
	->setCellValue('P'.$coordinatRow, 'Berlaku Hingga');
	$object->setActiveSheetIndex(0)
	->setCellValue('Q'.$coordinatRow, 'Tanggal Lahir');
	$object->setActiveSheetIndex(0)
	->setCellValue('R'.$coordinatRow, 'Catatan Tambahan');
	
	$object->getActiveSheet()->getStyle("A".($coordinatRow-1).":R".($coordinatRow))->applyFromArray($styleArrayCenter);
	$coordinatRow++;

	$time = date("Y-m-d H:i:s", strtotime("2021-01-01 00:00:00"));
	$tgl_berlaku = date("Y-m-d", strtotime("+5 year"));
		// echo $time;
		//$sql3="select nama, komplek.nama_komplek, kelas.kelas,kecamatan.kecamatan, kota.kota, no_hp FROM t_santri, komplek, kota,kecamatan,kelas where t_santri.id_komplek=komplek.id_komplek and t_santri.kecamatan=kecamatan.id and t_santri.kota=kota.id and t_santri.id_kelas = kelas.id_kelas and t_santri.id_kelas = '".$id_kelas."' and last_update > '".$time."' ORDER BY t_santri.id_kelas";
		$sql = "SELECT * FROM t_santri where last_update > '".$time."' and id_status = 'SB' and Year(tgl_masuk) >= $year ORDER BY id_kelas";
		// echo $sql3;
		$result=$db->Execute($sql);

			while (!$result->EOF) {
				$nis= $result->fields["nis"];
				$nama = $result->fields["nama"];
            	$tempat_l = $result->fields["tempat_lahir"];
				$tgl_l = $result->fields["tgl_lahir"];
				$ttl=$tempat_l.','.$tgl_l;
				
				$no_hp=$result->fields["no_hp"];

				$profesi=$result->fields["profesi"];
				$sql2 = "SELECT * FROM institusi where id_institusi=$profesi";
                $result2=$db->execute($sql2);
                $nama_institusi=$result2->fields["nama_institusi"];
            
				$jurusan=$result->fields["jurusan"];
				$profesi2=$jurusan.','.$nama_institusi;
				
				$ayah=$result->fields["ayah"];
				$ibu=$result->fields["ibu"];
				$nama_ortu='Nama Ayah : '.$ayah. ', Ibu : '.$ibu;
				
				$wali=$result->fields["wali"];
				$tlp_rumah=$result->fields["tlp_rmh"];
				$alamat = $result->fields["alamat"];
				
				$kota = $result->fields["kota"];
				$sql3 = "SELECT * FROM kota where id=$kota";
                $result3=$db->execute($sql3);
                $nama_kota = $result3->fields["kota"];

				$provinsi=$result->fields["provinsi"];
				$sql4 = "SELECT * FROM provinsi where id=$provinsi";
                $result4=$db->execute($sql4);
                $nama_provinsi = $result4->fields["provinsi"];
				
				$kode_pos=$result->fields["kode_pos"];
				$alamat_lengkap=$alamat.','.$nama_kota.'.'.$nama_provinsi;
				
				$tgl_masuk=$result->fields["tgl_masuk"];

				$id_komplek=$result->fields["id_komplek"];
				$sql5 = "SELECT * FROM komplek where id_komplek=$id_komplek";
                $result5=$db->execute($sql5);
                $kamar = $result5->fields["nama_komplek"];

				$id_kelas=$result->fields["id_kelas"];
				$sql6 = "SELECT * FROM kelas where id_kelas=$id_kelas";
                $result6=$db->execute($sql6);
                $kelas = $result6->fields["kelas"];

				$id_status = $result->fields["id_status"];
				$sql7 = "SELECT * FROM status_santri where id_status='$id_status'";
                $result7=$db->execute($sql7);
                $status = $result7->fields["status_santri"];
				// $kamar = $result3->fields["nama_komplek"];
				// $kts = $result3->fields["kts"];

				$object->setActiveSheetIndex(0)
				->setCellValue('A'.$coordinatRow, $i);
				$object->setActiveSheetIndex(0)
				->setCellValue('B'.$coordinatRow, $nis);
				$object->setActiveSheetIndex(0)
				->setCellValue('C'.$coordinatRow, $nama);
				$object->setActiveSheetIndex(0)
				->setCellValue('D'.$coordinatRow, '');
				$object->setActiveSheetIndex(0)
				->setCellValue('E'.$coordinatRow, 'Standard');
				$object->setActiveSheetIndex(0)
				->setCellValue('F'.$coordinatRow, '');
				$object->setActiveSheetIndex(0)
				->setCellValue('G'.$coordinatRow, $alamat_lengkap);
				$object->setActiveSheetIndex(0)
				->setCellValue('H'.$coordinatRow, $kode_pos);
				$object->setActiveSheetIndex(0)
				->setCellValue('I'.$coordinatRow, 'PPMH');
				$object->setActiveSheetIndex(0)
				->setCellValue('J'.$coordinatRow, '');
				$object->setActiveSheetIndex(0)
				->setCellValue('K'.$coordinatRow, '');
				$object->setActiveSheetIndex(0)
				->setCellValue('L'.$coordinatRow, $nis);
				$object->setActiveSheetIndex(0)
				->setCellValue('M'.$coordinatRow, $no_hp);
					$object->setActiveSheetIndex(0)
				->setCellValue('N'.$coordinatRow, '');
				$object->setActiveSheetIndex(0)
				->setCellValue('O'.$coordinatRow, $tgl_masuk);
				$object->setActiveSheetIndex(0)
				->setCellValue('P'.$coordinatRow, $tgl_berlaku);
				$object->setActiveSheetIndex(0)
				->setCellValue('Q'.$coordinatRow, $tgl_l);
				$object->setActiveSheetIndex(0)
				->setCellValue('R'.$coordinatRow, 'Anggota Baru');
				//autosize
				$object->setActiveSheetIndex(0)
				->getCell('B'.$coordinatRow)->setDataType('s');
				$object->setActiveSheetIndex(0)
				->getCell('E'.$coordinatRow)->setDataType('s');

				$i++;
				$coordinatRow++;
				$result->MoveNext();
			}
		// foreach(range($coordinatRow,$coordinatRow) as $rowID) {
		// 	$object->getActiveSheet()->getRowDimension($rowID)
		// 	->setRowHeight(5);
		// }
		//$result2->MoveNext();
	
	

$object->getActiveSheet()->getStyle("A".$coordinatRow.":R".($coordinatRow-1))->applyFromArray($styleBorderArray);

	$coordinatRow++;
	







			// foreach ($sourcesantri as $santri ) {

			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('A'.$coordinatRow, $i);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('B'.$coordinatRow, $santri->id_status);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('C'.$coordinatRow, $santri->nama);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('D'.$coordinatRow, " ".$santri->nama_komplek);

			// 	$idKomplek=substr($santri->id_komplek, 0,1);
			// 	$nis= $santri->nis;
			// 	$dataTerakhirBayar = $this->trans->get_terakhir_tranksaksi($nis);

			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('E'.$coordinatRow, $dataTerakhirBayar->Syariah_Santri);
			// 	if ($dataTerakhirBayar->Hp_1==1 && $dataTerakhirBayar->Hp_2==0) {
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('F'.$coordinatRow, 1);
			// 	}else if ($dataTerakhirBayar->Hp_1==0 && $dataTerakhirBayar->Hp_2==1) {
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('F'.$coordinatRow, 1);
			// 	}else if ($dataTerakhirBayar->Hp_1==1 && $dataTerakhirBayar->Hp_2==1) {
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('F'.$coordinatRow, 2);
			// 	}else if ($dataTerakhirBayar->Hp_1==0 && $dataTerakhirBayar->Hp_2==0) {
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('F'.$coordinatRow, 0);
			// 	}
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('G'.$coordinatRow, $dataTerakhirBayar->SPD);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('H'.$coordinatRow, $dataTerakhirBayar->Lptp);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('I'.$coordinatRow, $dataTerakhirBayar->Lptp);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('J'.$coordinatRow, $dataTerakhirBayar->bulan_terakhir);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('K'.$coordinatRow, $dataTerakhirBayar->tahun_terakhir);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('L'.$coordinatRow, $dataTerakhirBayar->LKBA);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('M'.$coordinatRow, $dataTerakhirBayar->Tahunan);
				



			// }

			// $coordinatRow2=9;
			// foreach ($sourcenamakomplek as $nama) {
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('F'.$coordinatRow2, " ".$nama->id_namakomplek);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('G'.$coordinatRow2, " ".$nama->nama_komplek);
			// 	$object->getActiveSheet()->setTitle("".$nama->nama_komplek);

			// 	$idkom=$nama->id_namakomplek;

			// 	$namaKomplek=$this->santri->get_nama_kamar($idkom);
			// 	foreach ($namaKomplek as $ketKomplek) {
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('H'.$coordinatRow2, " ".$ketKomplek->nama_komplek);
			// 		$object->setActiveSheetIndex(0)
			// 		->setCellValue('I'.$coordinatRow2, " ".$ketKomplek->keterangan);
					
			// 		$idKomplekNew=$ketKomplek->id_komplek;

			// 		$namaSantri=$this->santri->get_nama_santri_perkamar($idKomplekNew);
			// 		foreach ($namaSantri as $ketSantri) {
			// 			$object->setActiveSheetIndex(0)
			// 			->setCellValue('J'.$coordinatRow2, "".$ketSantri->nama);
			// 			$coordinatRow2++;
			// 		}
			// 	}
			// }

			// $object->createSheet(1);

			// $object->setActiveSheetIndex(0);
			// $object->getActiveSheet()->setTitle("2");

			// $object->setActiveSheetIndex(1);
			// $object->getActiveSheet()->setTitle("22222");

			//autosize
			foreach(range('A','R') as $columnID) {
				$object->getActiveSheet()->getColumnDimension($columnID)
				->setAutoSize(true);
			}


		$ke++;


		// Rename worksheet
			//$object->getActiveSheet()->setTitle("$periode");
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$object->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Pemustaka Baru PPMH.xlsx";');
			header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		
		$objWriter = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
		$objWriter->save('php://output');
	
?>