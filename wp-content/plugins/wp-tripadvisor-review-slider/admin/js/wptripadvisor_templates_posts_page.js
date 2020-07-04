(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 * $( document ).ready(function() same as
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	 
	 //document ready
	$(function(){
		var prestyle = "";
		//color picker
		var myOptions = {
			// a callback to fire whenever the color changes to a valid color
			change: function(event, ui){
				var color = ui.color.toString();
				var element = event.target;
				var curid = $(element).attr('id');
				$( element ).val(color)
				//manuall change after css. hack since jquery can't access before and after elements    border-top: 30px solid #943939;
				if(curid=='wptripadvisor_template_misc_bgcolor1'){
					prestyle = "<style>.wptripadvisor_t1_DIV_2::after{ border-top: 30px solid "+color+"; }</style>";
				}
				changepreviewhtml();
			},
			// a callback to fire when the input is emptied or an invalid color
			clear: function() {}
		};
		 
		$('.my-color-field').wpColorPicker(myOptions);

		//for style preview changes.-------------
		var starhtml = '<span class="wptripadvisor_star_imgs"><img src="'+adminjs_script_vars.pluginsUrl + '/public/partials/imgs/tripadvisor_stars_5.png" alt="" style="width: 100px;" >&nbsp;&nbsp;</span>';
		var sampltext = 'This is a sample review. Hands down the best experience we have had in the southeast! Awesome accommodations, great staff. We will gladly drive four hours for this gem!';
		var datehtml = '<span id="wprev_showdate">1/12/2017</span>';
		
		var imagehref = adminjs_script_vars.pluginsUrl + '/admin/partials/sample_avatar.jpg';
		var avatarimg = imagehref;
		
		var style1html ='<div class="wptripadvisor_t1_outer_div w3_wprs-row-padding">	\
							<div class="wptripadvisor_t1_DIV_1 w3_wprs-col">	\
								<div class="wptripadvisor_t1_DIV_2 wprev_preview_bg1 wprev_preview_bradius">	\
									<p class="wptripadvisor_t1_P_3 wprev_preview_tcolor1" style="margin-bottom: 10px;">	\
										'+starhtml+''+sampltext+'		</p>	\
									<a href="" target="_blank" rel="nofollow">	\
									<img src="'+adminjs_script_vars.pluginsUrl + '/public/partials/imgs/tripadvisor_outline.png" alt="" class="wptripadvisor_t1_tripadvisor_logo"></a>	\
								</div><span class="wptripadvisor_t1_A_8"><img src="'+avatarimg+'" alt="thumb" class="wptripadvisor_t1_IMG_4"></span> <span class="wptripadvisor_t1_SPAN_5 wprev_preview_tcolor2">Josh W.<br>'+datehtml+' </span>	\
							</div>	\
							</div>';
		
		changepreviewhtml();
		
		//reset colors to default
		$( "#wptripadvisor_pre_resetbtn" ).click(function() {
			resetcolors();
		});
		function resetcolors(){
				var templatenum = $( "#wptripadvisor_template_style" ).val();
				//reset colors to default
				if(templatenum=='1'){
					
					$( "#wptripadvisor_template_misc_bradius" ).val('0');
					$( "#wptripadvisor_template_misc_bgcolor1" ).val('#ffffff');
					$( "#wptripadvisor_template_misc_bgcolor2" ).val('#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).val('#777777');
					$( "#wptripadvisor_template_misc_tcolor2" ).val('#555555');
					prestyle="";
					//reset color picker
					$('#wptripadvisor_template_misc_bgcolor1').iris('color', '#ffffff');
					$('#wptripadvisor_template_misc_bgcolor2').iris('color', '#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).iris('color','#777777');
					$( "#wptripadvisor_template_misc_tcolor2" ).iris('color','#555555');
					
				} else if(templatenum=='2'){
					$( "#wptripadvisor_template_misc_bradius" ).val('0');
					$( "#wptripadvisor_template_misc_bgcolor1" ).val('#fdfdfd');
					$( "#wptripadvisor_template_misc_bgcolor2" ).val('#eeeeee');
					$( "#wptripadvisor_template_misc_tcolor1" ).val('#555555');
					$( "#wptripadvisor_template_misc_tcolor2" ).val('#555555');
					//reset color picker
					$('#wptripadvisor_template_misc_bgcolor1').iris('color', '#fdfdfd');
					$('#wptripadvisor_template_misc_bgcolor2').iris('color', '#eeeeee');
					$( "#wptripadvisor_template_misc_tcolor1" ).iris('color','#555555');
					$( "#wptripadvisor_template_misc_tcolor2" ).iris('color','#555555');
				} else if(templatenum=='3'){
					$( "#wptripadvisor_template_misc_bradius" ).val('8');
					$( "#wptripadvisor_template_misc_bgcolor1" ).val('#f8fafa');
					$( "#wptripadvisor_template_misc_bgcolor2" ).val('#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).val('#454545');
					$( "#wptripadvisor_template_misc_tcolor2" ).val('#b2b2b2');
					$( "#wptripadvisor_template_misc_tcolor3" ).val('#ffffff');
					//reset color picker
					$('#wptripadvisor_template_misc_bgcolor1').iris('color', '#f8fafa');
					$('#wptripadvisor_template_misc_bgcolor2').iris('color', '#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).iris('color','#454545');
					$( "#wptripadvisor_template_misc_tcolor2" ).iris('color','#b2b2b2');
					$('#wptripadvisor_template_misc_tcolor3').iris('color', '#ffffff');
				} else if(templatenum=='4'){
					$( "#wptripadvisor_template_misc_bradius" ).val('5');
					$( "#wptripadvisor_template_misc_bgcolor1" ).val('rgba(140, 140, 140, 0.15)');
					$( "#wptripadvisor_template_misc_bgcolor2" ).val('#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).val('rgb(128, 128, 128)');
					$( "#wptripadvisor_template_misc_tcolor2" ).val('rgb(121, 121, 121)');
					$( "#wptripadvisor_template_misc_tcolor3" ).val('rgb(76, 76, 76)');
					//reset color picker
					$('#wptripadvisor_template_misc_bgcolor1').iris('color', 'rgba(140, 140, 140, 0.15)');
					$('#wptripadvisor_template_misc_bgcolor2').iris('color', '#ffffff');
					$( "#wptripadvisor_template_misc_tcolor1" ).iris('color','rgb(128, 128, 128)');
					$( "#wptripadvisor_template_misc_tcolor2" ).iris('color','rgb(121, 121, 121)');
					$('#wptripadvisor_template_misc_tcolor3').iris('color', 'rgb(76, 76, 76)');
				}
		}

		
		//on template num change
		$( "#wptripadvisor_template_style" ).change(function() {
				//reset colors if not editing, otherwise leave alone
				if($( "#edittid" ).val()==""){
				resetcolors();
				}
				changepreviewhtml();
		});
		
		$( "#wptripadvisor_template_misc_showstars" ).change(function() {
				changepreviewhtml();
		});
		$( "#wptripadvisor_template_misc_showdate" ).change(function() {
				changepreviewhtml();
		});
		$( "#wptripadvisor_template_misc_bradius" ).change(function() {
				changepreviewhtml();
		});
		$( "#wptripadvisor_template_misc_bgcolor1" ).change(function() {
				changepreviewhtml();
		});
		$( "#wptripadvisor_template_misc_tcolor1" ).change(function() {
				changepreviewhtml();
		});
		//custom css change preview
		var lastValue = '';
		$("#wptripadvisor_template_css").on('change keyup paste mouseup', function() {
			if ($(this).val() != lastValue) {
				lastValue = $(this).val();
				changepreviewhtml();
			}
		});
		
		function changepreviewhtml(){
			var templatenum = $( "#wptripadvisor_template_style" ).val();
			var bradius = $( "#wptripadvisor_template_misc_bradius" ).val();
			var bg1 = $( "#wptripadvisor_template_misc_bgcolor1" ).val();
			var bg2 = $( "#wptripadvisor_template_misc_bgcolor2" ).val();
			var tcolor1 = $( "#wptripadvisor_template_misc_tcolor1" ).val();
			var tcolor2 = $( "#wptripadvisor_template_misc_tcolor2" ).val();
			var tcolor3 = $( "#wptripadvisor_template_misc_tcolor3" ).val();
			
			if($( "#wptripadvisor_template_css" ).val()!=""){
				var customcss = '<style>'+$( "#wptripadvisor_template_css" ).val()+'</style>';
				prestyle =  prestyle + customcss;
			}
			
				var temphtml;
				if(templatenum=='1'){
					$( "#wptripadvisor_template_preview" ).html(prestyle+style1html);
					//hide background 2 select
					$( ".wprevpre_bgcolor2" ).hide();
					$( ".wprevpre_tcolor3" ).hide();
				} else if(templatenum=='2'){
					$( "#wptripadvisor_template_preview" ).html(prestyle+style2html);
					$( ".wprevpre_bgcolor2" ).show();
					$( ".wprevpre_tcolor3" ).hide();
					$( '.wprev_preview_bg1' ).css( "border-bottom", '3px solid '+bg2 );
				} else if(templatenum=='3'){
					$( "#wptripadvisor_template_preview" ).html(prestyle+style3html);
					$( ".wprevpre_bgcolor2" ).show();
					$( ".wprevpre_tcolor3" ).show();
					$( '.wprev_preview_tcolor3' ).css('textShadow', tcolor3+' 1px 1px 0px');
				} else if(templatenum=='4'){
					$( "#wptripadvisor_template_preview" ).html(prestyle+style4html);
					$( ".wprevpre_bgcolor2" ).hide();
					$( ".wprevpre_tcolor3" ).show();
					$( '.wprev_preview_tcolor3' ).css('color', tcolor3);
				}
			//now hide and show things based on values in select boxes
			if($( "#wptripadvisor_template_misc_showstars" ).val()=="no"){
				$( ".wptripadvisor_star_imgs" ).hide();
			} else {
				$( ".wptripadvisor_star_imgs" ).show();
			}
			if($( "#wptripadvisor_template_misc_showdate" ).val()=="no"){
				$( "#wprev_showdate" ).hide();
			} else {
				$( "#wprev_showdate" ).show();
			}
			//set colors and bradius by changing css via jQuery     border-radius: 10px 10px 10px 10px;
			$( '.wprev_preview_bradius' ).css( "border-radius", bradius+'px' );
			$( '.wprev_preview_bg1' ).css( "background", bg1 );
			$( '.wprev_preview_bg2' ).css( "background", bg2 );
			$( '.wprev_preview_tcolor1' ).css( "color", tcolor1 );
			$( '.wprev_preview_tcolor2' ).css( "color", tcolor2 );
			
		}
		
		
		
		//help button clicked
		$( "#wptripadvisor_helpicon_posts" ).click(function() {
		  openpopup("Tips", '<p>This page will let you create multiple Reviews Templates that you can then add to your Posts or Pages via a shortcode or template function.</p>', "");
		});
		//display shortcode button click wptripadvisor_addnewtemplate
		$( ".wptripadvisor_displayshortcode" ).click(function() {
			//get id and template type
			var tid = $( this ).parent().attr( "templateid" );
			var ttype = $( this ).parent().attr( "templatetype" );
			
		  if(ttype=="widget"){
			openpopup("Widget Instructions", '<p>To display this in your Sidebar or other Widget areas, add the WP Reviews widget under Appearance > Widgets, and then select this template in the drop down.</p>', '');
		  } else {
			openpopup("How to Display", '<p>Enter this shortcode on a post or page: </br></br>[wptripadvisor_usetemplate tid="'+tid+'"]</p><p>Or you can add the following php code to your template: </br></br><code> do_action( \'wprev_tripadvisor_plugin_action\', '+tid+' ); </code></p>', '');
		  }
		  
		});
		
		//when checking tripadvisor type, uncheck all other types, not allowed to be displayed along side them
		/*
		$('#wptripadvisor_t_rtype_tripadvisor').change(function() {
			if($(this).is(":checked")) {
				$('#wptripadvisor_t_rtype_fb').attr('checked', false); // Unchecks it
				$('#wptripadvisor_t_rtype_manual').attr('checked', false); // Unchecks it
			}
		});
		$('#wptripadvisor_t_rtype_fb').change(function() {
			if($(this).is(":checked")) {
				$('#wptripadvisor_t_rtype_tripadvisor').attr('checked', false); // Unchecks it
			}
		});
		$('#wptripadvisor_t_rtype_manual').change(function() {
			if($(this).is(":checked")) {
				$('#wptripadvisor_t_rtype_tripadvisor').attr('checked', false); // Unchecks it
			}
		});
		*/
		//hide show fb stuff only when checked.
		$('#wptripadvisor_t_rtype_fb').change(function() {
			if($('#wptripadvisor_t_rtype_fb').is(":checked")) {
				$('.fbhide').show('slow');
			} else {
				$('.fbhide').hide('slow');
			}
		});
		$('#wptripadvisor_t_rtype_tripadvisor').change(function() {
			if($('#wptripadvisor_t_rtype_fb').is(":checked")) {
				$('.fbhide').show('slow');
			} else {
				$('.fbhide').hide('slow');
			}
		});
		$('#wptripadvisor_t_rtype_manual').change(function() {
			if($('#wptripadvisor_t_rtype_fb').is(":checked")) {
				$('.fbhide').show('slow');
			} else {
				$('.fbhide').hide('slow');
			}
		});
		
		
		//launch pop-up windows code--------
		function openpopup(title, body, body2){

			//set text
			jQuery( "#popup_titletext").html(title);
			jQuery( "#popup_bobytext1").html(body);
			jQuery( "#popup_bobytext2").html(body2);
			
			var popup = jQuery('#popup_review_list').popup({
				width: 400,
				offsetX: -100,
				offsetY: 0,
			});
			
			popup.open();
			//set height
			var bodyheight = Number(jQuery( ".popup-content").height()) + 10;
			jQuery( "#popup_review_list").height(bodyheight);

		}
		//--------------------------------
		//get the url parameter-----------
		function getParameterByName(name, url) {
			if (!url) {
			  url = window.location.href;
			}
			name = name.replace(/[\[\]]/g, "\\$&");
			var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, " "));
		}
		//---------------------------------
		
		//hide or show new template form ----------
		var checkedittemplate = getParameterByName('taction'); // "lorem"
		if(checkedittemplate=="edit"){
			jQuery("#wptripadvisor_new_template").show("slow");
			checkwidgetradio();
		} else {
			jQuery("#wptripadvisor_new_template").hide();
		}
		
		$( "#wptripadvisor_addnewtemplate" ).click(function() {
		  jQuery("#wptripadvisor_new_template").show("slow");
		});	
		$( "#wptripadvisor_addnewtemplate_cancel" ).click(function() {
		  jQuery("#wptripadvisor_new_template").hide("slow");
		  //reload page without taction and tid
		  setTimeout(function(){ 
			window.location.href = "?page=wp_tripadvisor-templates_posts"; 
		  }, 500);
		  
		});	
		
		//-------------------------------
		
		//form validation
		$("#newtemplateform").submit(function(){   
			if(jQuery( "#wptripadvisor_template_title").val()==""){
				alert("Please enter a title.");
				$( "#wptripadvisor_template_title" ).focus();
				return false;
			} else if(jQuery( "#wptripadvisor_t_display_num_total").val()<1){
				alert("Please enter a 1 or greater.");
				$( "#wptripadvisor_t_display_num_total" ).focus();
				return false;
			} else {
			return true;
			}

		});
		
		//widget radio clicked
		$('input[type=radio][name=wptripadvisor_template_type]').change(function() {
			checkwidgetradio();
		});
		
		//check widget radio----------------------
		function checkwidgetradio() {
			var widgetvalue = $("input[name=wptripadvisor_template_type]:checked").val();
			if (widgetvalue == 'widget') {
				//change how many per a row to 1
				$('#wptripadvisor_t_display_num').val("1");
				$('#wptripadvisor_t_display_num').hide();
				$('#wptripadvisor_t_display_num').prev().hide();
				//force hide arrows and do not allow horizontal scroll on slideshow
				//$('input:radio[name=wptripadvisor_sliderdirection]').val(['vertical']);
				//$('input[id=wptripadvisor_sliderdirection1-radio]').attr("disabled",true);
				$('input:radio[name=wptripadvisor_sliderarrows]').val(['no']);
				$('input[id=wptripadvisor_sliderarrows1-radio]').attr("disabled",true);
			}
			else if (widgetvalue == 'post') {
				//alert("post type");
				if($('#edittid').val()==""){
				$('#wptripadvisor_t_display_num').val("3");
				}
				$('#wptripadvisor_t_display_num').show();
				$('#wptripadvisor_t_display_num').prev().show();
				$('input[id=wptripadvisor_sliderdirection1-radio]').attr("disabled",false);
				$('input[id=wptripadvisor_sliderarrows1-radio]').attr("disabled",false);
			}
		}
		
		//wptripadvisor_btn_pickreviews open thickbox----------------
		$( "#wptripadvisor_btn_pickreviews" ).click(function() {
		  sendtoajax('','','',"");
			var url = "#TB_inline?width=600&height=600&inlineId=tb_content";
			tb_show("Select Reviews to Display", url);
			$( "#wptripadvisor_filter_table_name" ).focus();
			$( "#TB_window" ).css({ "width":"830px","margin-left": "-415px" });
			$( "#TB_ajaxContent" ).css({ "width":"800px" });
		});
		
		//for search box------------------------------
		$('#wptripadvisor_filter_table_name').on('input', function() {
			// do something
			var myValue = $("#wptripadvisor_filter_table_name").val();
			var myLength = myValue.length;
			if(myLength>1 || myLength==0){
			//search here
				sendtoajax('','','',"");
			}
		});
		
		//for search select box------------------------------
		$( "#wptripadvisor_filter_table_min_rating" ).change(function() {
				sendtoajax('','','',"");
		});
		
		//for pagination bar-----------------------------------
		$("#wptripadvisor_list_pagination_bar").on("click", "span", function (event) {
			var pageclicked = $(this).text();
			sendtoajax(pageclicked,'','',"");
		});
		
		//for sorting table--------------wptripadvisor_sortname, wptripadvisor_sorttext, wptripadvisor_sortdate
		$( ".wptripadvisor_tablesort" ).click(function() {
			//remove all green classes
			$(this).parent().find('i').removeClass("text_green");

			//add back on this one
			$(this).children( "i" ).addClass("text_green");
			
			var sortdir = $(this).attr("sortdir");
			var sorttype = $(this).attr("sorttype");
			if(sortdir=="DESC"){
				$(this).attr("sortdir","ASC");
			} else {
				$(this).attr("sortdir","DESC");
			}
			if(sorttype=="name"){
				sorttype="reviewer_name";
			} else if(sorttype=="rating") {
				sorttype="rating";
			} else if(sorttype=="stext") {
				sorttype="review_length";
			} else if(sorttype=="stime") {
				sorttype="created_time_stamp";
			}
		  sendtoajax('1',sorttype,sortdir,"");
		});
		
		//=====for only displaying the ones selected so far========
		$('#wptripadvisor_selectedrevsdiv').click(function() {
			//find the currently selected
			var currentlyselected = $('#wptripadvisor_t_showreviewsbyid').val();
			if(currentlyselected==""){
				var temparray =  Array();
			} else {
				var temparray = currentlyselected.split("-");
			}
			//convert to object
			var temparrayobj = temparray.reduce(function(acc, cur, i) {acc[i] = cur;return acc;}, {});
			sendtoajax('1','','',temparrayobj);
			var url = "#TB_inline?width=600&height=600&inlineId=tb_content";
			tb_show("Currenlty Selected", url);
			$( "#wptripadvisor_filter_table_name" ).focus();
			$( "#TB_window" ).css({ "width":"830px","margin-left": "-415px" });
			$( "#TB_ajaxContent" ).css({ "width":"800px" });
		});
		
		//============for clearing all currently selected============
		$('#wptripadvisor_clearselectedrevsbtn').click(function() {
			$('#wptripadvisor_t_showreviewsbyid').val("");
			$('#wptripadvisor_selectedrevsdiv').hide();
			$('#wptripadvisor_t_showreviewsbyid').hide();
		});
		//======send to ajax to retrieve reviews==========
		function sendtoajax(pageclicked,sortbyval,sortd,selrevs){
			var filterbytext = $("#wptripadvisor_filter_table_name").val();
			var filterbyrating = $("#wptripadvisor_filter_table_min_rating").val();
			//clear list and pagination bar
			$( "#review_list_select" ).html("");
			$( "#wptripadvisor_list_pagination_bar" ).html("");
			var senddata = {
					action: 'wptripadvisor_find_reviews',	//required
					wptripadvisor_nonce: adminjs_script_vars.wptripadvisor_nonce,
					sortby: sortbyval,
					sortdir: sortd,
					filtertext: filterbytext,
					filterrating: filterbyrating,
					pnum:pageclicked,
					curselrevs:selrevs
					};

				jQuery.post(ajaxurl, senddata, function (response){
					//console.log(response);
					var object = JSON.parse(response);
				//console.log(object);

				var htmltext;
				var userpic;
				var reviewtext;

				
					$.each(object, function(index) {
						if(object[index]){
						if(object[index].reviewer_name){
							//check to see if this one should be checked
							//get currently selected
							var currentlyselected = $('#wptripadvisor_t_showreviewsbyid').val();
							if(currentlyselected==""){
								var temparray =  Array();
							} else {
								var temparray = currentlyselected.split("-");
							}
							//see if id is in array
							var prevselected="";
							if(jQuery.inArray( object[index].id, temparray )>-1){
								prevselected = 'checked="checked"';
							}
							
							//userpic
							userpic="";
							if(object[index].type=="Facebook"){
								userpic = '<img style="-webkit-user-select: none;width: 50px;" src="https://graph.facebook.com/'+object[index].reviewer_id+'/picture?type=square">';
							} else {
								userpic = '<img style="-webkit-user-select: none;width: 50px;" src="'+object[index].userpic+'">';
							}
							//stripslashes
							reviewtext = String(object[index].review_text);
							reviewtext = reviewtext.replace(/\\'/g,'\'').replace(/\"/g,'"').replace(/\\\\/g,'\\').replace(/\\0/g,'\0');
						
							htmltext = htmltext + '<tr id="wprev_id_'+object[index].id+'">	\
								<th scope="col" class="manage-column"><input type="checkbox" name="wptripadvisor_selected_revs[]" value="'+object[index].id+'" '+prevselected+'></th>	\
								<th scope="col">'+userpic+'</th>	\
								<th scope="col" class="manage-column">'+object[index].reviewer_name+'</th>	\
								<th scope="col" class="manage-column"><b>'+object[index].rating+'</b></th>	\
								<th scope="col" class="manage-column">'+reviewtext+'</th>	\
								<th scope="col" class="manage-column">'+object[index].created_time+'</th>	\
							</tr>';
							reviewtext ='';
						}
						}
					});
					
					$( "#review_list_select" ).html(htmltext);
					
					//pagination bar
					var numpages = Number(object['totalpages']);
					var reviewtotalcount = Number(object['reviewtotalcount']);
					if(numpages>1){
						var pagebarhtml="";
						var blue_grey;
						var i;
						var numpages = Number(object['totalpages']);
						var curpage = Number(object['pagenum']);
						for (i = 1; i <= numpages; i++) {
							if(i==curpage){blue_grey = " blue_grey";} else {blue_grey ="";}
							pagebarhtml = pagebarhtml + '<span class="button'+blue_grey+'">'+i+'</span>';
						}
					}
						$( "#wptripadvisor_list_pagination_bar" ).html(pagebarhtml);
					//hide sort arrows and search bar if totalcount is zero
					if(reviewtotalcount==0){
						//$("#wptripadvisor_searchbar").hide();
						$(".dashicons-sort").hide();
						$("#wptripadvisor_list_pagination_bar").hide();
					} else {
						//$("#wptripadvisor_searchbar").show();
						$(".dashicons-sort").show();
						$("#wptripadvisor_list_pagination_bar").show();
					}
					if(numpages==0){
						$("#wptripadvisor_searchbar").hide();
						//$(".dashicons-sort").hide();
						//$("#wptripadvisor_list_pagination_bar").hide();
					} else {
						$("#wptripadvisor_searchbar").show();
						//$(".dashicons-sort").show();
						//$("#wptripadvisor_list_pagination_bar").show();
					}
					
				});
		}
	
		
		//========when selecting a review add it to top so we can easily select or unselect it.==========
		$("#review_list_select").on("click", "input", function (event) {
			var revid = $(this).val();
			
			//get currently selected
			var currentlyselected = $('#wptripadvisor_t_showreviewsbyid').val();
			if(currentlyselected==""){
				var temparray =  Array();
			} else {
				var temparray = currentlyselected.split("-");
			}
			
			//check to see if unchecking or checking
			if($(this).is(':checked')){
				//add revid to hidden input field
				temparray.push(revid);
			} else {
				//remove from array
				temparray = jQuery.grep(temparray, function(value) {
				  return value != revid;
				});
			}

			//html number currently selected
			if (temparray[0] != null && temparray[0]!="") {
				if(temparray.length==1){
					$('#wptripadvisor_selectedrevsdiv').html('<b>'+temparray.length + '</b> Review Selected (<span class="dashicons dashicons-search" style="font-size: 16px;vertical-align: middle;"></span>Show)');
				} else if(temparray.length>1){
					$('#wptripadvisor_selectedrevsdiv').html('<b>'+temparray.length + '</b> Reviews Selected (<span class="dashicons dashicons-search" style="font-size: 16px;vertical-align: middle;"></span>Show)');
				} else {
					$('#wptripadvisor_selectedrevsdiv').html('');
				}
			} else {
				$('#wptripadvisor_selectedrevsdiv').html('');
			}
			
			//convert array back to string and input it to field
			var stringtemparray = temparray.join('-');
			$('#wptripadvisor_t_showreviewsbyid').val(stringtemparray);
		});
		
		//------------when clicking row in review table, check or uncheck the check box-----------------------------------
		/*
		$("#review_list_select").on("click", "tr", function (event) {
			var rcheckbox = $(this).find("input[type='checkbox']");
			rcheckbox.trigger('click');
		});
		*/
		
	});

})( jQuery );