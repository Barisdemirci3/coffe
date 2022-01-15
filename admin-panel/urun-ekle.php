<?php include "sidebar.php"; ?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
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
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small"><?= $_SESSION["nick"]; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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
                <h1 class="h3 mb-0 text-gray-800">Ürün ekle</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
                    <li class="breadcrumb-item">Sayfalar</li>
                    <li class="breadcrumb-item active" aria-current="page">Ürün ekle</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ürün ekle</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="urun-ekle.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ürün isim</label>
                                    <input type="text" class="form-control" name="isim" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="İsim">
                                </div>
                                <div class="form-group">
                                    <label for="select2Single">Kategori</label>
                                    <select class="select2-single form-control" name="kategori" id="select2Single">
                                        <option value="0">İçecek</option>
                                        <option value="1">Yiyecek</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ürün Fiyat</label>
                                    <input type="text" class="form-control" name="fiyat" id="exampleInputPassword1" placeholder="Ürün fiyatı">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="customFile">Ürün resimini yükle</label>
                                        <input type="file" name="dosya" class="custom-file-input">
                                    </div>
                                </div>

                                <button type="submit" name="ekle" class="btn btn-primary">Ekle</button>
                            </form>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST["ekle"])) {
                        if ($_FILES["dosya"]) {
                            $dosyaname = rand(1000, 1000000000);
                            $dosyaismi = $_FILES["dosya"]["name"];
                            if ($_FILES["dosya"]["size"]  > 1000000) {
                                echo "Dosya boyutu sınırı";
                            } else {
                                $dosyaUzantisi = pathinfo($_FILES["dosya"]["name"], PATHINFO_EXTENSION);
                                if ($dosyaUzantisi != "jpg" && $dosyaUzantisi != "png" && $dosyaUzantisi != "jpeg") { # Dosya uzantı kontrolü            
                                    echo "Sadece jpg, jpeg ve png uzantılı dosyalar yüklenebilir.";
                                } else {
                                    $sonuc = move_uploaded_file($_FILES["dosya"]["tmp_name"], "../resimler/$dosyaname$dosyaismi");
                                    echo $sonuc ? "Resim başarılı bir şekilde yüklendi!" : "Hata oluştu";
                                    $array = [post("isim"), post("kategori"), post("fiyat")];
                                    if ($array[0] == "" || $array[1] == "" || $array[2] == "") {
                                        echo '<script>
                              alert("Lütfen Boş alanları doldurunuz!");
                              </script>';
                                    } else {
                                        $dataadd = $db->prepare("INSERT INTO urunlistesi SET urun_kategori=?, urun_isim=?, urun_fiyat=?,
                              urun_resim=?");
                                        $dataadd->execute([$array[1], $array[0], $array[2], $dosyaname.$dosyaismi]);
                                        if ($dataadd) {
                                            echo '<script>
                              alert("Ürün başarılı bir şekilde eklendi!");
                              </script>';
                                        } else {
                                            echo '<script>
                              alert("Bir hata oluştu!");
                              </script>';
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        echo '<script>
                    alert("Lütfen Bir dosya seçin!");
                    </script>';
                        die();
                    }
                    ?>

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
                            <b>Barış Demirci</b>
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