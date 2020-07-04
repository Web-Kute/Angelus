<?php /**
* Template Name: Pages Crédits
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
	<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>