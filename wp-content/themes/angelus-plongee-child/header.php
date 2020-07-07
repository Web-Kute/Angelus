<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="keywords" content="Centre de plongée, Morbihan, activités subaquatiques, plongée sous-marines, Bretgane sud,"/>
    <meta property="og:url"           content="<?php echo home_url( '/' ); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Angelus Plongée, Belle-île-en-mer dans le Morbihan" />
    <meta property="og:description"   content="Plongée en famille ou en groupe, pour un baptême ou un stage, dans le Morbihan en Bretagne sud" />
    <meta property="og:image"         content="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Logo-Angelus-Plongee.svg" />
    <meta property="og:site_name"     content="<?php echo home_url( '/' ); ?>" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <meta name="description" content="En Bretagne sud, dans le Morbihan, Angelus Plongée vous propose baptêmes, formations du Niveau 1 au Niveau 3, stages découvertes et d'initiation pour les enfants et des randos à la palme" />
</head>
<body <?php body_class(); ?> id="angel" data-aos-easing="ease-in-out" data-aos-duration="800" data-aos-delay="0">
     <?php wp_body_open(); ?>
    <!-- Desktop & Landscape Tablet Menu -->
    <header>
        <div class="header desktop-menu" id="container-main-menu">
            <nav class="navigation desktop">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Header Menu Left -->
                        <?php get_template_part( 'template-parts/header-left' ); ?>
                        <!-- Header Logo Center -->
                        <?php get_template_part( 'template-parts/header-center' ); ?>
                        <!-- Header Menu Right -->
                        <?php get_template_part( 'template-parts/header-right' ); ?>
                    </div>
                </div>
                <div class="menu-border"></div>
            </nav>
        </div>
        <!-- Mobile & Portrait Tablet Menu -->
        <nav class="mobile" id="mobile-menu">
            <div class="navigation" id="burgerMenu">
                <div id="logo">
                    <?php get_template_part( 'template-parts/logo-mobile' ); ?>
                </div>
                <div class="navbar-nav ml-3 mr-3 mt-2 mt-lg-2">
                    <?php wp_nav_menu( array( 'theme_location' => 'left-menu' ) ); ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'right-menu' ) ); ?>
                </div>
            </div>
            <!-- Header Left Mobile -->
            <div class="header-left">
                <div class="mobile-menu-icon">
                    <div class="bar-menu circle-menu">
                        <div class="icon-bar"></div>
                        <div class="icon-bar"></div>
                        <div class="icon-bar"></div>
                        <div class="small-circle-menu"></div>
                    </div>
                    <div class="mobile-menu-close">
                        <span class="close-menu">
                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="#B4C712"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path>
                            </svg>
                        </span>
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
    </header>
<?php
if( is_page_template('page.php') || is_archive() || is_single()) {
    if ( function_exists('yoast_breadcrumb') ) {

    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );

    }
}
?>
