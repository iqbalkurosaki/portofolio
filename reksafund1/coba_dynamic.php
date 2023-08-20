<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
if (isset($_POST['barometer'])){
function kategori($nab, $hr1, $bln1, $YTD, $th1, $th3) {
    if ($nab<1000 ) {
        $kategori['nab'] = 1 ;
    } else if ($nab>=1000 && $nab<=1500) {
        $kategori['nab'] = 2 ;
    } else if ($nab>1500 && $nab<=2000) {
        $kategori['nab'] = 3 ;
    } else if ($nab>2000 && $nab<=2500) {
        $kategori['nab'] = 4 ;
    } else if ($nab>2500) {
        $kategori['nab'] = 5 ;
    }

    if ($hr1<-0.5 ) {
        $kategori['1hr'] = 1 ;
    } else if ($hr1>= -0.5 && $hr1<= 0) {
        $kategori['1hr'] = 2 ;
    } else if ($hr1> 0 && $hr1<=0.5) {
        $kategori['1hr'] = 3 ;
    } else if ($hr1> 0.5 && $hr1<=1) {
        $kategori['1hr'] = 4 ;
    } else if ($nab> 1) {
        $kategori['1hr'] = 5 ;
    }

    if ($bln1<-6 ) {
        $kategori['1bln'] = 1 ;
    } else if ($bln1>= -6 && $bln1<= -4) {
        $kategori['1bln'] = 2 ;
    } else if ($bln1> -4 && $bln1<=-2) {
        $kategori['1bln'] = 3 ;
    } else if ($bln1> -2 && $bln1<=0) {
        $kategori['1bln'] = 4 ;
    } else if ($bln1> 0) {
        $kategori['1bln'] = 5 ;
    }

    if ($YTD<-15 ) {
        $kategori['YTD'] = 1 ;
    } else if ($YTD>= -15 && $YTD<= -10) {
        $kategori['YTD'] = 2 ;
    } else if ($YTD> -10 && $YTD<=-5) {
        $kategori['YTD'] = 3 ;
    } else if ($YTD> -5 && $YTD<=0) {
        $kategori['YTD'] = 4 ;
    } else if ($YTD> 0) {
        $kategori['YTD'] = 5 ;
    }

    if ($th1<0 ) {
        $kategori['1th'] = 1 ;
    } else if ($th1>= 0 && $th1<= 4) {
        $kategori['1th'] = 2 ;
    } else if ($th1> 4 && $th1<=8) {
        $kategori['1th'] = 3 ;
    } else if ($th1> 8 && $th1<=12) {
        $kategori['1th'] = 4 ;
    } else if ($th1> 12) {
        $kategori['1th'] = 5 ;
    }

    if ($th3<0 ) {
        $kategori['3th'] = 1 ;
    } else if ($th3>= 0 && $th3<= 10) {
        $kategori['3th'] = 2 ;
    } else if ($th3> 10 && $th3<=20) {
        $kategori['3th'] = 3 ;
    } else if ($th3> 20 && $th3<=30) {
        $kategori['3th'] = 4 ;
    } else if ($th3> 30) {
        $kategori['3th'] = 5 ;
    }

    return $kategori;
}

require_once 'koneksi.php';
require_once 'AI/Func_DecisionTree.php' ;
date_default_timezone_set('Asia/Jakarta');
$db->beginTransaction();
$stmt = $db->query("SELECT * FROM last_update");
$last_update = $stmt->fetch();
$last_update = $last_update[0];
$last_update = strtotime($last_update);
$date_now = strtotime(date("Y-m-d"));
$diff = ($date_now-$last_update)/86400;

    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;
    $stmt = $db->query("SELECT * FROM reksadana");
    $Arr_Dt = array(array());



    for ($i=0; $i <100; $i++) { 
        $res = $stmt -> fetch();

        $Arr_Dt[$i] = kategori($res['nab'], $res['1hr'], $res['1bln'], $res['YTD'], $res['1th'], $res['3th']);
        $arr_bef[$i] = $res[9]; 
        $Arr_Dt[$i]['rating'] = $res[9]; 
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
                $arr_bef[$i-50]= Tree($Arr_Dt[$i][$var1],$Arr_Dt[$i][$var2],$var1,$var2,'rating',$Arr_Dt,50);
                $err=$err+(abs(($Arr_Dt[$i]['rating']-intval($arr_bef[$i-50]))/$Arr_Dt[$i]['rating']));
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
            if ($break>24.5) {
                $sigmaerr = 0;
                $err=0;
                $var1 = $arr_var1[array_search(min($arr_err),$arr_err)];
                $var2 = $arr_var2[array_search(min($arr_err),$arr_err)];
                for ($i=50; $i <count($Arr_Dt) ; $i++) { 
                    $arr_bef[$i-50]= $arr_rat[array_search(min($arr_err),$arr_err)][$i-50];
                    $err=$err+(abs(($Arr_Dt[$i]['rating']-intval($arr_bef[$i-50]))/$Arr_Dt[$i]['rating']));
                }
                $sigmaerr=$err;
                $err=$err*100/50;
                break;
            }
        } while (true);
    $stmt = $db->query("SELECT reksadana.id, reksadana.nab FROM reksadana ORDER BY id ASC");
    while ($res = $stmt->fetch()) {
        $nab = $res['nab'] + (rand(-500, 500)/100);
        $stmt2 = $db->prepare("UPDATE reksadana SET reksadana.nab = ? WHERE reksadana.id = ?");
        $stmt2->bindParam(1, $nab);
        $stmt2->bindParam(2, $res['id']);
        $stmt2->execute();
    }

    $stmt = $db->query("SELECT * FROM reksadana");
    $i = 1;
    while ($res = $stmt->fetch()) {
        $row = kategori($res['nab'], $res['1hr'], $res['1bln'], $res['YTD'], $res['1th'], $res['3th']);
        $res['rating'] = Tree($row[$var1], $row[$var2], $var1,$var2,'rating',$Arr_Dt,100);
        $stmt2 = $db->prepare("UPDATE reksadana SET rating = ? WHERE id = ?");
        $stmt2->bindParam(1, $res['rating']);
        $stmt2->bindParam(2, $res['id']);
        $stmt2->execute();
    }
    $db->commit();
    header('Location: data.php');
}
?>
<form method="post" action="">
    <button type="submit" name="barometer">Barometer</button>
</form>
</body>
</html>