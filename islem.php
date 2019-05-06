<?php 
// bağlan phpde session dursun headerin içinde bişe olmasın her yere bağlan phpyi eklersin

require_once 'baglan.php';

if (isset($_POST['kullanicigiris'])) {
$kul_ad=$_POST['kullanici_adi'];
$kul_sifre=$_POST['kullanici_password'];
$kullanicisor=$db->prepare("SELECT * FROM kullanici where k_ad=:email and sifre=:password");
$kullanicisor->execute(array('email'=>$kul_ad,'password'=>$kul_sifre ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);	
if ($say==1)
	{
	$_SESSION['k_ad']=$kul_ad;
	header("Location:./admin/admin/dersprogrami.php?durum=bilgisayar");
	exit();
	}	 
else
{
header("Location:login.php?durum=no");
exit();	 	
}
}

// duyuru silme
if (isset($_GET['duyurusil']) and ($_GET['duyurusil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM duyuru WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/duyuru.php?durum=ok");
    }
}
// etkinlik silme
if (isset($_GET['etkinliksil']) and ($_GET['etkinliksil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM etkinlik WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/etkinlik.php?durum=ok");
    }
}
// video silme 
if (isset($_GET['videosil']) and ($_GET['videosil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM video WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/video.php?durum=ok");
    }
}
// duyuru ekleme
 if(isset($_POST['duyuruekle'])) 
 {
	$duyurukaydet=$db->prepare("INSERT INTO duyuru SET duyuru=:dyrmetin,k_id=:kk_id");
	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['duyurumetni'],'kk_id'=>$_POST['kullanici_id']));
	header("Location:./admin/admin/duyuru.php");
}
// etkinlik ekleme
if(isset($_POST['etkinlikekle'])) 
{
	$duyurukaydet=$db->prepare("INSERT INTO etkinlik SET etkinlik=:dyrmetin,tarih=:tarih ,k_id=:kk_id");
	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['etkinlik'],'tarih'=>$_POST['tarih'] ,'kk_id'=>$_POST['kullanici_id']));
	header("Location:./admin/admin/etkinlik.php");
}
// dersprogramı ekleme
if(isset($_POST['dersprogramekle']))
{
	$derssil=$db->prepare("DELETE FROM ders WHERE k_id=:kullanici_id");
	$sil=$derssil->execute(array('kullanici_id'=>$_POST['kullanici_id']));
	$dersekle=$db->prepare("INSERT INTO ders SET img=:derslinki,k_id=:kullanici_id");
	$ekle=$dersekle->execute(array('derslinki'=>$_POST['derslinki'],'kullanici_id'=>$_POST['kullanici_id']));	
		header("Location:./admin/admin/dersprogrami.php");
}
// ders programı silme
if (isset($_GET['derssil']) and ($_GET['derssil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM ders WHERE k_id=:user_id and ders_id=:d_id");
    $kontrol=$sil->execute(array('user_id'=>$_GET['kullanici_id'] , 'd_id'=>$_GET['ders_id'] ));
	if ($kontrol) 
	{
    header("Location:./admin/admin/dersprogrami.php?durum=ok");
    }
}
// video yükleme
if (isset($_POST['videoyukle'])) 
{
$yukleklasor="./admin/admin/video/";
$tmp_name = $_FILES['video']['tmp_name'];
$name=$_FILES['video']['name'];
$boyut =$_FILES['video']['size'];
$tip=$_FILES['video']['type'];
$uzanti = substr($name, -4,4);
$rand1=rand(10000,50000);
$rand2=rand(10000,50000);
$resimad=$rand1.$rand2.$uzanti;
move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
$resimsor=$db->prepare("INSERT INTO video SET link=:resimbilgi , aciklama=:aciklamabilgi, k_id=:kul_id");
$resimcek=$resimsor->execute(array('resimbilgi' => $resimad , 'aciklamabilgi'=>$_POST['aciklama'] , 'kul_id'=>$_POST['kullanici_id']));
if ($resimcek) {
	header("Location:./admin/admin/video.php");
}
}
// resim yükleme
if (isset($_POST['resimyukle'])) 
{
$yukleklasor="./admin/admin/resim/";
$tmp_name = $_FILES['yukle_resim']['tmp_name'];
$name=$_FILES['yukle_resim']['name'];
$boyut =$_FILES['yukle_resim']['size'];
$tip=$_FILES['yukle_resim']['type'];
$uzanti = substr($name, -4,4);
$rand1=rand(10000,50000);
$rand2=rand(10000,50000);
$resimad=$rand1.$rand2.$uzanti;
//dosya varmı control 

if (strlen($name)==0) {
	echo "Bir dosya seçiniz";
	exit();
}
//boyut control
if ($boyut>(1024*1024*3)) {
	echo "Dosya boyutu çok fazla";
	exit();
}
//tip kontrol
if ($tip != 'image/jpeg' && $tip!= 'image/png' && $uzanti!='.jpg') {
	echo "Yalnızca jpeg veya png formatında olabilir";
}

move_uploaded_file($tmp_name, "$yukleklasor/$resimad");


$resimsor=$db->prepare("INSERT INTO resim SET resim=:resimbilgi , aciklama=:aciklamabilgi, k_id=:kul_id");
$resimcek=$resimsor->execute(array('resimbilgi' => $resimad , 'aciklamabilgi'=>$_POST['aciklama'] , 'kul_id'=>$_POST['kullanici_id']));
if ($resimcek) {
	header("Location:./admin/admin/resim.php");
}
}
// resim silme
if (isset($_GET['resimsil']) and ($_GET['resimsil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM resim WHERE  resim_id=:r_id");
    $control=$sil->execute(array('r_id'=>$_GET['id'] ));
	if ($control) 
	{
        header("Location:./admin/admin/resim.php?durum=ok");
    }
}
//duyuru güncelleme
if (isset($_POST['duyuru-guncelle']))
 {

    $duyuru_id=$_POST['duyuru_id'];
    
    
	$duyurusor=$db->prepare("UPDATE duyuru SET
    duyuru=:a 
    
    WHERE id={$_POST['duyuru_id']} ");

    $update=$duyurusor->execute(array(
    'a'=>$_POST['duyuru']
    ));
    if ($update) 
    {
    	header("Location:./admin/admin/duyuru.php?durum=ok");
    }
    else header("Location:./admin/admin/duyuru-guncelle.php?durum=no");
	
}
//Ders programı guncelleme
if (isset($_POST['dersprogrami-guncelle']))
 {
    $ders_id=$_POST['ders_id'];
    //Tablo Güncelleme İşlemi 
	$duyurusor=$db->prepare("UPDATE ders SET img=:a WHERE ders_id={$_POST['ders_id']} ");
    $update=$duyurusor->execute(array('a'=>$_POST['img']));
    if ($update) 
    {
    	header("Location:./admin/admin/dersprogrami.php?durum=ok");
    }
    else
    {
        header("Location:./admin/admin/dersprogrami-guncelle.php?durum=no");	
    } 
}
//Etkinlik Güncelleme
if (isset($_POST['etkinlik-guncelle']))
 {
    $etkinlik_id=$_POST['etkinlik_id'];    
    //Tablo Güncelleme İşlemi 
	$etkinliksor=$db->prepare("UPDATE etkinlik SET etkinlik=:a , tarih=:b  WHERE id={$_POST['etkinlik_id']} ");
    $update=$etkinliksor->execute(array('a'=>$_POST['etkinlik'] , 'b' => $_POST['tarih'] ));
    if ($update) 
    {
    	header("Location:./admin/admin/etkinlik.php?durum=ok");
    }
    else header("Location:./admin/admin/etkinlik-guncelle.php?durum=no");
	
}
//Resim Açıklama Güncelleme
if (isset($_POST['resim-guncelle']))
 {
    $resim_id=$_POST['resim_id'];  
    //Tablo Güncelleme İşlemi 
	$resimsor=$db->prepare("UPDATE resim SET aciklama=:a WHERE resim_id={$_POST['resim_id']} ");
    $update=$resimsor->execute(array('a'=>$_POST['aciklama']));
    if ($update) 
    {
    	header("Location:./admin/admin/resim.php?durum=ok");
    }
    else header("Location:./admin/admin/resim-guncelle.php?durum=no");
	
}
//Video Açıklama Güncelleme
if (isset($_POST['video-guncelle']))
 {
    $video_id=$_POST['video_id'];
    //Tablo Güncelleme İşlemi 
	$videosor=$db->prepare("UPDATE video SET aciklama=:a   WHERE id={$_POST['video_id']} ");
    $update=$videosor->execute(array('a'=>$_POST['aciklama']));
    if ($update) 
    {
    	header("Location:./admin/admin/video.php?durum=ok");
    }
    else header("Location:./admin/admin/video-guncelle.php?durum=no");
}

 ?>