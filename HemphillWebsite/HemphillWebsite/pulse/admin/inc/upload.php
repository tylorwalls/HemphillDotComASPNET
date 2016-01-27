<?php

require_once("login.php");

session_start();

if (isset($_FILES['imagename']) && !(empty($_FILES['imagename'])) 
    && !(empty($_FILES['imagename']['name']))
    && isset($_POST['folder']) && !(empty($_POST['folder']))
    && isset($_SESSION["token"]) && !(empty($_POST['token']))
    && isset($_POST["token"]) && !(empty($_POST['token']))
    && $_SESSION["token"] == $_POST["token"]){
		
    $files = array();
    $fdata = $_FILES['imagename'];
    $error = array();
        
    if (is_array($fdata['name'])){
	    
        for ($i = 0; $i<count($fdata['name']); $i++){
	     
        $files[]  = array(
        'name'    => $fdata['name'][$i],
        'type'    => $fdata['type'][$i],
        'tmp_name'=> $fdata['tmp_name'][$i],
        'error'   => $fdata['error'][$i], 
        'size'    => $fdata['size'][$i]  
         );

        }
    } else { $files[] = $fdata; }
    	    	
    foreach ($files as $file){
	    	    
	    $fileName = $file["name"];
	    	    
	    if ($file["size"] > 5200000) { $error[] = 'File is too big! <br/>';}
	    if (!in_array(strtolower(substr(strrchr($fileName, '.'), 1)), $allow)){ $error[] = 'Wrong file extension<br />';} 
		if ($file["error"] > 0) { $error[] = "Error: " . $file["error"] . "<br />";	}			
		 
		if (empty($error)){  				
            $fileName = str_replace(" ", "_", $fileName);
            if (strlen($fileName) > 200) { $fileName = substr($fileName, 0, 199); }
 
		    if (file_exists("../content/".$_POST['folder'].'/'. $fileName)) { 				
			   $fileName = rand() . $fileName;
		    }

            if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' ){ 	           				
				$filename = $file["tmp_name"];

				// Set a maximum height and width
				$width = $jpeg_size;
				$height = $jpeg_size;

				// Content type
				header('Content-Type: image/jpeg');

				// Get new dimensions
				list($width_orig, $height_orig) = getimagesize($filename);
							
				if ( ($width_orig > $width)  || ($height_orig > $height) ){
				 	
				 	// wider than tall
					if ($width_orig > $height_orig){
						$ratio_orig = $height_orig/$width_orig;
						$width = $width;
						$height = $height*$ratio_orig;
					}
					// taller than wide
					if ($width_orig < $height_orig){
						$ratio_orig = $width_orig/$height_orig;
						$height = $height;
						$width = $width*$ratio_orig;
					}
				}
				
				else if( ($width_orig <= $width) && ($height_orig <= $height)){
					$width = $width_orig;
					$height = $height_orig;
				}

				// Resample
				$image_p = imagecreatetruecolor($width, $height);
				$image = imagecreatefromjpeg($filename);
				imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

				// Output
				$dest = "../content/".$_POST['folder'].'/'. $fileName;
				imagejpeg($image_p, $dest, $jpeg_quality);					 
            }
                                           
            else if (move_uploaded_file($file["tmp_name"], "../content/".$_POST['folder'].'/'. $fileName)){
                chmod("../content/".$_POST['folder'].'/'. $fileName,0777);
            } else { $error[] = 'Could not upload.';}
         }             
    }	

    if (empty($error)){
        header("Location:index.php?p=home&f=".$_POST['folder']);
		die();
    }

    if (!empty($error)){ 
	    $_SESSION['error-uploading'] = $error; 
	    header("Location:index.php?p=upload&gallery=".$_POST['folder']);
		die();
	 }
}

else {
	
if (!isset($_GET['gallery'])
    ||!file_exists("../content/".$_GET['gallery'])
    || empty($_GET['gallery'])){
	$pnum = $_GET['pnum'];
	
	$_SESSION['error'] = $lang_error_upload.'<br/>';
	header("Location:index.php?p=home&f=media");
	die();    
}

else {	

    $folder = $_GET['gallery'];
    $fname = explode('/',$folder);
    $last_level = end($fname);
    $full_path  = $folder;
     
    echo "<div class='breadcrumb'>";    
		include('breadcrumbs.php');
	echo "</div>";

    if (isset($_SESSION['error-uploading']) && !(empty($_SESSION['error-uploading']))) { 
	    $errors = array();
	    $errors = $_SESSION['error-uploading'];
	    foreach ($errors as $error){
	        print($error);
	     }
	     unset($_SESSION['error-uploading']);   
    }	
?>	
<form class="upload-form" action = "" method="post" enctype="multipart/form-data">
<?php if (empty($_SESSION["token"])) { $_SESSION["token"] = md5(uniqid(rand(), TRUE)); } ?>
<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
<input type="hidden" name="folder" value="<?php echo $folder; ?>">
<input type="file" name="imagename[]" id="imagename" multiple />
<button class="btn" type="submit" name="submit"><?php echo $lang_home_upload_button; ?></button>
</form>

<?php 
	}
} ?>