<?php
$nilai = 'C';

echo "Nilai anda : " . $nilai;
echo "<br>";
if($nilai == 'A'){
    echo "Sangat Baik";
}
elseif($nilai == 'B'){
    echo "Baik";
}
elseif($nilai == 'C'){
    echo "Cukup";
} 
elseif($nilai == 'D'){
    echo "Kurang";
}
elseif($nilai == 'E'){
    echo "Sangat kurang";
}
else{
    echo "Silahkan input dengan baik";
}