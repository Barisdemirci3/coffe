<?php require_once "sidebar.php"; 
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small"
                                    placeholder="What do you want to look for?" aria-label="Search"
                                    aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small"><?= $_SESSION["nick"]; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../index.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Siteye git
                        </a>
                        <a class="dropdown-item" href="settings.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ayarlar
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../session.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Çıkış yap
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- Topbar -->


        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Site ayarları</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
                    <li class="breadcrumb-item">Ayarlar</li>
                    <li class="breadcrumb-item active" aria-current="page">Site ayarları</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Site ayarları</h6>
                        </div>
                        <div class="card-body">
                            <form action="settings.php" method="POST">
                                <div class="form-group">
                                    <label for="siteismi">Site ismi</label>
                                    <input type="text" value="<?= $writedata["isim"]; ?>" name="siteismi"
                                        class="form-control" id="siteismi" aria-describedby="siteyardim"
                                        placeholder="Site ismi">
                                    <small id="siteyardim" class="form-text text-muted">Bu ayar, websitenizin ismini
                                        değiştireceğinden dolayı tüm yerde
                                        işleme sokulacaktır..</small>
                                </div>

                                <button type="submit" class="btn btn-primary" name="gonder">Gönder</button>
                            </form>
                        </div>
                    </div>
                    <?php
      if(isset($_POST["gonder"])){
        $siteismi = htmlspecialchars(trim($_POST["siteismi"]));
        $updatedata= $db->prepare("UPDATE ayarlar SET isim=:isim");
        $updatedata->execute(["isim"=>$siteismi]);
        if($updatedata){
          echo "<script>alert('Site ismi başarılı bir şekilde değiştirildi!');</script>";
        }else{
          echo "<script>alert('Site ismi değiştirilirken bir hata oluştu!');</script>";
        }
      }
      ?>
                    <!-- Horizontal Form -->

                </div>

                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            
                        </div>
                        <div class="card-body">
                            <form action="settings.php" method="POST">
                                <div class="form-group">
                                    <label for="siteismi">Konum kısmı</label>
                                    <input type="text" value="<?= $writedata["konum"]; ?>" name="konum"
                                        class="form-control" id="siteismi" aria-describedby="siteyardim"
                                        placeholder="Adres">
                                    <small id="siteyardim" class="form-text text-muted">Bu ayar, websitenizin footer kısmındaki
                                        KONUM bilgisini güncelleyecektir.
                                    </small>
                                </div>

                                <button type="submit" class="btn btn-primary" name="gonder3">Gönder</button>
                            </form>
                        </div>
                    </div>
            
                    <?php
      if(isset($_POST["gonder3"])){
        $siteismi = htmlspecialchars(trim($_POST["konum"]));
        $updatedata= $db->prepare("UPDATE ayarlar SET konum=:isim");
        $updatedata->execute(["isim"=>$siteismi]);
        if($updatedata){
          echo "<script>alert('Konum bilgisi başarılı bir şekilde değiştirildi!');</script>";
        }else{
          echo "<script>alert('Konum bilgisi değiştirilirken bir hata oluştu!');</script>";
        }
      }
      ?>
                    <!-- Horizontal Form -->

                </div>
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            
                        </div>
                        <div class="card-body">
                            <form action="settings.php" method="POST">
                                <div class="form-group">
                                    <label for="siteismi">Telefon numarası</label>
                                    <input type="text" value="<?= $writedata["tel"]; ?>" name="tel"
                                        class="form-control" id="siteismi" aria-describedby="siteyardim"
                                        placeholder="Telefon">
                                    <small id="siteyardim" class="form-text text-muted">Bu ayar, websitenizin footer kısmındaki
                                        TELEFON bilgisini güncelleyecektir.</small>
                                </div>

                                <button type="submit" class="btn btn-primary" name="gonder4">Gönder</button>
                            </form>
                        </div>
                    </div>
            
                    <!-- Horizontal Form -->
                    <?php
      if(isset($_POST["gonder4"])){
        $siteismi = htmlspecialchars(trim($_POST["tel"]));
        $updatedata= $db->prepare("UPDATE ayarlar SET tel=:isim");
        $updatedata->execute(["isim"=>$siteismi]);
        if($updatedata){
          echo "<script>alert('Telefon bilgisi başarılı bir şekilde değiştirildi!');</script>";
        }else{
          echo "<script>alert('Telefon bilgisi değiştirilirken bir hata oluştu!');</script>";
        }
      }
      ?>
                </div>
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                           
                        </div>
                        <div class="card-body">
                            <form action="settings.php" method="POST">
                                <div class="form-group">
                                    <label for="siteismi">Mail adresi</label>
                                    <input type="text" value="<?= $writedata["mail"]; ?>" name="mail"
                                        class="form-control" id="siteismi" aria-describedby="siteyardim"
                                        placeholder="Mail adresi">
                                    <small id="siteyardim" class="form-text text-muted">Bu ayar, websitenizin footer kısmındaki
                                        MAİL bilgisini güncelleyecektir.</small>
                                </div>

                                <button type="submit" class="btn btn-primary" name="gonder5">Gönder</button>
                            </form>
                        </div>
                    </div>
                    <?php
      if(isset($_POST["gonder5"])){
        $siteismi = htmlspecialchars(trim($_POST["mail"]));
        $updatedata= $db->prepare("UPDATE ayarlar SET mail=:isim");
        $updatedata->execute(["isim"=>$siteismi]);
        if($updatedata){
          echo "<script>alert('Mail bilgisi başarılı bir şekilde değiştirildi!');</script>";
        }else{
          echo "<script>alert('Mail bilgisi değiştirilirken bir hata oluştu!');</script>";
        }
      }
      ?>
                    <!-- Horizontal Form -->

                </div>

                <div class="col-lg-6">
                    <!-- General Element -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Hakkında kısmı</h6>
                        </div>
                        <div class="card-body">
                            <form action="settings.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Hakkında</label>
                                    <textarea class="form-control" name="textarea" id="exampleFormControlTextarea1"
                                        rows="3"><?= $writedata["hakkimizda"]; ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="gonder2">Gönder</button>
                        </div>
                        </form>

                        <?php
      if(isset($_POST["gonder2"])){
        $hakkinda = htmlspecialchars(trim($_POST["textarea"]));
        $updatedata= $db->prepare("UPDATE ayarlar SET hakkimizda=:isim");
        $updatedata->execute(["isim"=>$hakkinda]);
        if($updatedata){
          echo "<script>alert('Site hakkımızda kısmı başarılı bir şekilde değiştirildi!');</script>";
        }else{
          echo "<script>alert('Site hakkımızda kısmı değiştirilirken bir hata oluştu!');</script>";
        }
      }
      ?>

                    </div>

                </div>
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
                </script> - developed by
                <b>Barış Demirci</a></b>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>

</body>

</html>