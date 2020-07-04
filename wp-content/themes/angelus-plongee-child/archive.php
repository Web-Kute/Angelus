<?php get_header(); ?>
<main id="content" class="site-main">
<div class="activity-page">
	<h1>Activités & Tarifs</h1>
	<div class="site__blog">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>	  
			<article class="post">
				<h2><?php the_title(); ?></h2>	      
	        	<?php the_post_thumbnail(); ?>	            
	      		<?php the_excerpt(); ?>             
	      		<p>
	                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
	            </p>
			</article>
		<?php endwhile; endif; ?>
	</div>
</div>
</main>
<?php get_template_part( 'template-parts/backtotop' ); ?>
<?php get_footer(); ?>