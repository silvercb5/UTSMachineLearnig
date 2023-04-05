<?php 

$input_usia = $_POST['usia'];
$ar_usia = array(55, 60, 70, 56, 61, 75, 80, 84, 77, 69);
$ar_berat = array(60, 55, 50, 70, 66, 51, 66, 52, 54, 62);
$ar_kolesterol = array(183, 160, 150, 230, 170, 130, 175, 140, 145, 175);
$ar_diabetes = array(1, -1, -1, 1, 1 , -1, 1, -1, -1, 1);

$low_pos = 0;
$low_neg = 0;
$high_pos = 0;
$high_neg = 0;
$met_pos = 0;
$met_neg = 0;
$hyperplane = 0;

$n = 10;
for($i=0;$i<10;$i++){
	if($ar_diabetes == 1){
		if($met_pos == 0){
			$low_pos = $ar_usia[$i];
			$high_pos = $ar_usia[$i];
			$met_pos = 1;
		}else{
			if($low_pos > $ar_usia[$i]){
				$low_pos = $ar_usia[$i];
			if($high_pos < $ar_usia[$i]){
				$high_pos = $ar_usia[$i];
			}}
		}
	}
	if($ar_diabetes == -1){
		if($met_neg == 0){
			$low_neg = $ar_usia[$i];
			$high_neg = $ar_usia[$i];
			$met_neg = 1;
		}else{
			if($low_neg > $ar_usia[$i]){
				$low_neg = $ar_usia[$i];
			if($high_neg < $ar_usia[$i]){
				$high_neg = $ar_usia[$i];
			}}
		}
	}

if($low_neg < $low_pos){
	if($input_usia < $hyperplane){
		$status = "Negatif Diabetes";
	}else{
		$status = "Positif Diabetes";
	}
}else{
	if($input_usia > $hyperplane){
		$status = "Negatif Diabetes";
	}else{
		$status = "Positif Diabetes";
	}
}
}
echo "Jadi, Status Pasien dengan Usia $input_usia tahun adalah $status";



?>