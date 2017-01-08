<!Doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php wp_title(); ?></title>
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat+Subrayada|Poiret+One|Raleway:400,700|Six+Caps" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>
<!-- Navbar -->
<div class="container">
  <?php wp_nav_menu(array(
  	'menu' => 'Main Menu',
  	'container_id' => 'cssmenu',
  	'walker' => new CSS_Menu_Walker()
  )); ?>
  	      </div>
<!-- end of Nav -->
<a name="Home"></a>
<div class="fixed-bg">
<div class="container">
    <div class="name">
      <h1>Carmen Smith</h1>
    </div>

<div class="subheader">
  <h5>PR•Code•Photography</h5>
</div>

    <!-- Decor -->
    <div class="icon">
      <span class="glyphicon glyphicon-chevron-left" style="inline-block"></span>
      <span class="glyphicon glyphicon-heart"></span>
      <span class="glyphicon glyphicon-chevron-right"></span>
    </div>
    <!-- end of Decor -->
  </div>
</div>
