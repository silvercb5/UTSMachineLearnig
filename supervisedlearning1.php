<?php
    $input_berat = $_POST['beratbadan'];
    $input_usia = $_POST['usia'];

    $ar_usia = array(55, 60, 70, 56, 61, 75, 80, 84, 77, 69);

    $ar_berat = array(60, 55, 50, 70, 66, 51, 66, 52, 54, 62);

    $ar_kolesterol = array(183, 160, 150, 230, 170, 130, 175, 140, 145, 175);

    $ar_diabetes = array(1, -1, -1, 1, 1, -1, 1, -1, -1, 1);

    $n = 10;
        for($i=0;$i<$n;$i++){
        $ar_usia_sort[$i] = $ar_usia[$i];
        $ar_kolesterol_res[$i] = $ar_kolesterol[$i];
    }

    for($i=0;$i<$n-1;$i++){
        for($j=$i+1;$j<$n;$j++){
            if($ar_usia_sort[$i]>$ar_usia_sort[$i]){
                $buf_usia = $ar_usia_sort[$i];
                $buf_kolesterol = $ar_kolesterol_res[$i];
                $ar_usia_sort[$i] = $ar_usia_sort[$j];
                $ar_kolesterol_res = $ar_kolesterol_res[$j];

                $ar_usia_sort[$i] = $buf_usia[$j];
                $ar_kolesterol_res[$j] = $buf_kolesterol;
            }
        }
    }

    $m_av = 0;
    for($i=0;$i<$n;$i++){
        $ar_m[$i] = $ar_kolesterol_res[$i]/$ar_usia_sort[$i];
        $m_av = $m_av + $ar_m[$i];
    }
    $m_av = $m_av/$n;

    $c_av = 0;
    for($i=0;$i<$n;$i++){
        $ar_c[$i] = $ar_kolesterol_res[$i] - $m_av * $ar_usia_sort[$i];
        $c_av = $c_av + $ar_c[$i];
    }
    $c_av = $c_av/$n;

    $ypred = $m_av * $input_usia + $c_av;
    echo "<br> Maka prediksi kadar kolesterol total untuk usia $input_usia tahun adalah $ypred mg/dL";
?>