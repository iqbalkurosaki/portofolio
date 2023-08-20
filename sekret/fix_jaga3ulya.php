<?php
    function decode($teks){
        return html_entity_decode($teks,ENT_QUOTES);
    }
    function code($teks)
    {
        return htmlentities($teks, ENT_QUOTES);
    }

    require_once "config/config.php";
    require_once "library/PhpSpreadsheet-master/vendor/autoload.php";;

    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


    $spreadsheet = $reader->load("Daftar Jaga Romadhon.xlsx");
    // Retrieve the worksheet called 'worksheet name'
    $sheet = $spreadsheet->getSheetByName("Jadwal jaga");

    $fixedSheet = new Spreadsheet();
	$object = $fixedSheet->getActiveSheet();

    $sheetData = $sheet->toArray();


    $coordinatRow=1;
    $object
        ->setCellValue('A'.$coordinatRow, 'NO.')
        ->setCellValue('B'.$coordinatRow, 'NAMA SANTRI')
        ->setCellValue('C'.$coordinatRow, 'No. HP');
    foreach ($sheetData AS $row) {
        if ($row[4] == "3 ULYA") {
            $coordinatRow++;
            $sql = "SELECT nama, no_hp FROM t_santri WHERE nama LIKE '".code($row[2])."%'";
            $result = $db->Execute($sql);
            foreach ($row AS $col) {
                // echo $col."---";
            }
            // print_r($result->recordCount());
            // echo $row[2]."--".$row[5]."==>".$result->fields["no_hp"];
            $object
                ->setCellValue('A'.$coordinatRow, $coordinatRow)
                ->setCellValue('B'.$coordinatRow, decode($result->fields["nama"]))
                ->setCellValue('C'.$coordinatRow, $result->fields["no_hp"]);
			$object->getCell('C'.$coordinatRow)->setDataType('s');
            // echo "<br>";
        }
    }

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

    $writer = new Xlsx($fixedSheet);
    $fileName = 'No HP 3 Ulya.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="'. $fileName.'"');
    $writer->save('php://output');
?>