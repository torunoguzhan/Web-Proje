
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ktü Proje Yönetim</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/tr/7/7d/KTU_Yeni_Logo.png">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="app.css">

<title>ödev</title>
<script src="app.js"></script>
<script src="moment-with-locales.js"></script>
  </head>

  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://s3.amazonaws.com/prod.skimble/photos/29359/hstzsdw4avx_full.gif" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin  <a href="../../cikis.php"> <i class="fas fa-sign-out-alt"></i></a> </span>
                <h2> <?php echo $kullanicicek['k_ad'] ?> </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                      <h3>Menü</h3>
                      <ul class="nav side-menu">
                        <li><a href="duyuru.php"><i class="fas fa-bullhorn"></i>  &nbsp; Duyuru </a>
                        </li>
                        <li><a href="video.php"><i class="fas fa-video"></i> &nbsp; Video </a>
                        </li>
                        <li><a href="etkinlik.php"><i class="far fa-calendar-alt"></i> &nbsp; Etkinlik </a>
                        </li>
                        <li><a href="dersprogrami.php"><i class="far fa-calendar"></i> &nbsp; Ders </a>
                        </li>
                        <li><a href="resim.php"><i class="fas fa-image"></i> &nbsp; Resim </a>
                        </li>
                      </ul>
                    </div>
      
                  </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://s3.amazonaws.com/prod.skimble/photos/29359/hstzsdw4avx_full.gif" alt=""><?php echo $kullanicicek['k_ad'] ?>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
