<?php

require_once 'baglan.php';

$bolum = $_POST['bolum'];
$kid=$db->prepare("SELECT k_id FROM kullanici where k_ad=:kul_ad ");
$kid->execute(array('kul_ad'=>$bolum ));
$kid=$kid->fetch(PDO::FETCH_OBJ);
$kid=$kid->k_id;

if (isset($_POST['duyuru']) and $_POST['duyuru']==1) {
     $duyurular=$db->prepare("SELECT * FROM duyuru where k_id=:kid order by id desc ");
     $duyurular->execute(array('kid'=>$kid));
     $duyurular=$duyurular->fetch(PDO::FETCH_OBJ);
     if(!empty($duyurular))
     {
        $duyuru = json_encode($duyurular);
        echo $duyuru;    
     }
     else
     {
        $durum = "0";
        $durum = json_encode($durum);
       echo $durum; 
     }
    
     

}
if (isset($_POST['ders']) and $_POST['ders']==1) {
    $duyurular=$db->prepare("SELECT * FROM ders where k_id=:kid order by ders_id desc ");
    $duyurular->execute(array('kid'=>$kid));
    $duyurular=$duyurular->fetch(PDO::FETCH_OBJ);
    if(!empty($duyurular))
    {
       $duyuru = json_encode($duyurular);
       echo $duyuru;    
    }
    else
    {
        $durum = "0";
        $durum = json_encode($durum);
       echo $durum; 
    }

}

if (isset($_POST['etkinlik']) and $_POST['etkinlik']==1) {
    $duyurular=$db->prepare("SELECT * FROM etkinlik where k_id=:kid order by id desc ");
    $duyurular->execute(array('kid'=>$kid));
    $duyurular=$duyurular->fetch(PDO::FETCH_OBJ);
    if(!empty($duyurular))
    {
       $duyuru = json_encode($duyurular);
       echo $duyuru;    
    }
    else
    {
        $durum = "0";
        $durum = json_encode($durum);
       echo $durum; 
    }

}

if (isset($_POST['video']) and $_POST['video']==1) {
    $duyurular=$db->prepare("SELECT * FROM video where k_id=:kid order by id desc ");
    $duyurular->execute(array('kid'=>$kid));
    $duyurular=$duyurular->fetch(PDO::FETCH_OBJ);
    if(!empty($duyurular))
    {
       $duyuru = json_encode($duyurular);
       echo $duyuru;    
    }
    else
    {
        $durum = "0";
        $durum = json_encode($durum);
       echo $durum; 
    } 

}
if (isset($_POST['resim']) and $_POST['resim']==1) {
    $duyurular=$db->prepare("SELECT * FROM resim where k_id=:kid order by resim_id desc ");
    $duyurular->execute(array('kid'=>$kid));
    $duyurular=$duyurular->fetch(PDO::FETCH_OBJ);
    if(!empty($duyurular))
    {
       $duyuru = json_encode($duyurular);
       echo $duyuru;    
    }
    else
    {
        $durum = "0";
        $durum = json_encode($durum);
       echo $durum; 
    }

}





?>