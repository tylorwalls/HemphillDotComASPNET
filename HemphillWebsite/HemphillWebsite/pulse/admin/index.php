<?php

error_reporting(0);

include_once("../config.php");
include_once("inc/lang/english.php");
if (!empty($language) && file_exists("inc/lang/$language.php")){ include_once("inc/lang/$language.php"); } 
include_once("inc/login.php");
include_once("inc/magic.php");

$page = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'home';
$page = htmlspecialchars($page, ENT_QUOTES, 'UTF-8');
$page = preg_replace('/[^-a-zA-Z0-9_]/', '', $page);

if (!file_exists("inc/" . $page . ".php")) {
    $page = '404';
}

ob_start(); 

include("inc/$page.php");

$content = ob_get_contents();

ob_end_clean();

?>
<!DOCTYPE html>
<html>
<head>	
	<title><?php echo $lang_title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/admin.css">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/animate.css">
	<link rel="stylesheet" href="<?php echo $path.'/'.$admin; ?>/css/redactor.css">
	<script src="<?php echo $path.'/'.$admin; ?>/js/jquery.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/jquery-ui.min.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/redactor.min.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/redactor_options.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/scripts.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/imagemanager.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/fullscreen.js"></script>
	<script src="<?php echo $path.'/'.$admin; ?>/js/redactor/table.js"></script>
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon.png" />
</head>
<body>

<div id="header" class="group"><div>
	<a href="<?php echo $path.'/'.$admin; ?>">
		<img src="img/logo.svg" title="Hi!">
		<a class="logout" title="<?php echo $lang_nav_logout ?>" href="index.php?p=logout"><img src="img/icon-logout.svg"></a>
	</a>
</div></div>
<div class="content group">
<?php 
echo $content;  
if ($autobackup ==true && extension_loaded('zip')==true ){ include("inc/auto_backup.php"); } 
?>
</div>

<div id="footer">
<?php
		if (!empty($pulse_serial)) { $check = str_split($pulse_serial);}
	
		if (empty($pulse_serial) 
		|| strlen($pulse_serial) > 20 
		|| strlen($pulse_serial) < 16
		|| count(array_unique($check)) < 4 ) { 
		
			echo '<a class="trial" href="http://pulsecms.com/trial">TRIAL VERSION</a>'; 
		}	
		else {
			echo ""; 	
		}

?>

	<span class="ver">Pulse CMS 4.5.1</span>
	<span class="help"><a target="_blank" href="http://pulsecms.com/docs/"><?php echo $lang_help;?></a></span>
</div>

</body>
</html>