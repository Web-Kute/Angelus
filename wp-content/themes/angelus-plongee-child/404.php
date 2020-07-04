<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Angelus-Plongee
 */

get_header();
?>

<main id="content" class="site-main">
	<div id="primary" class="content-area">

			<section id="error404" class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! Perdu ?', 'angelus-plongee' ); ?></h1>
					<h2 class="text-center">Erreur 404</h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<h3 class="text-center"><?php esc_html_e( 'Humm, cette page n\'existe pas ou plus.', 'angelus-plongee' ); ?></h3>
					<div class="wp-block-buttons aligncenter cta_home">
						<div class="wp-block-button is-style-fill text-center">
							<a href="<?php echo home_url( '/' ); ?>" class="wp-block-button__link">Kenavo</a>
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

	</div><!-- #primary -->
</main><!-- #main -->

<?php
get_footer();
