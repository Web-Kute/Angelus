<?php /**
* Template Name: Pages Spots
*
* @package Angelus-Plongee
* @subpackage _$
* @since underscores.me 2019
*/
?>
<?php get_header(); ?>

<nav id="menu-activity">
	<div id="navigation-pages-top">
	    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</div>
</nav>
<div class="wrapper site-main">
    <!-- Page Content -->
    <main id="content" class="content-single">
    	<div id="primary" class="content-area">
    		<?php
    			while ( have_posts() ) :
    				the_post();
    				get_template_part( 'template-parts/content', get_post_type() );
    			endwhile; // End of the loop.
    		?>
    	</div><!-- #primary -->
    </main><!-- #main -->
    <?php if ( is_active_sidebar('sidebar-1') ) { ?>
        <div class="side_bar">
            <?php get_sidebar('sidebar-1'); ?>
        </div>
    <?php } ?>
</div>
<?php
get_footer();
