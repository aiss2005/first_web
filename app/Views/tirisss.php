<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$iniheader;?></title>
</head>
<body>
    <marquee behavior="" direction="">Nama oshi = <?=$nama;?></marquee>  <br> <br> <br> <br> <br>
    <img src="<?= ($foto == '1') ? 'https://i.pinimg.com/736x/95/4e/e2/954ee25e852975d97ffec2e7a83ac12f.jpg' : 
    (($foto == '2')?'https://i.pinimg.com/736x/b8/43/78/b84378f7689830e64da3f452440907d7.jpg' : 
    (($foto == '3')? 'https://i.pinimg.com/736x/1b/97/b7/1b97b7f03849aafc023ee03e6fd3ae7b.jpg' : 'gaada')); ?>" alt="Gambar">

</body>
</html>