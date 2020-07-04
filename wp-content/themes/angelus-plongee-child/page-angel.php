<?php /**
* Template Name: Pages Acivités
*
* @package Angelus-Plongee
* @subpackage _$
* @since underscores.me 2019
*/
?> 
<?php  
	global $post;
	$post_slug = $post->post_name;
?>
<div class="modal fade" id="<?php echo $post_slug ?>" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Angelus Plongée</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-home" class="modal-body">
        <h1 class="modal_title"><?php the_title(); ?></h1>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<?php the_content();?>
        <?php endwhile; endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>