<?php 
session_start();
if(isset($_REQUEST['upload'])) {
  $Useremail = $_REQUEST['Useremail'];
  $_SESSION['Useremail'] = $Useremail;
 

    // Include the UberGallery class
    include('resources/UberGallery.php');

    // Initialize the UberGallery object
    $gallery = new UberGallery();

      $Path = "../admin/server/php/".$_REQUEST['Useremail'];
    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory($Path);

    // Define theme path
    if (!defined('THEMEPATH')) {
        define('THEMEPATH', $gallery->getThemePath());
    }

    // Set path to theme index
    $themeIndex = $gallery->getThemePath(true) . '/index.php';

    // Initialize the theme
    if (file_exists($themeIndex)) {
        include($themeIndex);
    } else {
        die('ERROR: Failed to initialize theme');
    }
	
	}  else { ?>

<form name="" method="post">

UserName : <input type="text" name="Useremail" id="Useremail" >

<input type="submit" name="upload" id="upload" value="SUBMIT" >

</form>

<?php } ?>
