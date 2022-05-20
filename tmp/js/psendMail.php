<?php


/////////////////////////////////////////////////
//$imageFile = $_FILES["logo"]["tmp_name"];
/*
$path = '1581071744.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
*/

$info = pathinfo($_FILES['logo']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname.".$ext;

$target = 'uploads/'.$newname;
move_uploaded_file( $_FILES['userFile']['tmp_name'], $target);



$tech1 = $_POST['tech1'];
$emplacement1 = $_POST['emplacement1'];

$tech2 = $_POST['tech2'];
$emplacement2 = $_POST['emplacement2'];



$nbColors = $_POST['nbColors'];


$vetement =  $_GET['ct'];


/////////////////////////////////////////////////

$nbHomme = $_POST['nbHomme'];
$nbFemme = $_POST['nbFemme'];
$nbEnfant = $_POST['nbEnfant'];


/////////////////////////////////////////////////

$name = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

/////////////////////////////////////////////////
$phoneNumber = $_POST['phoneNumber'];
$text = $_POST['text'];


/////////////////////////////////////////////////
  $to = "jawad.baadoud@gmail.com";
  $subject = "(CPB.COM) Demande de devis pour : $name";

  /////////////////////////////////////////////////

$messages= " Nom : ".$name. "\r Email : ".$email." \r No de téléphone : ".$phoneNumber. "\r\r Vetement : ".$vetement."\r \r Logo : ".$path."\r\r Emplacement 1 :
".$emplacement1."\r\r Technique 1:
".$tech1."\r\r Emplacement 2 :
".$emplacement2."\r\r Technique 2:
".$tech2."\r\r Nombre de couleurs : ".$nbColors."\r\r\r Remarques : ".$text. "\r \r Quantité Homme : ".$nbHomme." \r Qté Femme : ".$nbFemme."\r Qté Enfant : ".$nbEnfant;

  mail($to,$subject,$messages);
  header('Location:mailsent.html');

   ?>
