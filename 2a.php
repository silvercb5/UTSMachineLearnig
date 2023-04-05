<?php

$n = 6;
$artahun = array(2007, 2008, 2009, 2010, 2011, 2012);
$arpdb = array(432.2, 510.2, 539.6, 755.0, 893.0, 918.0);
$argrowth = array(6.3, 6.0, 4.6, 6.2, 6.2, 6.0);
$arpdbkapita = array(1861, 2168, 2263, 3167, 3688, 3741);

//Prediksi PDB
$acctahun = 0;
$accpdb = 0;
$acctahunpdb = 0;
$acctahun2 = 0;

for($i=0;$i<$n;$i++){
    $acctahun = $acctahun + $artahun[$i];
    $accpdb = $accpdb + $arpdb[$i];
    $acctahunpd = $acctahunpdb + ($artahun[$i] * $arpdb[$i]);
    $acctahun2 = $acctahun2 + ($artahun[$i] * $artahun[$i]);
}

$atas_b0_pdb = $n * $acctahunpdb - $acctahun * $accpdb;
$bawah_b0_pdb = $n * $acctahun2 - $acctahun * $acctahun;
$b0_pdb = $atas_b0_pdb / $bawah_b0_pdb;

$atas_b1_pdb = $accpdb * $acctahun2 - $acctahun * $acctahunpdb;
$bawah_b1_pdb = $n * $acctahun2 - $acctahun *$acctahun;
$b1_pdb = $atas_b1_pdb / $bawah_b1_pdb;

$tahunprediksi = 2015;
$pdb_pred = $b0_pdb * $tahunprediksi + $b1_pdb;
echo $pdb_pred;
?>