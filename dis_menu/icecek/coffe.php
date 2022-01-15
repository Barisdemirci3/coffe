<?php include "../../db.php";
$getdata = $db->prepare("SELECT * FROM urunlistesi WHERE urun_kategori=0");
$getdata->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFEE</title>
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <style>
        .kutu{
            width: 100%;
            height:100px;
            background-color:rgba(139, 71, 16, 0.555);
        }
        .resim{
            float: left;
            width: 20%;
            padding: 40px;
        }

        body {
           color: rgb(139, 72, 16);
           font-weight: bold;
           background-image: url(arka.png);
        }
        h2 {
         color: darkred;
         font-family: 'Corinthia', cursive;
        }

        .button{
            background-color: rgb(70, 3, 3);
            border: none;
            color: cornsilk;
            padding: 10px 15px;
            border-top-left-radius: 30px;
            border-bottom-right-radius: 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .button:hover {
            background-color: darkred;
            color: cornsilk;
        }

        #shop{
            color: cornsilk;
            padding: 25px;
            margin-bottom: -105px;
            text-align: right;
            font-size: 50px;
        }


    </style>



</head>
<body>

   


    <div id="shop">
        <i class="fas fa-shopping-basket"></i>
    </div>
    <div class="kutu">
        <img src="logo.png" width="100px" height="100px">
    </div>
    



    <?php while($writedata = $getdata->fetch(PDO::FETCH_ASSOC)){ ?>
    <div align="center" class="resim" >
        <img src="../../resimler/<?= $writedata["urun_resim"]; ?>" alt="" width="150px" height="150px" >
        <h2 ><?= $writedata["urun_isim"]; ?></h2>
        <h3><?= $writedata["urun_fiyat"]; ?>₺</h3>
        <a href="#" class="button">Satın Al</a>
    </div>
    <?php } ?>







</body>
</html>