<?php 

/**
 * Page alter.
 */
function bizsearch_page_alter($page) {
	$mobileoptimized = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'MobileOptimized',
		'content' =>  'width'
		)
	);
	$handheldfriendly = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'HandheldFriendly',
		'content' =>  'true'
		)
	);
	$viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'viewport',
		'content' =>  'width=device-width, initial-scale=1'
		)
	);
	drupal_add_html_head($mobileoptimized, 'MobileOptimized');
	drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
	drupal_add_html_head($viewport, 'viewport');
}

/**
 * Preprocess variables for html.tpl.php
 */
function bizsearch_preprocess_html(&$variables) {
  /* Color */
  $file = 'color-' . theme_get_setting('theme_color') . '-style.css';
  drupal_add_css(path_to_theme() . '/css/'. $file, array('group' => CSS_THEME, 'weight' => 115,'browsers' => array(), 'preprocess' => FALSE));
	/**
	 * Add IE8 Support
	 */
	drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => '(lt IE 9)', '!IE' => FALSE), 'preprocess' => FALSE));
	
	/**
	* Add Javascript for enable/disable Bootstrap 3 Javascript
	*/
	if (theme_get_setting('bootstrap_js_include', 'bizsearch')) {
	drupal_add_js(drupal_get_path('theme', 'bizsearch') . '/bootstrap/js/bootstrap$content.js');
	}
	//EOF:Javascript
	
	/**
	* Add Javascript for enable/disable scrollTop action
	*/
	if (theme_get_setting('scrolltop_display', 'bizsearch')) {

		drupal_add_js('jQuery(document).ready(function($) { 
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$("#toTop").fadeIn();	
			} else {
				$("#toTop").fadeOut();
			}
		});
		
		$("#toTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});	
		
		});',
		array('type' => 'inline', 'scope' => 'header'));
	}
	//EOF:Javascript
}

/**
 * Override or insert variables into the html template.
 */
function bizsearch_process_html(&$vars) {
	// Hook into color.module
	if (module_exists('color')) {
	_color_html_alter($vars);
	}
}

/**
 * Preprocess variables for page template.
 */
function bizsearch_preprocess_page(&$vars) {

	/**
	 * insert variables into page template.
	 */
	if($vars['page']['sidebar_first'] && $vars['page']['sidebar_second']) { 
		$vars['sidebar_first_grid_class'] = 'col-md-2';
		$vars['sidebar_second_grid_class'] = 'col-md-3';
		$vars['main_grid_class'] = 'col-md-7';
	} elseif ($vars['page']['sidebar_first'] && !($vars['page']['sidebar_second'])) {
		$vars['sidebar_first_grid_class'] = 'col-md-3';
		$vars['main_grid_class'] = 'col-md-9';
	} elseif (!($vars['page']['sidebar_first']) && $vars['page']['sidebar_second']) {
		$vars['sidebar_second_grid_class'] = 'col-md-4';
		$vars['main_grid_class'] = 'col-md-8';			
	} else {
		$vars['main_grid_class'] = 'col-md-12';			
	}

	if($vars['page']['main_navigation'] && $vars['page']['sub_navigation']) { 
		$vars['main_navigation_grid_class'] = 'col-md-3';
		$vars['sub_navigation_grid_class'] = 'col-md-7';
	} else {
		$vars['main_navigation_grid_class'] = 'col-md-10';
		$vars['sub_navigation_grid_class'] = 'col-md-10';		
	}

	
}

/**
 * Override or insert variables into the page template.
 */
function bizsearch_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
}

/**
 * Preprocess variables for block.tpl.php
 */
function bizsearch_preprocess_block(&$variables) {
	$variables['classes_array'][]='clearfix';
}

/**
 * Add placeholder text to the search form

function bizsearch_form_alter(&$form, &$form_state, $form_id){
  if($form_id == "views_exposed_form"){
    if (isset($form["search_api_views_fulltext"])) {
            $form["search_api_views_fulltext"]['#attributes'] = array('placeholder' => array(t('What are you looking for?')));
    }
  }
}
 */
