<?php include "sidebar.php"; 
$getdata = $db->query("SELECT * FROM urunlistesi");
if(isset($_GET["islem"])== "urunsil"){
  $id= $_GET["id"];
  $deletedata = $db->prepare("DELETE FROM urunlistesi WHERE urun_id=:id");
  $deletedata->execute(["id"=>$id]);
  if($deletedata){
    header("Location: urun-listesi.php");
  }else{
    echo "<script>alert('Bir hata oluştu');</script>";
  }
}
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
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
            <h1 class="h3 mb-0 text-gray-800">Ürün listesi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
              <li class="breadcrumb-item">Listeler</li>
              <li class="breadcrumb-item active" aria-current="page">Ürün Listesi</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ürün listesi</h6>
                </div>
                <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Ürün ID</th>
                        <th>Ürün Fotoğraf</th>
                        <th>Ürün isim</th>
                        <th>Ürün Fiyat</th>
                        <th>Ürün Kategori</th>
                        <th>İşlem</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($writedata = $getdata->fetch(PDO::FETCH_ASSOC)){ ?>
                      <tr>
                        <td><?= $writedata["urun_id"]; ?></a></td>
                        <td><img src="../resimler/<?= $writedata["urun_resim"]; ?>" alt="" width="150px" height="150px" ></td>
                        <td><?= $writedata["urun_isim"]; ?></td>
                        <td><?= $writedata["urun_fiyat"]; ?>₺</td>
                        <?php switch ($writedata["urun_kategori"]) {
                          case '0': ?>
                            <td><span class="badge badge-primary">İçecek</span></td> <?php
                            break;
                          
                          case '1': ?>
                            <td><span class="badge badge-success">Yiyecek</span></td> <?php
                            break;
                        } ?>
                        <td><a href="urun-listesi.php?islem=urunsil&id=<?= $writedata["urun_id"]; ?>" class="btn btn-sm btn-danger">Sil</a><a href="urun-duzenle.php?islem=asd&id=<?= $writedata["urun_id"]; ?>" class="btn btn-sm btn-primary">Düzenle</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

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