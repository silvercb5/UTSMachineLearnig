<?php

$n = 6;
$artahun = array(2007, 2008, 2009, 2010, 2011, 2012);
$arpdb = array(432.2, 510.2, 539.6, 755.0, 893.0, 918.0);
$argrowth = array(6.3, 6.0, 4.6, 6.2, 6.2, 6.0);
$arpdbkapita = array(1861, 2168, 2263, 3167, 3688, 3741);

//Prediksi Pertumbuhan PDB
$acctahun = 0;
$accgrowth = 0;
$acctahungrowth = 0;
$acctahun2 = 0;

for($i=0;$i<$n;$i++){
    $acctahun = $acctahun + $artahun[$i];
    $accgrowth = $accgrowth + $argrowth[$i];
    $acctahungrowth = $acctahungrowth + ($artahun[$i] * $argrowth[$i]);
    $acctahun2 = $acctahun2 + ($artahun[$i] * $artahun[$i]);
}

$atas_b0_growth = $n * $acctahungrowth - $acctahun * $accgrowth;
$bawah_b0_growth = $n * $acctahun2 - $acctahun * $acctahun;
$b0_growth = $atas_b0_growth / $bawah_b0_growth;

$atas_b1_growth = $accgrowth * $acctahun2 - $acctahun * $acctahungrowth;
$bawah_b1_growth = $n * $acctahun2 - $acctahun * $acctahun;
$b1_growth = $atas_b1_growth / $bawah_b1_growth;

$tahunprediksi = 2015;
$growth_pred = $b0_growth * $tahunprediksi + $b1_growth;
echo $growth_pred;
?>