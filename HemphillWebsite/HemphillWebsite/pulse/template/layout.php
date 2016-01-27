<!DOCTYPE html>
<html>

<head>	
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $page_desc; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $path; ?>/template/css/base.css">
	<link rel="stylesheet" href="<?php echo $path; ?>/template/css/master.css">
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,400'>
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400'>
	<script src="<?php echo $path; ?>/template/js/jquery.js"></script>
</head>

<body>

<div id="header" class="group">
	
	<a href="./">
		<img class="logo" alt="logo" src="<?php echo $path; ?>/template/img/logo.png">
	</a>
	
	<div id="nav">
		<?php include("content/blocks/sb_nav.txt"); ?>
	</div>
	
</div>
<div class="inner group">
	<!-- Main Content -->
	<?php echo $parsedown->text($content); ?>
</div>


<div id="footer" class="group">
	<p class="copyright">Copyright Acme Inc. 2013 | <a href="http://pulsecms.com">Powered by Pulse</a></p>
	<a href="#"><img alt="twit" class="soc" src="<?php echo $path; ?>/content/media/icons/twit.svg"></a>
	<a href="#"><img alt="fb" class="soc" src="<?php echo $path; ?>/content/media/icons/fb.svg"></a>
	<a href="#"><img alt="instagram" class="soc" src="<?php echo $path; ?>/content/media/icons/inst.svg"></a>	
</div>

<!-- Stats Tracking Code -->
<script src="<?php echo $path; ?>/<?php echo $admin; ?>/inc/tracker.php?uri=<?php echo $_SERVER['REQUEST_URI']; ?>&ref=<?php echo $_SERVER['HTTP_REFERER']; ?>"></script>

</body>

</html>