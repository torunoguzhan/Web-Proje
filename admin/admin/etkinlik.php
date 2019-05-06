<?php 
// bağlan phpde session dursun headerin içinde bişe olmasın her yere bağlan phpyi eklersin

include '../../baglan.php';


if (isset($_SESSION['k_ad']))
{
    
  $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE k_ad=:email");
$kullanicisor->execute(array('email'=>$_SESSION['k_ad']));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$kul_id = $kullanicicek['k_id'];
  $etkinliksor=$db->prepare("SELECT * FROM etkinlik where k_id=:kul_id");
  $etkinliksor->execute(array('kul_id'=>$kul_id ));
}
else
{
  header("Location:../../login.php");
}
include 'header.php';

?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Etkinlikler</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Etkinlik</th>
                        <th>Tarih</th>
                        <th>Sil</th>
                        <th>Düzenle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($etkinlikcek=$etkinliksor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                          <td>  <?php echo $etkinlikcek['etkinlik'] ?> </td>
                          <td><?php echo $etkinlikcek['tarih'] ?></td>
                          <td> <a href="../../islem.php?kullanici_id=<?php echo $etkinlikcek['k_id'];?>&etkinliksil=ok&id=<?php echo $etkinlikcek['id']; ?>"> <button class="btn btn-secondary" > SİL</button></a></td>
                          <td>  <a href="etkinlik-guncelle.php?etkinlik_id=<?php echo $etkinlikcek['id'];?>&etkinlikguncelle=ok"><button class="btn btn-secondary ">Düzenle</button></a></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div style="text-align:right" >
                  <a class="btn btn-success" href="ekleetkinlik.php">yeni ekle</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>
</html>