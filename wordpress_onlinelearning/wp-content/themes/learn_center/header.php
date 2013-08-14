<?php session_start();?>
<!DOCTYPE html>
<html lang="en"><head>
<title>Learn Center | Admissions</title>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/cufon-replace.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/Molengo_400.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/Expletus_Sans_400.font.js"></script>
<!-- Login Register Jquery and css -->
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/newwin.css" type="text/css" media="all">
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/newwin.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/newwin1.js" ></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/loginpopup.js" ></script>
<!-- end -->
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}</style>
<![endif]-->
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
       <!-- <nav>
          <ul id="menu">
            <li><a href="index.html">About</a></li>
            <li><a href="courses.html">Courses</a></li>
            <li><a href="programs.html">Programs</a></li>
            <li><a href="teachers.html">Teachers</a></li>
            <li><a href="admissions.html">Admissions</a></li>
            <li class="end"><a href="contacts.html">Contacts</a></li>
          </ul>
        </nav>-->
				<?php
				/*
					$args = array(
						'theme_location'  => 'primary',
						'container'       => 'nav',
						'menu_id'         => 'menu',
						'exclude' => '4'
						
					);
					
					wp_nav_menu( $args );*/
				if($_SESSION['logindata']->id==''){
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container'       => 'nav',
						'menu_id'         => 'menu',
						
						));
				}
				else
				{
						wp_nav_menu( array(
							'menu'  =>'protected_menu',
							'container'       => 'nav',
							'menu_id'         => 'menu',
						
						));
				}
        
       			 ?>
            <div class="authsection">
            <?php if($_SESSION['logindata']->id==''){
			?>
            	<ul id="icons">
                  <li><a href="<?php echo site_url();?>/?page_id=34?&amp;KeepThis=true&amp;TB_iframe=true&amp;height=200&amp;width=470" class="login" id="auth">Login&nbsp;&nbsp;|</a></li>
                  <li><a href="<?php echo site_url();?>/?page_id=24?&amp;KeepThis=true&amp;TB_iframe=true&amp;height=550&amp;width=470&amp;" class="thickbox" id="auth">Register</a></li>
                </ul>
              <?php }
			  		elseif($_SESSION['logindata']->id!=''){
			  ?>
                <ul id="icons">
                  <li><a href="" id="auth"><?php echo $_SESSION['logindata']->username;?>&nbsp;&nbsp;|</a></li>
                  <li><a href="?page_id=34&msg=logout<?php //echo wp_logout();?>" id="auth">Logout</a></li>
                </ul>
              <?php }?>
            </div>
      </div>
      <div class="wrapper">
        <h1><a href="index.html" id="logo">Learn Center</a></h1>
      </div>
      <div id="slogan"> We Will Open The World<span>of knowledge for you!</span> </div>
    </header>
    <!-- header -->
  </div>
</div>