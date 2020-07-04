<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Angelus-Plongee
 */
get_header();
?>
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
    		<div class="btn-container d-flex">
    			<a class="btn-contact" href="formalites" role="button">Formalités</a>
    			<a class="btn-contact" href="contact#reservation" role="button">Réserver</a>
    		</div>
    	</div><!-- #primary -->
    </main><!-- #main -->

	<?php if ( is_active_sidebar('sidebar-1') ) { ?>
	    <div class="side_bar">
	        <?php get_sidebar('sidebar-1'); ?>
	    </div>
	<?php } ?>

</div>
<div class="entry-content">
    <a href="https://www.tripadvisor.fr/Attraction_Review-g1065631-d6954451-Reviews-Angelus_Plongee-Le_Palais_Belle_Ile_en_Mer_Morbihan_Brittany.html" rel="noreferrer noopener" title="Témoignages Tripadvisor" target="_blank"><img src="/wp-content/themes/angelus-plongee-child/assets/img/Tripadvisor_logo.svg" width="250" height="53" alt="Commentaires Tripadvisor"></a>
	<div class="comments">
		<a href="https://www.tripadvisor.fr/Attraction_Review-g1065631-d6954451-Reviews-Angelus_Plongee-Le_Palais_Belle_Ile_en_Mer_Morbihan_Brittany.html" rel="noreferrer noopener" title="Commentaires Tripadvisor" target="_blank">Laisser un commentaire</a>
		<?php do_action( 'wprev_tripadvisor_plugin_action', 1 ); ?>
	</div>
</div>
<?php get_template_part( 'template-parts/backtotop' ); ?>
<?php
get_footer();
