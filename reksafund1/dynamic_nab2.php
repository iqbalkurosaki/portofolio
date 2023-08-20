<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Jakarta');
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
require_once 'koneksi.php';
require_once '../Func_DecisionTree.php' ;
$stmt = $db->query("SELECT * FROM reksadana");
$Arr_Dt = array(array());

for ($i=0; $i <100; $i++) { 
    $res = $stmt -> fetch();

    $Arr_Dt[$i]['Reksadana'] = $res[1];
    $Arr_Dt[$i]['Jenis'] = $res[2];
    $arr_bef[$i] = $res[9]; 
    $Arr_Dt[$i]['Rating'] = $res[9]; 

    if ($res[3]<1000 ) {
        $Arr_Dt[$i]['nab'] = 1 ;
    } else if ($res[3]>=1000 && $res[3]<=1500) {
        $Arr_Dt[$i]['nab'] = 2 ;
    } else if ($res[3]>1500 && $res[3]<=2000) {
        $Arr_Dt[$i]['nab'] = 3 ;
    } else if ($res[3]>2000 && $res[3]<=2500) {
        $Arr_Dt[$i]['nab'] = 4 ;
    } else if ($res[3]>2500) {
        $Arr_Dt[$i]['nab'] = 5 ;
    }

    if ($res[4]<-0.5 ) {
        $Arr_Dt[$i]['1hr'] = 1 ;
    } else if ($res[4]>= -0.5 && $res[4]<= 0) {
        $Arr_Dt[$i]['1hr'] = 2 ;
    } else if ($res[4]> 0 && $res[4]<=0.5) {
        $Arr_Dt[$i]['1hr'] = 3 ;
    } else if ($res[4]> 0.5 && $res[4]<=1) {
        $Arr_Dt[$i]['1hr'] = 4 ;
    } else if ($res[4]> 1) {
        $Arr_Dt[$i]['1hr'] = 5 ;
    }

    if ($res[5]<-6 ) {
        $Arr_Dt[$i]['1bln'] = 1 ;
    } else if ($res[5]>= -6 && $res[5]<= -4) {
        $Arr_Dt[$i]['1bln'] = 2 ;
    } else if ($res[5]> -4 && $res[5]<=-2) {
        $Arr_Dt[$i]['1bln'] = 3 ;
    } else if ($res[5]> -2 && $res[5]<=0) {
        $Arr_Dt[$i]['1bln'] = 4 ;
    } else if ($res[5]> 0) {
        $Arr_Dt[$i]['1bln'] = 5 ;
    }

    if ($res[6]<-15 ) {
        $Arr_Dt[$i]['YTD'] = 1 ;
    } else if ($res[6]>= -15 && $res[6]<= -10) {
        $Arr_Dt[$i]['YTD'] = 2 ;
    } else if ($res[6]> -10 && $res[6]<=-5) {
        $Arr_Dt[$i]['YTD'] = 3 ;
    } else if ($res[6]> -5 && $res[6]<=0) {
        $Arr_Dt[$i]['YTD'] = 4 ;
    } else if ($res[6]> 0) {
        $Arr_Dt[$i]['YTD'] = 5 ;
    }

    if ($res[7]<0 ) {
        $Arr_Dt[$i]['1th'] = 1 ;
    } else if ($res[7]>= 0 && $res[7]<= 4) {
        $Arr_Dt[$i]['1th'] = 2 ;
    } else if ($res[7]> 4 && $res[7]<=8) {
        $Arr_Dt[$i]['1th'] = 3 ;
    } else if ($res[7]> 8 && $res[7]<=12) {
        $Arr_Dt[$i]['1th'] = 4 ;
    } else if ($res[7]> 12) {
        $Arr_Dt[$i]['1th'] = 5 ;
    }

    if ($res[8]<0 ) {
        $Arr_Dt[$i]['3th'] = 1 ;
    } else if ($res[8]>= 0 && $res[8]<= 10) {
        $Arr_Dt[$i]['3th'] = 2 ;
    } else if ($res[8]> 10 && $res[8]<=20) {
        $Arr_Dt[$i]['3th'] = 3 ;
    } else if ($res[8]> 20 && $res[8]<=30) {
        $Arr_Dt[$i]['3th'] = 4 ;
    } else if ($res[8]> 30) {
        $Arr_Dt[$i]['3th'] = 5 ;
    }
}
$c=0;   
$iter = 0;
$arr_var1 = array();
$arr_var2 = array();
$arr_err = array();
$arr_bef = array();
    do {
        $err=0;
        $c++;
        if ($c==1) { $var1='nab'; $var2='1hr'; }
        elseif ($c==2) { $var1='1bln'; $var2='YTD'; }
        elseif ($c==3) { $var1='1th'; $var2='3th'; $c=0; }
        for ($i=50; $i <count($Arr_Dt) ; $i++) { 
            $arr_bef[$i-50]= Tree($Arr_Dt[$i][$var1],$Arr_Dt[$i][$var2],$var1,$var2,'Rating',$Arr_Dt,50);
            $err=$err+(abs(($Arr_Dt[$i]['Rating']-intval($arr_bef[$i-50]))/$Arr_Dt[$i]['Rating']));
            $arr_rat[$iter][$i-50]=$arr_bef[$i-50];
        }
        $sigmaerr=$err;
        $err=$err*100/50;
        array_push($arr_var2, $var2);
        array_push($arr_var1, $var1);
        array_push($arr_err, $err);
        $iter++;
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $now = $time;
        $break = round(($now - $start), 4);
        if ($break>29.5) {
            $sigmaerr = 0;
            $err=0;
            $var1 = $arr_var1[array_search(min($arr_err),$arr_err)];
            $var2 = $arr_var2[array_search(min($arr_err),$arr_err)];
            for ($i=50; $i <count($Arr_Dt) ; $i++) { 
                $arr_bef[$i-50]= $arr_rat[array_search(min($arr_err),$arr_err)][$i-50];
                $err=$err+(abs(($Arr_Dt[$i]['Rating']-intval($arr_bef[$i-50]))/$Arr_Dt[$i]['Rating']));
            }
            $sigmaerr=$err;
            $err=$err*100/50;
            break;
        }
    } while (true);
$stmt = $db->query("SELECT MIN(DATEDIFF(CURDATE(), history_nab.tanggal)) FROM history_nab");
$min_difference = $stmt->fetch();
$min_difference = $min_difference[0];
$stmt = $db->query("SELECT COUNT(*) FROM reksadana");
$count_reksadana = $stmt->fetch();
$count_reksadana = $count_reksadana[0];
while ($min_difference > 1) { 
    $min_difference--;
    $date = date('Y-m-d', strtotime((-1*$min_difference).' days'));
    $stmt = $db->query("SELECT reksadana.id, reksadana.nab FROM reksadana ORDER BY id ASC");
    while ($res = $stmt->fetch()) {
        $stmt2 = $db->prepare("INSERT INTO history_nab VALUES(?, ?, ?)");
        $stmt2->bindParam(1, $res['id']);
        $stmt2->bindParam(2, $date);
        $stmt2->bindParam(3, $res['nab']);
        $stmt2->execute();
        $nab = $res['nab'] + (rand(-500, 500)/100);
        $stmt2 = $db->prepare("UPDATE reksadana SET reksadana.nab = ? WHERE reksadana.id = ?");
        $stmt2->bindParam(1, $nab);
        $stmt2->bindParam(2, $res['id']);
        $stmt2->execute();
    }
}
$stmt = $db->query("SELECT * FROM last_update");
$last_update = $stmt->fetch();
$last_update = $last_update[0];
$last_update = strtotime($last_update);
$date_now = strtotime(date("Y-m-d"));
$diff = ($date_now-$last_update)/86400;
$diff = 1;
if ($diff > 0) {
    $stmt = $db->prepare("SELECT ?, ?, nab, id FROM reksadana");
    $stmt->bindParam(1, $var1);
    $stmt->bindParam(2, $var2);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
        $Arr_Dt[$i]['nab'] = $row['nab'];
    }
    while ($row = $stmt->fetch()) {
        $rate = Tree($row[$var1], $row[$var2], $var1,$var2,'Rating',$Arr_Dt,100);
        $stmt = $db->prepare("UPDATE reksadana SET rating = ? WHERE id = ?");
        $stmt->bindParam(1, $rate);
        $stmt->bindParam(2, $row['id']);
        $stmt->execute();
    }
    $date_now = date("Y-m-d");
    $stmt = $db->prepare("UPDATE last_update SET tanggal = ?");
    $stmt->bindParam(1, $date_now);
    $stmt->execute();
}
?>