<?php /**
* Template Name: Pages Générique
*
* @package Angelus-Plongee
* @subpackage _$
* @since underscores.me 2019
*/
?> 
<?php get_header(); ?>
<main id="content" class="site-main">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	    <div class="pages-content">
	    	<h1><?php the_title(); ?></h1>
	    	<?php the_content(); ?>
	    </div>
	    <div class="btn-facebook">
	    	<div class="fb-like" data-href="https://www.angelus-plongee.com/" data-width="75" data-colorscheme="dark" data-layout="button" data-action="recommend" data-size="large" data-share="true"></div>	    	
	    </div>
		<?php endwhile; endif; ?>			
	<?php if ( is_active_sidebar( 'secondary' ) ) { ?>
	    <ul id="sidebar">
			<?php get_sidebar('secondary'); ?>
	    </ul>
	<?php } ?>
</main>
<?php
get_footer();