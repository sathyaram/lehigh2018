<?php

// Functions for theme-settings.php were extracted to an include
require_once dirname(__FILE__) . '/includes/functions.php';

// Functions for wms_content_sections
require_once dirname(__FILE__) . '/includes/wms_content_sections.inc';

function lehigh2018_css_alter(&$css) {
  unset($css[drupal_get_path('module','system').'/system.menus.css']);
}

/**
 * Implements template_preprocess_html().
 */
function lehigh2018_preprocess_html(&$variables) {
  if (empty($variables['page']['header'])) {
    $variables['classes_array'][] = 'no-banner';
  }
}

/**
 * Implements template_preprocess_page().
 */
function lehigh2018_preprocess_page(&$vars) {
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__'. $variables['node']->type;
  }
  
  $vars['lehigh2018_path'] = drupal_get_path('theme', 'lehigh2018');

  $search_form = drupal_get_form('search_block_form');
  $vars['search'] = drupal_render($search_form);

  lehigh2018_redefine_navigation_links($vars);
}

function lehigh2018_redefine_navigation_links(&$variables) {
  // Primary Menu (Two Levels)
  $primary_menu = variable_get('menu_main_links_source', 'main-menu');
  $primary_menu_tree = menu_tree_all_data($primary_menu, 2);
  $variables['primary_menu_tree'] = menu_tree_output($primary_menu_tree);


  // Hide section menu from certain paths
  if (lehigh2018_section_menu_valid_path(current_path())) {
    $variables['section_menu_tree'] = lehigh2018_special_menu_tree($primary_menu);
  }

  // Quick Menu
  $variables['secondary_menu_links'] = '';
  if (isset($variables['secondary_menu'])) {
    $variables['secondary_menu_links'] = theme('links__system_secondary_menu', array(
      'links' => $variables['secondary_menu'],
      'attributes' => array(
        'id'    => 'secondary-menu',
        'class' => array('secondary', 'link-list'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
}

/**
 * Implements theme_breadrumb().
 *
 * Print breadcrumbs as a list, with separators.
 */
function lehigh2018_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $breadcrumbs = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $breadcrumbs .= '<ol class="breadcrumbs">';

    foreach ($breadcrumb as $key => $value) {
      $breadcrumbs .= '<li>' . $value . '</li> » ';
    }

    $title = strip_tags(drupal_get_title());
    $breadcrumbs .= '<li class="current">' . $title. '</li>';
    $breadcrumbs .= '</ol>';

    return $breadcrumbs;
  }
}

function lehigh2018_section_menu_valid_path($path) {
  $remove_paths_default = lehigh2018_section_menu_remove_paths();
  return (!drupal_match_path($path, $remove_paths_default) &&
    !drupal_match_path(drupal_get_path_alias($path), $remove_paths_default));
}


function lehigh2018_special_menu_tree($menu_name) {
  if (!module_exists('menu_block')) {
    drupal_set_message('Menu block is a required module for this theme.');
    return;
  }
  $menu_output = &drupal_static(__FUNCTION__, array());
  if (!isset($menu_output[$menu_name])) {

    $link_pref = menu_link_get_preferred(NULL, $menu_name);

    $section_menu_conf = array(
      'depth' => 0,
      'parent_mlid' => 0,
      'expanded' => FALSE,
      'menu_name' => $link_pref['menu_name'],
      'level' => 1,
      'follow' => FALSE,
      'sort' => FALSE,
    );

    $section_tree = menu_tree_block_data($section_menu_conf);

    // Section Menu (contextual depth)
    $menu_output[$menu_name] = menu_tree_output($section_tree);
  }
  return $menu_output[$menu_name];
}

function lehigh2018_links__system_secondary_menu($vars) {
  // Get all the main menu links
  //$menu_links = menu_tree_output(menu_tree_all_data('main-menu'));
  $menu_links = $vars['links'];

  // Initialize some variables to prevent errors
  $output = '';
  $sub_menu = '';

  foreach ($menu_links as $key => $link) {
    $link['attributes']['class'][] = 'has-flyout';

    // Render top level and make sure we have an actual link
    if (!empty($link['href'])) {
      $drupal_attributes = isset($link['attributes']) ? drupal_attributes($link['attributes']) : '';
      $output .= '<li' . $drupal_attributes  . '>' . l($link['title'], $link['href']);

      $output .=  '</li>';
    }
  }
  return '<ul class="nav-bar">' . $output . '</ul>';
}

function lehigh2018_menu_link(array $variables) {
  $element = $variables['element'];
  $expand_icon = '';
  $sub_menu = '';

  if ($element['#below']) {
    $expand_icon = sprintf('<button class="menu-expand" aria-label="Expand menu for %s"></button>', $element['#title']);
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $expand_icon . $output . $sub_menu . "</li>\n";
}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function lehigh2018_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
  $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
  $form['search_block_form']['#size'] = 40;  // define size of the textfield
  // Alternative (HTML5) placeholder attribute instead of using the javascript
  $form['search_block_form']['#attributes']['placeholder'] = "Search";
}
