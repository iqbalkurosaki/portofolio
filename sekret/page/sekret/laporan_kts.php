<?php
    function decode($teks){
        return html_entity_decode($teks,ENT_QUOTES);
    }
    require_once "../../config/config.php";
	require_once "../../library/PhpSpreadsheet-master/vendor/autoload.php";
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	$sheet = new Spreadsheet();
	$object = $sheet->getActiveSheet();
	// $data['post'] = $_POST;
			
			// if (count($data['rekap'])<1){
			//	redirect('laporan/dataeskalasi?error=4');
			// }
			$styleArrayCenter = array(
				'font'  => array(
			  		'bold'  => TRUE
					),
				'alignment' => array(
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
					),
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
						)
					)
				);
			$styleBorderArray = array(
				'alignment' => array(
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
					),
				'borders' => array(
					'allBorders' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
						)
					)
				);
			
			$styleCenter = array(
				'alignment' => array(
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
				)
			);
			
			$sheet->getProperties()->setCreator("Pondok Pesantren Miftahul Huda")
			->setLastModifiedBy("Pondok Pesantren Miftahul Huda")
			->setTitle("Laporan KTS")
			->setSubject("kts")
			->setDescription("Laporan KTS")
			->setKeywords("KTS PPMH")
			->setCategory("laporan");
		
	

			// $object->setActiveSheetIndex(0)
			// ->setCellValue('A1', 'NO')
			// ->setCellValue('B1', 'NIS')
			// ->setCellValue('C1', 'Nama Santri')
			// ->setCellValue('D1', 'KMR')
			// ->setCellValue('E1', 'KTS');

	
	// $ke = 0;
	// $all = 25;
	$i=1;
	$coordinatRow=1;
	// $object->setActiveSheetIndex(0);

$sql1="select * from nama_komplek";
$result1 = $db->Execute($sql1);
while (!$result1->EOF) {
	$id_komplek = $result1->fields["id_namakomplek"];
	$nama_komplek = $result1->fields["nama_komplek"];
	$object->setCellValue('A'.$coordinatRow, $nama_komplek);
	$object->mergeCells("A".$coordinatRow.":E".$coordinatRow);
	$coordinatRow++;
	$coordinatKomplek = $coordinatRow;
	$object
		->setCellValue('A'.$coordinatRow, 'NO')
		->setCellValue('B'.$coordinatRow, 'NIS')
		->setCellValue('C'.$coordinatRow, 'Nama Santri')
		->setCellValue('D'.$coordinatRow, 'Kamar')
		->setCellValue('E'.$coordinatRow, 'KTS');
	$object->getStyle("A".($coordinatKomplek-1).":E".($coordinatRow))->applyFromArray($styleArrayCenter);
	$coordinatRow++;

	$sql2="select * from komplek where id_komplek like '".$id_komplek."_'";
	$result2 = $db->Execute($sql2);

	while (!$result2->EOF) {
		$id_kamar = $result2->fields["id_komplek"];
		$nama_kamar = $result2->fields["nama_komplek"];
		$sql3="select * from t_santri, komplek,kelas,status_santri where t_santri.id_komplek=komplek.id_komplek and t_santri.id_kelas=kelas.id_kelas and t_santri.id_status=status_santri.id_status and kts = 3 and t_santri.id_komplek = '".$id_kamar."' ORDER BY nis";
		$result3=$db->Execute($sql3);

			while (!$result3->EOF) {
		        $nis= $result3->fields["nis"];
				$nama = decode($result3->fields["nama"]);
				// $kamar = $result3->fields["nama_komplek"];
				// $kts = $result3->fields["kts"];

				$object
					->setCellValue('A'.$coordinatRow, $i)
					->setCellValue('B'.$coordinatRow, $nis)
					->setCellValue('C'.$coordinatRow, $nama)
					->setCellValue('D'.$coordinatRow, $nama_kamar);
				// $object
				// ->setCellValue('E'.$coordinatRow, $kts);
				//autosize


				$i++;
				$coordinatRow++;
				$result3->MoveNext();
			}
		// jarak satu row sempit antar kamar	
		// foreach(range($coordinatRow,$coordinatRow) as $rowID) {
		// 	$object->getRowDimension($rowID)
		// 		->setRowHeight(5);
		// }
		// $coordinatRow++;
		$result2->MoveNext();
	}
	// $object->getStyle("A".$coordinatKomplek.":E".($coordinatRow-2))->applyFromArray($styleBorderArray);
	$object->getStyle("A".$coordinatKomplek.":E".($coordinatRow-1))->applyFromArray($styleBorderArray);
	$coordinatRow++;
	$result1->MoveNext();

}







			// foreach ($sourcesantri as $santri ) {

			// 	$object
			// 	->setCellValue('A'.$coordinatRow, $i);
			// 	$object
			// 	->setCellValue('B'.$coordinatRow, $santri->id_status);
			// 	$object
			// 	->setCellValue('C'.$coordinatRow, $santri->nama);
			// 	$object
			// 	->setCellValue('D'.$coordinatRow, " ".$santri->nama_komplek);

			// 	$idKomplek=substr($santri->id_komplek, 0,1);
			// 	$nis= $santri->nis;
			// 	$dataTerakhirBayar = $this->trans->get_terakhir_tranksaksi($nis);

			// 	$object
			// 	->setCellValue('E'.$coordinatRow, $dataTerakhirBayar->Syariah_Santri);
			// 	if ($dataTerakhirBayar->Hp_1==1 && $dataTerakhirBayar->Hp_2==0) {
			// 		$object
			// 		->setCellValue('F'.$coordinatRow, 1);
			// 	}else if ($dataTerakhirBayar->Hp_1==0 && $dataTerakhirBayar->Hp_2==1) {
			// 		$object
			// 		->setCellValue('F'.$coordinatRow, 1);
			// 	}else if ($dataTerakhirBayar->Hp_1==1 && $dataTerakhirBayar->Hp_2==1) {
			// 		$object
			// 		->setCellValue('F'.$coordinatRow, 2);
			// 	}else if ($dataTerakhirBayar->Hp_1==0 && $dataTerakhirBayar->Hp_2==0) {
			// 		$object
			// 		->setCellValue('F'.$coordinatRow, 0);
			// 	}
			// 	$object
			// 	->setCellValue('G'.$coordinatRow, $dataTerakhirBayar->SPD);
			// 	$object
			// 	->setCellValue('H'.$coordinatRow, $dataTerakhirBayar->Lptp);
			// 	$object
			// 	->setCellValue('I'.$coordinatRow, $dataTerakhirBayar->Lptp);
			// 	$object
			// 	->setCellValue('J'.$coordinatRow, $dataTerakhirBayar->bulan_terakhir);
			// 	$object
			// 	->setCellValue('K'.$coordinatRow, $dataTerakhirBayar->tahun_terakhir);
			// 	$object
			// 	->setCellValue('L'.$coordinatRow, $dataTerakhirBayar->LKBA);
			// 	$object
			// 	->setCellValue('M'.$coordinatRow, $dataTerakhirBayar->Tahunan);
				



			// }

			// $coordinatRow2=9;
			// foreach ($sourcenamakomplek as $nama) {
			// 	$object
			// 	->setCellValue('F'.$coordinatRow2, " ".$nama->id_namakomplek);
			// 	$object
			// 	->setCellValue('G'.$coordinatRow2, " ".$nama->nama_komplek);
			// 	$object->setTitle("".$nama->nama_komplek);

			// 	$idkom=$nama->id_namakomplek;

			// 	$namaKomplek=$this->santri->get_nama_kamar($idkom);
			// 	foreach ($namaKomplek as $ketKomplek) {
			// 		$object
			// 		->setCellValue('H'.$coordinatRow2, " ".$ketKomplek->nama_komplek);
			// 		$object
			// 		->setCellValue('I'.$coordinatRow2, " ".$ketKomplek->keterangan);
					
			// 		$idKomplekNew=$ketKomplek->id_komplek;

			// 		$namaSantri=$this->santri->get_nama_santri_perkamar($idKomplekNew);
			// 		foreach ($namaSantri as $ketSantri) {
			// 			$object
			// 			->setCellValue('J'.$coordinatRow2, "".$ketSantri->nama);
			// 			$coordinatRow2++;
			// 		}
			// 	}
			// }

			// $object->createSheet(1);

			// $object;
			// $object->setTitle("2");

			// $object->setActiveSheetIndex(1);
			// $object->setTitle("22222");

			//autosize
			foreach(range('A','E') as $columnID) {
				$object->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			$object->getStyle('B:B')
				->getNumberFormat()
				->setFormatCode('0');
			
		// $ke++;


		// Rename worksheet
			// $object->setTitle("$periode");
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			// $sheet->setActiveSheetIndex(0);
		// Redirect output to a client’s web browser (Excel2007)
			// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			// header('Content-Disposition: attachment;filename="Laporan KTS.xlsx";');
			header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
		
		$writer = new Xlsx($sheet);
		$fileName = 'Laporan KTS.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $fileName.'"');
        $writer->save('php://output');
		// $object->disconnectWorksheets();
		// unset($object);
	
?>