<?php

function STARTERKIT_process_page(&$variables) {
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__'. $variables['node']->type;
  }
}

/**
 * Implements template_preprocess_entity().
 */
function STARTERKIT_preprocess_entity(&$vars, $hook) {
  $function = 'STARTERKIT_preprocess_' . $vars['entity_type'];
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}