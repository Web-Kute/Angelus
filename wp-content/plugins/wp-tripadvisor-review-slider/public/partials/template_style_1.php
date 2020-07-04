<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WP_TripAdvisor_Review
 * @subpackage WP_TripAdvisor_Review/public/partials
 */
 //html code for the template style
$plugin_dir = WP_PLUGIN_DIR;
$imgs_url = esc_url( plugins_url( 'imgs/', __FILE__ ) );

//loop if more than one row
for ($x = 0; $x < count($rowarray); $x++) {
	if(	$currentform[0]->template_type=="widget"){
		?>
		<div class="wptripadvisor_t1_outer_div_widget w3_wprs-row-padding-small">
		<?php
		} else {
		?>
		<div class="wptripadvisor_t1_outer_div w3_wprs-row-padding">
		<?php
	}
	//loop 
	foreach ( $rowarray[$x] as $review ) 
	{
		if($review->type=="Facebook"){
			$userpic = 'https://graph.facebook.com/'.$review->reviewer_id.'/picture?width=60&height=60 ';
		} else {
			$userpic = $review->userpic;
		}
		//echo $userpic;
		
		if($review->userpic=='' || !$review->userpic){
			$userpichtml ='';
		} else {
			$userpichtml = '<img src="'.$userpic.'" alt="avatar thumb" class="wptripadvisor_t1_IMG_4" />';
		}
		
		//star number 
		if($review->type=="TripAdvisor"){
			//find business url
			$options = get_option('wptripadvisor_tripadvisor_settings');
			$burl = $options['tripadvisor_business_url'];
			if($burl==""){
				$burl="https://www.tripadvisor.com";
			}
			$starfile = "tripadvisor_stars_".$review->rating.".png";
			$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow"><img src="'.$imgs_url.'tripadvisor_outline.png" alt="tripadvisor logo" class="wptripadvisor_t1_tripadvisor_logo"></a>';
		} else if($review->type=="Facebook" && $currentform[0]->facebook_icon=="yes"){
			$starfile = "stars_".$review->rating."_yellow.png";
			$burl = "https://www.facebook.com/pg/".$review->pageid."/reviews/";
			$logo = '<a href="'.$burl.'" target="_blank" rel="nofollow"><img src="'.$imgs_url.'fb_logo.png" alt="tripadvisor logo" class="wptripadvisor_t1_tripadvisor_logo"></a>';
		}  else  {
			$starfile = "stars_".$review->rating."_yellow.png";
			$logo ="";
		}
		
		$reviewtext = "";
		if($review->review_text !=""){
			$reviewtext = nl2br($review->review_text);
			
			//add tripadvisor fix for ..More replace with link to pageid
			$morelink = '<a href="'.$burl.'" class="ta_morelink" target="_blank" rel="nofollow">..More</a>';
			$reviewtext = str_replace("..More",$morelink,$reviewtext);
			
			
			
		}
		//if read more is turned on then divide then add read more span links
		$currentform[0]->read_more = 'yes';
		$currentform[0]->read_more_num = 30; //number of words before
		if(	$currentform[0]->read_more=="yes"){
			$readmorenum = intval($currentform[0]->read_more_num);
			$countwords = str_word_count($reviewtext);
			
			if($countwords>$readmorenum){
				//split in to array
				$pieces = explode(" ", $reviewtext);
				//slice the array in to two
				$part1 = array_slice($pieces, 0, $readmorenum);
				$part2 = array_slice($pieces, $readmorenum);
				
				$part1 = implode(" ",$part1);
				$part2 = implode(" ",$part2);
				
				$reviewtext = $part1."<a class='wprs_rd_more'>... read more</a><span class='wprs_rd_more_text' style='display:none;'> ".$part2."</span>";
			}
		}

		//per a row
		if($currentform[0]->display_num>0){
			$perrow = 12/$currentform[0]->display_num;
		} else {
			$perrow = 4;
		}
		
		//date
		if($review->created_time_stamp=='' || $review->created_time_stamp<1){
			$temptime = $review->created_time;
			$review->created_time_stamp = strtotime($temptime );
		} 
		$tempdate = date("n/d/Y",$review->created_time_stamp);
	?>
		<div class="wptripadvisor_t1_DIV_1<?php if(	$currentform[0]->template_type=="widget"){echo ' marginb10';}?> w3_wprs-col l<?php echo $perrow; ?>">
			<div class="wptripadvisor_t1_DIV_2 wprev_preview_bg1_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?> wprev_preview_bradius_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?>">
				<p class="wptripadvisor_t1_P_3 wprev_preview_tcolor1_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?>">
					<span class="wptripadvisor_star_imgs_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?>"><img src="<?php echo $imgs_url."".$starfile; ?>" alt="" class="wptripadvisor_t1_star_img_file">&nbsp;&nbsp;</span><?php echo stripslashes($reviewtext); ?>
				</p>
				<?php echo $logo; ?>
			</div><span class="wptripadvisor_t1_A_8"><?php echo $userpichtml; ?></span> <span class="wptripadvisor_t1_SPAN_5 wprev_preview_tcolor2_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?>"><?php echo stripslashes($review->reviewer_name); ?><br/><span class="wprev_showdate_T<?php echo $currentform[0]->style; ?><?php if($iswidget){echo "_widget";} ?>"><?php echo $tempdate; ?></span> </span>
		</div>
	<?php
	}
	//end loop
	?>
	</div>
<?php
}
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
