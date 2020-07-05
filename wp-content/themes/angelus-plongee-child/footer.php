<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Angelus-Plongee
 */

?>

<!-- #content -->
<?php if( is_page_template('page.php') || is_archive() ) {
	$post_id = 500;// Partners page ID(500:local, 519:inline)
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
	}
?>

<div class="container-fluid socket">
	<div class="row">
		<div class="col-6 d-flex justify-content-center socket-col"><a href="/mentions-legales/">Mentions légales</a></div>
		<div class="col-6 d-flex justify-content-center socket-col"><a href="/politique-de-confidentialite/">Politique de confidentialité</a></div>
	</div>
</div>
	<footer id="footer" class="footer">
		<div id="copyright">
		<span>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'underscores' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> | </span>
		<span><a href="/credits/">Crédits</a></span>
		</div>
	</footer>
<div class="modal fade" id="modal-angel" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Angelus Plongée</h5>
        <button type="button" class="close closed" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-home" class="modal-body">
        <!-- the_content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closed" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
