<?php

// Load theme functions we need in theme-settings.php
require_once dirname(__FILE__) . '/includes/functions.php';

/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function lehigh2018_form_system_theme_settings_alter(&$form, &$form_state)  {
  $form['custom'] = array(
    '#type'   => 'fieldset',
    '#title'  => t('Custom settings'),
  );

  $default_value = lehigh2018_section_menu_remove_paths();
  $form['custom']['lehigh2018_remove_section_menu_paths'] = array(
    '#type' => 'textarea',
    '#title' => t('Paths to hide the section menu'),
    '#description' => t('One path/alias per line. Supports wildcards. Use &lt;front&gt; for the front page.'),
    '#default_value' => $default_value,
  );
}
