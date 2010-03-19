<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="web development, web consulting, search engine optimization, kohana consulting, kohana framework, php developer, php website, php 5, php, ajax, sso, xhtml, css, wings, wings consulting, information transfer engineering, grand marais, duluth, minneapolis, minnesota, north shore, lake superior, web application, content management, custom website, business website, freelance developer" />
<meta name="description" content="w.ings consulting is the web development business of Woody Gilk. I design, implement, and optimize digital solutions to effectively communicate information from one person to another." />
 
<title><?php if (!empty($title)) echo "$title ~ " ?>w.ings consulting ~ information transfer engineering</title>
 
<?php echo
HTML::style('media/css/print.css', array('media' => 'print')),
HTML::style('media/css/screen.css', array('media' => 'screen')),
HTML::style('media/css/layout.css', array('media' => 'screen')) ?>
 
<script type="text/javascript">
// Base URL of the application
var base_url = '<?php echo url::base() ?>';
</script>
<?php echo
HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js'),
HTML::script('media/js/color.js'),
HTML::script('media/js/effects.js') ?>
 
</head>
<body>
<div class="container">
 
<div id="header" class="span-22 prefix-1 suffix-1 last">
<?php echo html::anchor('', html::image('media/img/wings.png', array(
'alt' => 'w.ings consulting - information transfer engineering',
'id' => 'logo'))) ?>
<ul id="menu">

</ul>
</div>
 
<div id="content" class="span-22 prefix-1 suffix-1 last">
<?= ! empty($messages) ? $messages : ''; ?>
<?php echo $content ?>
</div>
 
<div id="footer" class="span-24">
<div class="vcard">
<ul>
<li class="fn org"><?php echo html::anchor('', 'w.ings consulting', array('class' => 'url')) ?></li>
<li class="email"><?php echo html::mailto('woody@wingsc.com', 'Email Me') ?></li>
<li class="twitter"><?php echo html::anchor('http://twitter.com/shadowhand', 'Follow Me') ?></li>
<li class="copyright"><small>Copyright &copy; 2009</small></li>
</ul>
<p>Web Development in <span class="adr"><span class="locality">Grand Marais</span> | Duluth | Minneapolis, <span class="region">Minnesota</span></span></p>
<p><small>Rendered in {execution_time} by <?php echo html::anchor('http://kohanaphp.com/', 'KohanaPHP') ?> on <?php echo html::anchor('http://webfaction.com/?affiliate=wgilk', 'webfaction') ?></small></p>
</div>
</div>
 
</div>
<?php if ( ! IN_PRODUCTION) echo View::factory('profiler/stats') ?>
 
</body>
</html>