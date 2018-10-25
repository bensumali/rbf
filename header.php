<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
	<meta name="author" content="">
	<title><?php echo get_bloginfo( 'name' ); ?></title>
    <?php if(is_user_logged_in()) : ?>
	    <link href="<?php echo get_bloginfo( 'template_directory' );?>/css/header-admin.css" rel="stylesheet">
	<?php endif; ?>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link href="<?php echo get_bloginfo( 'template_directory' );?>/style.css" rel="stylesheet">
	<?php if(!is_front_page()) : ?>
	    <link href="<?php echo get_bloginfo( 'template_directory' );?>/css/header-non-home.css" rel="stylesheet">
	<?php endif; ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head();?>
</head>

<body>
    <div id="rbf-main-content-container">
        <nav id="rbf-nav-main-container">
            <span id="rbf-header-logo">
                <a href="<?php echo get_home_url(); ?>">
                    <?php
                        $rbfLogo = esc_url(get_theme_mod('rbf_header_logo'));
                        if(!empty( $rbfLogo )) {
                            echo "<img src='$rbfLogo' />";
                        }
                    ?>
                </a>
            </span>
            <button id="rbf-nav-main-mobile-button">
                <div></div>
                <div></div>
                <div></div>
            </button>
            <div id="rbf-nav-links-container">
                 <?php
                     print_r(wp_nav_menu(array("menu" => "main-menu")));
                 ?>
                 <div id="rbf-nav-social-container">
                    <span>
                        <i class="fab fa-facebook-f"></i>
                    </span>
                    <span>
                        <i class="fab fa-twitter"></i>
                    </span>
                    <span>
                        <i class="fab fa-instagram"></i>
                    </span>
                    <span>
                        <i class="fab fa-youtube"></i>
                    </span>
                 </div>
            </div>
        </nav>