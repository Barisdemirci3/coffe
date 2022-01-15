<?php
session_start();
ob_start();
include "../db.php";
if ($_SESSION["nick"]) {
    header("Location: ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="main">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="taggle-btn" onclick="Login()">Giriş Yap</button>
                <button type="button" class="taggle-btn" onclick="Register()">Kaydol</button>
            </div>
            <div class="social-icons">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ozudxudb.json" background="transparent" speed="1" loop autoplay></lottie-player>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_debsmocb.json" background="transparent" speed="1" loop autoplay></lottie-player>
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_yvhlzu6y.json" background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
            <p class="text-center">
                <?php switch ($_GET["hata"]) {
                    case 'bos':
                        echo '<script>alert("Lütfen boş alanları doldurunuz!");</script>';
                        break;
                    case 'mail':
                        echo '<script>alert("Mail adresi formatı hatalı!!");</script>';
                        break;
                    case 'sifre':
                        echo '<script>alert("Şifreniz 8 karakteri geçmeli!");</script>';
                        break;
                    case 'basari':
                        echo '<script>alert("Başarılı bir şekilde kayıt oldunuz! Üst kısımdan lütfen giriş yapınız.");</script>';
                        break;
                    case 'bilgilerhatali':
                        echo '<script>alert("Giriş bilgileriniz hatalı.");</script>';
                        break;
                    case 'girisbos':
                        echo '<script>alert("Giriş yapmak için boş alanları doldurunuz!.");</script>';
                        break;
                }  ?>
            </p>
            <form action="giris.php" method="POST" id="Login" class="input-group">
                <input type="text" name="kullaniciadi" class="input-field" placeholder="Kullanıcı Adınızı Giriniz" required>
                <input type="password" name="sifre" class="input-field" placeholder="Şifrenizi Giriniz" required>
                <a href="#">Şifremi Unuttum</a>
                <button type="submit" name="girisyap" class="submit-btn"> Giriş Yap</button>
            </form>
            <form action="giris.php" method="POST" id="Register" class="input-group">
                <input type="text" id="k01" name="kullanici" class="input-field" placeholder="Kullanıcı Adınızı Giriniz">
                <input type="password" id="s01" name="sifre" class="input-field" placeholder="Şifrenizi Giriniz">
                <input type="email" id="m01" name="mail" class="input-field" placeholder="E-postanızı Giriniz">
                <input type="submit" name="kayitol" value="Kayıt ol" class="submit-btn">
            </form>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="control.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        var x = document.getElementById("Login");
        var z = document.getElementById("Register");
        var y = document.getElementById("btn");

        function Register() {
            x.style.left = "-400px";
            z.style.left = "50px";
            y.style.left = "110px";
        }

        function Login() {
            x.style.left = "50px";
            z.style.left = "450px";
            y.style.left = "0px";
        }
    </script>
</body>

</html>

<?php
if (isset($_POST["kayitol"])) {
    $username = $_POST["kullanici"];
    $sifre = $_POST["sifre"];
    $mail = $_POST["mail"];
    if ($username == "" || $mail == "" || $sifre == "") {
        header("Location: giris.php?hata=bos");
    } else {
        if (strlen($sifre) < 8) {
            header("Location: giris.php?hata=sifre");
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                header("Location: giris.php?hata=mail");
            } else {
                $sifrelisifre = md5($sifre);
                $veriekle = $db->prepare("INSERT INTO uyeler set uye_nick=?, uye_mail=?, uye_sifre=?, uye_yetki=0");
                $veriekle->execute([$username, $mail, $sifrelisifre]);
                if ($veriekle) {
                    header("Location: giris.php?hata=basari");
                }
            }
        }
    }
}

if (isset($_POST["girisyap"])) {
    $username = $_POST["kullaniciadi"];
    $sifre = $_POST["sifre"];
    $gerceksifre = md5($sifre);
    if ($username == "" || $sifre == "") {
        header("Location: giris.php?hata=girisbos");
    } else {
        $vericheck = $db->prepare("SELECT * FROM uyeler WHERE uye_nick=:nick and uye_sifre=:sifre");
        $vericheck->execute(["nick" => $username, "sifre" => $gerceksifre]);
        if ($vericheck->rowCount() > 0) {
            $getdata = $vericheck->fetch(PDO::FETCH_ASSOC);
            $_SESSION["nick"] = $username;
            $_SESSION["yetki"]= $getdata["uye_yetki"];
            if($_SESSION["yetki"]==1){
            header("Location: ../admin-panel/index.php");
            }else{
                header("Location: ../index.php");
            }
            
        } else {
            header("Location: giris.php?hata=bilgilerhatali");
        }
    }
}
?>