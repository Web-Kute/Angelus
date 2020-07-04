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
<div class="wrapper">
    <!-- Page Content -->
    <div id="content">
        <main id="content" class="">
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
	    		<div class="entry-content">
	    			<h2>Témoignages "Tripadvisor"</h2>
	    			<div class="comments">
	    				<a href="https://www.tripadvisor.fr/Attraction_Review-g1065631-d6954451-Reviews-Angelus_Plongee-Le_Palais_Belle_Ile_en_Mer_Morbihan_Brittany.html" target="_blank">Laisser un commentaire</a>
	    				<?php do_action( 'wprev_tripadvisor_plugin_action', 1 ); ?>
	    			</div>
	    		</div>
        </main><!-- #main -->
    </div>
	<div class="side_bar">
	    <!-- Sidebar -->
	    <nav id="sidebar">
	        <?php
	        	get_sidebar();
	        ?>
	    </nav>
	</div>
</div>
<?php
get_footer();




<nav id="menu-activity">
	<div id="navigation-pages-top">           
	    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</div>
</nav>
<div id="content" class="container-fluid site-main">
	<div class="row">
		<div class="col-lg-9 col-">
			<main id="content" class="">
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
		</div>
		<div class="col-lg-3 col- side_bar">
			<?php
				get_sidebar();
			?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col">
			<div class="entry-content">
				<h2>Témoignages "Tripadvisor"</h2>
				<div class="comments">
					<a href="https://www.tripadvisor.fr/Attraction_Review-g1065631-d6954451-Reviews-Angelus_Plongee-Le_Palais_Belle_Ile_en_Mer_Morbihan_Brittany.html" target="_blank">Laisser un commentaire</a>
					<?php do_action( 'wprev_tripadvisor_plugin_action', 1 ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();