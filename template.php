<?php

/**
 * @file
 * template.php
 */
/**
 * Variables preprocess function for the "page" theming hook.
 */
function eviews_preprocess_page(&$vars) {

$highchartPath = libraries_get_path('highcharts');
drupal_add_js($highchartPath . '/js/highcharts.js');

  global $language;
  //get the current language
  $current_lang = $language->language;

$path = drupal_get_path('theme', 'eviews') . '/compass/javascripts/eviews.js';
  if (file_exists($path)) {
    drupal_add_js(drupal_get_path('theme', 'eviews') . '/compass/javascripts/eviews.js');
    $vars['scripts'] = drupal_get_js(); // necessary in D7?
  } 
  // Add information about the number of sidebars.
  if (!empty($vars['page']['sidebar_first']) && !empty($vars['page']['sidebar_second'])) {
    $vars['content_column_class'] = ' class="col-sm-4"';
  }
  elseif (!empty($vars['page']['sidebar_first']) || !empty($vars['page']['sidebar_second'])) {
    $vars['content_column_class'] = ' class="col-sm-8"';
  }
  else {
    $vars['content_column_class'] = ' class="col-sm-12"';
  }

  $mb_menu = array();
  $mb_menu['es'] = menu_tree_all_data('menu-menu-principal-espa-ol');
  $mb_menu['en'] = menu_tree_all_data('menu-main-menu-english');   

  $vars['mb_menu'] = menu_tree_output($mb_menu[$current_lang]);
}

function eviews_preprocess_block(&$vars) {
	//print dpr($vars['block']);
	/* Set shortcut variables */
  $block_id = $vars['block']->module . '-' . $vars['block']->delta;
  $classes = &$vars['attributes_array']['class'];

  /* Add classes based on the block delta */
  switch ($block_id) {
    /* Add .badge class to block #14 */
    case 'superfish-1':
      $classes[] = 'hidden-xs';
      break;
  }
  //print dpr($vars['attributes_array']);
}

function eviews_preprocess_node(&$variables) {
 
  if (isset($variables['field_category'][0]['taxonomy_term'])) {
    $variables['categoria'] = $variables['field_category'][0]['taxonomy_term']->tid;
  }
 
  if($variables['view_mode'] == 'teaser') {
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->type . '__teaser';   
    $variables['theme_hook_suggestions'][] = 'node__' . $variables['node']->nid . '__teaser';
  }
}

/**
 * Copy of theme_file_file_link() for linking to the file download URL.
 *
 * @see theme_file_file_link()
 */
function eviews_file_entity_download_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $uri = file_entity_download_uri($file);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $uri['options']['attributes']['type'] = $file->filemime . '; length=' . $file->filesize;

  // Provide the default link text.
  if (!isset($variables['text'])) {
    $variables['text'] = t('Download [file:name]');
  }

  // Perform unsanitized token replacement if $uri['options']['html'] is empty
  // since then l() will escape the link text.
  $variables['text'] = token_replace($variables['text'], array('file' => $file), array('clear' => TRUE, 'sanitize' => !empty($uri['options']['html'])));

//  $output = '<span class="file">' . $icon . ' ' . l($variables['text'], $uri['path'], $uri['options']);
//  $output .= ' ' . '<span class="file-size">(' . format_size($file->filesize) . ')</span>';
//  $output .= '</span>';
  $output = '<span class="file">' . l($variables['text'], $uri['path'], $uri['options']);
//  $output .= ' ' . '<span class="file-size">(' . format_size($file->filesize) . ')</span>';
  $output .= '</span>';


  return $output;
}
