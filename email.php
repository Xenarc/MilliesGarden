<?php
$email = strip_tags($_POST['email']);
$FName = strip_tags($_POST['FName']);
$LName = strip_tags($_POST['LName']);
$PotId = strip_tags($_POST['PotId']);
$PictureReference1 = strip_tags($_POST['PictureReference1']);
$PictureReference2 = strip_tags($_POST['PictureReference2']);
$PictureReference3 = strip_tags($_POST['PictureReference3']);
$PictureReference4 = strip_tags($_POST['PictureReference4']);

if ( preg_match( "/[\r\n]/", $usr ) || preg_match( "/[\r\n]/", $email ) ) {
  //displayError
}
// Send email to Millie
// Send email to customer
?>