<?php
$urltrimmedtab = remove_query_arg( array('page', '_wpnonce', 'taction', 'tid', 'sortby', 'sortdir', 'opt','settings-updated') );

$urlreviewlist = esc_url( add_query_arg( 'page', 'wp_tripadvisor-reviews',$urltrimmedtab ) );
$urltemplateposts = esc_url( add_query_arg( 'page', 'wp_tripadvisor-templates_posts',$urltrimmedtab ) );
$urlgetpro = esc_url( add_query_arg( 'page', 'wp_tripadvisor-get_tripadvisor',$urltrimmedtab ) );
$urlforum = esc_url( add_query_arg( 'page', 'wp_tripadvisor-get_pro',$urltrimmedtab ) );
$urlwelcome = esc_url( add_query_arg( 'page', 'wp_tripadvisor-welcome',$urltrimmedtab ) );
?>	
	<h2 class="nav-tab-wrapper">
	<a href="<?php echo $urlwelcome; ?>" class="nav-tab <?php if($_GET['page']=='wp_tripadvisor-welcome'){echo 'nav-tab-active';} ?>"><?php _e('Welcome', 'wp-tripadvisor-review-slider'); ?></a>
	<a href="<?php echo $urlgetpro; ?>" class="nav-tab <?php if($_GET['page']=='wp_tripadvisor-get_tripadvisor'){echo 'nav-tab-active';} ?>"><?php _e('Get TripAdvisor Reviews', 'wp-tripadvisor-review-slider'); ?></a>
	<a href="<?php echo $urlreviewlist; ?>" class="nav-tab <?php if($_GET['page']=='wp_tripadvisor-reviews'){echo 'nav-tab-active';} ?>"><?php _e('Reviews List', 'wp-tripadvisor-review-slider'); ?></a>
	<a href="<?php echo $urltemplateposts; ?>" class="nav-tab <?php if($_GET['page']=='wp_tripadvisor-templates_posts'){echo 'nav-tab-active';} ?>"><?php _e('Templates', 'wp-tripadvisor-review-slider'); ?></a>
	<a href="<?php echo $urlforum; ?>" class="nav-tab <?php if($_GET['page']=='wp_tripadvisor-get_pro'){echo 'nav-tab-active';} ?>"><?php _e('Get Pro Version', 'wp_tripadvisor-get_pro'); ?></a>

	</h2>