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
			->setDescription("Daftar Nama Santri PPMH")
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


$sql1="select * from nama_komplek";
$result1 = $db->Execute($sql1);
while (!$result1->EOF) {
	$id_komplek = $result1->fields["id_namakomplek"];
	$nama_komplek = $result1->fields["nama_komplek"];
	$object->setActiveSheetIndex(0)
	->setCellValue('A'.$coordinatRow, $nama_komplek);
	$object->getActiveSheet()->mergeCells("A".$coordinatRow.":E".$coordinatRow);
	$coordinatRow++;
	$coordinatKomplek = $coordinatRow;
	$object->setActiveSheetIndex(0)
	->setCellValue('A'.$coordinatRow, 'NO')
	->setCellValue('B'.$coordinatRow, 'NIS')
	->setCellValue('C'.$coordinatRow, 'Nama Santri')
	->setCellValue('D'.$coordinatRow, 'Kelas')
	->setCellValue('E'.$coordinatRow, 'Alamat');
	$object->getActiveSheet()->getStyle("A".($coordinatKomplek-1).":E".($coordinatRow))->applyFromArray($styleArrayCenter);
	$coordinatRow++;

	$sql2="select * from komplek where id_komplek like '".$id_komplek."_'";
	$result2 = $db->Execute($sql2);

	while (!$result2->EOF) {
		$id_kamar = $result2->fields["id_komplek"];
		$nama_kamar = $result2->fields["nama_komplek"];
		$sql3="select *, t_santri.kelurahan AS id_kelurahan_temp from t_santri, komplek,kelas,status_santri,provinsi,kota,kecamatan,kelurahan,institusi where t_santri.id_komplek=komplek.id_komplek and t_santri.id_kelas=kelas.id_kelas and t_santri.profesi=institusi.id_institusi and t_santri.id_status=status_santri.id_status and t_santri.kelurahan=kelurahan.id and t_santri.kecamatan=kecamatan.id and t_santri.kota=kota.id and t_santri.provinsi=provinsi.id and kts = 1 and t_santri.id_komplek = '".$id_kamar."' ORDER BY nis";
		$result3=$db->Execute($sql3);

			while (!$result3->EOF) {
		        $nis= $result3->fields["nis"];
				$nama = decode($result3->fields["nama"]);
				$kelas = $result3->fields["kelas"];
				if ($result3->fields["id_kelurahan_temp"] != 1 ) {
					$alamat = $result3->fields["alamat"].' '.$result3->fields["kelurahan"].' '.$result3->fields["kecamatan"].' '.$result3->fields["kota"].'. '.$result3->fields["provinsi"];
				} else {
					$alamat = $result3->fields["alamat"];
				}
				// $kamar = $result3->fields["nama_komplek"];
				// $kts = $result3->fields["kts"];

				$object->setActiveSheetIndex(0)
				->setCellValue('A'.$coordinatRow, $i);
				$object->setActiveSheetIndex(0)
				->setCellValue('B'.$coordinatRow, $nis);
				$object->setActiveSheetIndex(0)
				->setCellValue('C'.$coordinatRow, $nama);
				$object->setActiveSheetIndex(0)
				->setCellValue('D'.$coordinatRow, $kelas);
				$object->setActiveSheetIndex(0)
				->setCellValue('E'.$coordinatRow, $alamat);
				//autosize


				$i++;
				$coordinatRow++;
				$result3->MoveNext();
			}
		// foreach(range($coordinatRow,$coordinatRow) as $rowID) {
		// 	$object->getActiveSheet()->getRowDimension($rowID)
		// 	->setRowHeight(5);
		// }
		$result2->MoveNext();
	}
	$object->getActiveSheet()->getStyle("A".$coordinatKomplek.":E".($coordinatRow-2))->applyFromArray($styleBorderArray);

	$coordinatRow++;
	$result1->MoveNext();

}







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
			foreach(range('A','E') as $columnID) {
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
			header('Content-Disposition: attachment;filename="Laporan KTS.xlsx";');
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