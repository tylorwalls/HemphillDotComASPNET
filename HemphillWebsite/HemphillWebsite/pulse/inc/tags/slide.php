<script src="<?php echo $path; ?>/inc/plugins/slider/jquery.flexslider-min.js"></script>

<link href="<?php echo $path; ?>/inc/plugins/slider/flexslider.css" rel="stylesheet" />

<div class="flexslider">

<ul class="slides">

<?php
$galdir = $tag_var1;
$images = glob("content/media/$galdir/*");
$taken  = array();
$path_new = '';
if (!empty($path)) { $path_new = $path.'/'; }

$opFile = "content/media/". $galdir ."/gallery.txt";

if (file_exists($opFile)) { 
	$fp          = fopen($opFile,"r");    	
	$data        = @fread($fp, filesize($opFile));
	fclose($fp);
	$line        = explode("\n", $data);		


	foreach($line as $test){
		if(!empty($test)){
    		$test_line[] = explode("|", $test); 
		}     	        
	}
        
	foreach ($test_line as $t){
		$image = "content/media/$galdir/".$t[0];
		$info  = pathinfo($image);
		$ext   = $info['extension'];
		if ($ext != 'txt' || empty($ext)){
    		$taken[] = $image;
			echo "<li><img src='$path_new$image'></li>\n";
		}  
	}
}

foreach ($images as $image) { 
    if (!in_array($image, $taken)){
    	$info   = pathinfo($image);
		$ext    = $info['extension'];
		if ($ext != 'txt'){
	    	echo "<li><img src='$path_new$image'></li>";
		}
    }
}

unset($galdir,$images,$test_line,$tag_var1,$image,$opFile,$line,$fp,$data,$test,$taken);
?>

</ul>

</div>

<script>
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    smoothHeight: false,
    directionNav: false,
    controlNav: true,
    keyboard: true,
    slideshowSpeed: 5000,
    animationSpeed: 600
  });
});
</script>