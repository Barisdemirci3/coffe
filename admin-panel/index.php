<?php
require_once "sidebar.php";
require_once "../db.php";
$getdata = $db->prepare("SELECT * FROM uyeler ORDER BY uye_id DESC LIMIT 5");
$getdata->execute();
$getmembercount= $db->query("select * from uyeler");
$getilandata = $db->query("select * from urunlistesi");

?>
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
            <h1 class="h3 mb-0 text-gray-800">İstatistikler</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">İstatistikler</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Aktif ürün sayısı</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getilandata->rowCount();?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Satış sayısı</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Sistem yok</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Kayıtlı kullanıcı sayısı</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?= $getmembercount->rowCount(); ?>
                                </div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Ticket sayısı</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Sistem yok</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Son kayıt olan 5 kullanıcı</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="#">Daha fazlası <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Kullanıcı ID</th>
                                    <th>Kullanıcı ismi</th>
                                    <th>Mail adresi</th>
                                    <th>Yetki</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($writedata= $getdata->fetch(PDO::FETCH_ASSOC)){ ?>
                                <tr>
                                    <td><a href="#"><?= $writedata["uye_id"]; ?></a></td>
                                    <td><?= $writedata["uye_nick"]; ?></td>
                                    <td><?= $writedata["uye_mail"]; ?></td>
                                    <?php switch ($writedata["uye_yetki"]) {
                                      case '1':
                                        ?> <td><span class="badge badge-success">Admin</span></td> <?php 
                                        break;
                                      
                                        case '0':
                                          ?> <td><span class="badge badge-primary">Üye</span></td> <?php 
                                          break;
                                    } ?>
                                    <td><a href="#" class="btn btn-sm btn-primary">Detay</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <!-- Message From Customer-->
            <div class="col-xl-4 col-lg-5 ">
                <div class="card">
                    <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light">Ticketler</h6>
                    </div>
                    <div>
                        <div class="customer-message align-items-center">
                            <a class="font-weight-bold" href="#">
                                <div class="text-truncate message-title">Ticket sistemi bulunmamakta! Eklemek için
                                    lütfen geliştirici
                                    ile iletişime geçiniz!
                                </div>
                                <div class="small text-gray-500 message-time font-weight-bold">Barış Demirci * 0s</div>
                            </a>
                        </div>

                        <div class="card-footer text-center">
                            <a class="m-0 small text-primary card-link" href="#">Daha fazla <i
                                    class="fas fa-chevron-right"></i></a>
                        </div>
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
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
</body>

</html>