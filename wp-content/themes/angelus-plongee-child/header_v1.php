<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Angelus Plongée propose baptêmes, explorations, formation du N1 au N3 ainsi qu&#039;une formation au vêtement étanche et des balades subaquatiques" />
    <meta property="og:url"           content="<?php echo home_url( '/' ); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Angelus Plongée, Belle-île-en-mer dans le Morbihan" />
    <meta property="og:description"   content="Découvrir la plongée en famille, ou entre amis, plonger en Bretagne sur des épaves" />
    <meta property="og:image"         content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-Angelus-Plongee.svg" />
<!--     <meta http-equiv="Cache-control" content="max-age=2592000, public">
    <meta http-equiv="Expires" content="0" /> -->
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body id="angel" data-aos-easing="ease-in-out" data-aos-duration="800" data-aos-delay="0" <?php body_class(); ?>>
     <?php wp_body_open(); ?>
    <!-- Desktop & Landscape Tablet Menu -->
    <div id="container-main-menu">
        <nav id="main-menu" class="navigation desktop">
        <!-- Header Menu Left -->
        <div class="header-left">
            <div class="logo-text-left"><a href="<?php echo home_url( '/' ); ?>" title="Angelus Plongée, La plongée à Belle-île-en-mer">Angelus Plongée</a></div>
            <div class="logo-text-sub">La plongée à Belle-île-en-mer</div>
        </div>
        <!-- Header Menu Right -->
        <?php get_template_part( 'template-parts/header-right' ); ?>
        <div class="menu-border"></div>
            <div class="container-fluid mb-3 desktop-menu">
                <div class="row">
                    <div class="col-5 d-flex align-items-center justify-content-end menu-left pt-5">
                        <?php wp_nav_menu( array( 'theme_location' => 'left-menu' ) ); ?>
                    </div>
                    <div class="col-2 text-center d-flex align-items-center justify-content-center">
                        <figure><a href="<?php echo home_url( '/' ); ?>" title="Plongée en Bretagne sud"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-Angelus-Plongee.svg" width="160" height="160" alt="Angelus Plongée, La plongée en Bretagne sud"></a></figure>
                    </div>
                    <div class="col-5 d-flex align-items-center justify-content-start menu-right pt-5">
                        <?php wp_nav_menu( array( 'theme_location' => 'right-menu' ) ); ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile & Portrait Tablet Menu -->
    <nav id="mobile-menu" class="mobile">
        <div class="navigation" id="burgerMenu">
            <div id="logo">
                <?php get_template_part( 'template-parts/logo-mobile' ); ?>
            </div>
            <div class="navbar-nav ml-3 mr-3 mt-2 mt-lg-2">
                <?php wp_nav_menu( array( 'theme_location' => 'left-menu' ) ); ?>
                <?php wp_nav_menu( array( 'theme_location' => 'right-menu' ) ); ?>
            </div>
        </div>
        <!-- Header Left -->
        <div class="header-left">
            <div class="mobile-menu-icon">
                <div class="bar-menu circle-menu">
                    <div class="icon-bar"></div>
                    <div class="icon-bar"></div>
                    <div class="icon-bar"></div>
                    <div class="small-circle-menu"></div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center menu-pages">
            <div class="row">
                <div class="col">
                    <div class="mobile-menu-logo">
                        <?php get_template_part( 'template-parts/logo-mobile' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part( 'template-parts/header-right' ); ?>
    </nav>
