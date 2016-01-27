<?php 

// GENERAL

// Tip: Copy only the contents of the "pulse" folder into the site root, not the folder itself.
// If you want to install in a subfolder, you can, but it must be reflected in the path setting.
	
$path             = ''; // If installed in root, leave blank. If in "subfolder", use "/subfolder"
$admin            = 'admin'; // Admin folder name
$password         = 'demo'; // Admin login
$autobackup       = true; // Turn on/off auto-backup feature
date_default_timezone_set('America/New_York'); // More: https://php.net/manual/en/timezones.php
$language         = 'english';
$pulse_serial     = '' ;
$anonymize_ip     = false;


// EDITOR

$wysiwyg          = true; // Toggle on/off WYSIWYG editor in blocks and blog
$allow            = array('txt','jpeg','gif','jpg','svg','png','pdf','zip'); // File types allowed to be uploaded


// MEDIA

$jpeg_quality     = '85'; // Use 100 for full jpeg quality (larger files)
$jpeg_size        = '1200'; // Scale jpegs to a max pixel size
$thumbnail_height     = '120';


// FORM

$mail_inputs      = array('Name'=>'text','Email'=>'email','Phone'=>'text'); // Input fields
$lang_form_name   = 'Name'; // Must match "Name" input above
$lang_form_email  = 'Email'; // Must match "Email" input above
$mail_textarea    = array('Comment'=>'7'); // 7 = Number of rows in comment textarea
$email_contact    = array('you@mail.com'); // Example: 'one@mail.com','two@mail.com'

// Tip: To add more form fields, add to the $mail_inputs array


// BLOG

$result_per_page  = 5; // Blog posts per page
$disqus_comments  = false; // Turn on/off blog comments (Disqus)
$disqus_shortname = "sample-name"; // Your disqus account name
$date_format      = "M j, Y"; // More: https://php.net/manual/en/function.date.php

// RSS

$blog_title       = 'My Blog';
$blog_description = 'This is my blog.';
$blog_url         = "http://example.com/blog";
$rss_lang         = 'en-us';
$url_prefix   	  = 'blog'; // blog-1-post-title, if changed also edit htaccess
