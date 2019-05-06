<?php
include 'baglan.php';


if (isset($_GET['bolum'])) {
  $bolum = $_GET['bolum'];
  $kid=$db->prepare("SELECT k_id FROM kullanici where k_ad=:kul_ad ");
  $kid->execute(array('kul_ad'=>$bolum ));
  $kid=$kid->fetch(PDO::FETCH_OBJ);
  $duyurular=$db->prepare("SELECT * FROM duyuru where k_id=:kul_id ");
  $duyurular->execute(array('kul_id'=>$kid->k_id ));
  $duyurular=$duyurular->fetchAll(PDO::FETCH_OBJ);
  // şırda notice verebilir salla bişe olmaz ondan
  $yazi = $duyurular[0]->duyuru;
  for ($i=1;$i<count($duyurular);$i++) 
  { 
    $yazi = $yazi . " - " . $duyurular[$i]->duyuru;
  }
  
  $etkinlik=$db->prepare("SELECT * FROM etkinlik where k_id=:kul_id ");
  $etkinlik->execute(array('kul_id'=>$kid->k_id ));
  $etkinlik=$etkinlik->fetchAll(PDO::FETCH_OBJ);

  $resim=$db->prepare("SELECT * FROM resim where k_id=:kul_id");
  $resimcek=$resim->execute(array('kul_id' =>$kid->k_id ));

  $video=$db->prepare("SELECT * FROM video where k_id=:kul_id");
  $video->execute(array('kul_id' =>$kid->k_id ));
  $video=$video->fetchAll(PDO::FETCH_OBJ);

  $dersprogrami=$db->prepare("SELECT * FROM ders where k_id=:kul_id");
  $dersprogrami->execute(array('kul_id' =>$kid->k_id ));
  $dersprogrami=$dersprogrami->fetch(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>

<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">

  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
  <link rel="stylesheet" href="app.css">

  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link rel="icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/tr/7/7d/KTU_Yeni_Logo.png">


  <title>Proje</title>
  <script src="moment-with-locales.js"></script>
    <script src="app.js"></script>
</head>


<body>
  <input type="hidden" id="bolum" value="<?php echo $_GET['bolum'] ?>">
  <div style="margin-top:50px" class="container">
    <div class="row">
      <div class="col-md-12">
                <!-- KAYAN DUYURULAR -->
        <div>
        <div style="text-align:center">
            <span style="font-family: 'Merriweather', serif;font-size: -webkit-xxx-large;">Duyurular</span>
          </div>
          <div class="card">
            <div class="card-body">
               <input class="duyuru" type="hidden" name="" value="<?php echo end($duyurular)->duyuru ?>">
              <marquee id="duyuru" behavior="scroll" direction="left"> <?php echo $yazi ?></marquee>
            </div>
          </div>
        </div>
        <!-- KAYAN DUYURULAR -->
      </div>
    </div>
    <div style="margin-top:50px" class="row">
      <div class="col-md-7">
        <!-- video carousel -->
        <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
          <?php foreach ($video as  $video):?>
            <div class="carousel-item">
              <div class="view">
                <video class="video-fluid" autoplay loop muted>
                  <source class="videolar" src="admin/admin/video/<?php echo $video->link ?>" type="video/mp4" />
                </video>
              </div>
              <div class="carousel-caption">
                <div class="animated fadeInDown">
                <p class="aciklama" ><?php echo  $video->aciklama ?></p>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <!--RESİM BAŞLANGIÇ-->
            <?php while ($resimcek=$resim->fetch(PDO::FETCH_ASSOC)) {   ?>
              <div class="carousel-item">
                <div class="view">
                  <img class="d-block w-100 olcu resim" src="admin/admin/resim/<?php echo  $resimcek['resim'] ?>"
                  alt="Second slide">
                </div>

                <div class="carousel-caption">
                  <div class="animated fadeInDown">
                    <p class="aciklama"><?php echo  $resimcek['aciklama'] ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!--RESİM SONU -->
          </div>
          <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!-- video carousel -->
        <!-- ETKİNLİKLER -->
        <div>
          <div style="text-align:center">
            <span style="font-family: 'Merriweather', serif;font-size: -webkit-xxx-large;">Etkinlikler</span>
          </div>
          <div style="text-align: center;margin-top: 15px" id="events">
            <ol style="list-style: none;padding: 0;word-break: break-all">
              <input id="etkinlik" type="hidden" name="" value="<?php echo end($etkinlik)->etkinlik  ?>">
              <?php foreach ($etkinlik as $etkinlik): ?>
                <li class="etkinlikler"> <?php echo $etkinlik->etkinlik ?> </li>
              <?php endforeach; ?>
            </ol>
          </div>    
        </div>
        <!-- ETKİNLİKLER -->
      </div>
      <div class="col-md-5">
        <!-- DERS PROGRAMI -->
        <div style="text-align:center">
          <span style="font-family: 'Merriweather', serif;font-size: -webkit-xxx-large;">Ders Programı</span>
          <iframe id="dersprg" src="<?php echo $dersprogrami->img ?>" style="width:100%; height:200px;" frameborder="0"></iframe>
        </div>
        <!-- DERS PROGRAMI -->
        <!-- HAVA DURUMU -->
        <div id="weather_wrapper">
	<div class="weatherCard">
		<div class="currentTemp">
			<span id="degree" class="temp"></span>
			<span id="sehir" class="location"></span>
		</div>
		<div class="currentWeather">
      <img id="img" class="olcum" src="" alt="">
			<div class="info">
				<span id="nem" class="rain"></span>
				<span id="ruzgar" class="wind"></span>
			</div>
		</div>
	</div>
</div>


        <!-- <div class="card sa">
          <div id="sehir" class="city">Eindhoven</div>
          <div id="gun" class="date">29 september 2015</div>
          <div class="weather">
            <div class="sun"><img style="    width: 6em;height: 6em;" id="img" src="" alt=""></div>
            <div id="degree" style="text-align:right;padding-right:20px" class="temp">12°C</div>
          </div>
        </div> -->
        <!-- HAVA DURUMU -->
      </div>
    </div>
  </div>
</body>
</html>