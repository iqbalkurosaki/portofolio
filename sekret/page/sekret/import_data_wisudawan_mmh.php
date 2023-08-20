<?php
    function decode($teks){
        return html_entity_decode($teks,ENT_QUOTES);
    }
    require_once "../../config/config.php";
	// require_once "../../library/php-excel/PHPExcel.php";
	require_once "../../library/PhpSpreadsheet-master/vendor/autoload.php";
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$sheet = new Spreadsheet();
	$object = $sheet->getActiveSheet();
	// $data['post'] = $_POST;
			
			// if (count($data['rekap'])<1){
			//	redirect('laporan/dataeskalasi?error=4');
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
			->setTitle("DAFTAR NAMA WISUDAWAN MMH-PPMH")
			->setSubject("wisuda")
			->setDescription("Daftar Nama Santri, Ayah, Asal Wisudawan MMH-PPMH")
			->setKeywords("Santri PPMH")
			->setCategory("Daftar Nama Santri");
		
	

			// $object->setActiveSheetIndex(0)
			// ->setCellValue('A1', 'NO')
			// ->setCellValue('B1', 'NIS')
			// ->setCellValue('C1', 'Nama Santri')
			// ->setCellValue('D1', 'KMR')
			// ->setCellValue('E1', 'KTS');

	
	// $ke = 0;
	$i=1;
	$coordinatRow=1;


$sql1="select * from kelas WHERE kelas IN ('4A ULA', '4B ULA', '3 WUSTHO', '3 ULYA')";
$result1 = $db->Execute($sql1);
while (!$result1->EOF) {
	$id_kelas = $result1->fields["id_kelas"];
	$kelas = $result1->fields["kelas"];
	$object->setCellValue('A'.$coordinatRow, $kelas);
	$object->mergeCells("A".$coordinatRow.":D".$coordinatRow);
	$coordinatRow++;
	$coordinatKomplek = $coordinatRow;
	$object
		->setCellValue('A'.$coordinatRow, 'NO.')
		->setCellValue('B'.$coordinatRow, 'NAMA SANTRI')
		->setCellValue('C'.$coordinatRow, 'NAMA AYAH')
		->setCellValue('D'.$coordinatRow, 'ASAL');
	$object->getStyle("A".($coordinatKomplek-1).":D".($coordinatRow))->applyFromArray($styleArrayCenter);
	$coordinatRow++;
    $sql2="select t_santri.nama, t_santri.ayah, kota.kota, provinsi.provinsi FROM kelas, t_santri, kota, provinsi, status_santri where t_santri.id_kelas=kelas.id_kelas and t_santri.kota=kota.id and t_santri.provinsi=provinsi.id and status_santri.id_status = t_santri.id_status AND t_santri.id_kelas = '".$id_kelas."' AND status_santri.status_santri NOT IN ('Boyong', 'Mutakhorijin', 'Mutakhorijin Pengurus') ORDER BY nama";

    $result2=$db->Execute($sql2);

    while (!$result2->EOF) {
        $nama = strtoupper(decode($result2->fields["nama"]));
        $ayah = strtoupper(decode($result2->fields["ayah"]));
        $alamat = strtoupper($result2->fields["kota"]);
        // $alamat = explode(" ", $result2->fields["kota"]);
        // array_shift($alamat);
        $alamat = strstr($alamat, " ");
        // print_r($alamat);
        $alamat = strtoupper($alamat.', '.$result2->fields["provinsi"]);

        $object
            ->setCellValue('A'.$coordinatRow, $i)
            ->setCellValue('B'.$coordinatRow, $nama)
            ->setCellValue('C'.$coordinatRow, $ayah)
            ->setCellValue('D'.$coordinatRow, $alamat);

        //autosize
        // $object->getCell('E'.$coordinatRow)->setDataType('s');

        $i++;
        $coordinatRow++;
        $result2->MoveNext();
    }
		// jarak satu row sempit antar kamar	
		// foreach(range($coordinatRow,$coordinatRow) as $rowID) {
		// 	$object->getRowDimension($rowID)
		// 		->setRowHeight(5);
		// }
	$object->getStyle("A".$coordinatKomplek.":D".($coordinatRow-1))->applyFromArray($styleBorderArray);
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
			// 	->setCellValue('F'.$coordinatRow2, " ".$nama->id_kelas);
			// 	$object->setActiveSheetIndex(0)
			// 	->setCellValue('G'.$coordinatRow2, " ".$nama->nama_komplek);
			// 	$object->getActiveSheet()->setTitle("".$nama->nama_komplek);

			// 	$idkom=$nama->id_kelas;

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
			foreach(range('A','D') as $columnID) {
				$object->getColumnDimension($columnID)
				->setAutoSize(true);
			}

			// $object->getStyle('E:E')
			// 	->getNumberFormat()
			// 	->setFormatCode('0');

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
		$fileName = 'DAFTAR NAMA WISUDAWAN MMH-PPMH.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. $fileName.'"');
        $writer->save('php://output');
		// $object->disconnectWorksheets();
		// unset($object);
	
?>