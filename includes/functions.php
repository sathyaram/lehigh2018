<?php

function _lehigh2018_section_menu_default_remove_paths() {
  $remove_paths = array(
    'user',
    'user/*',
    'users/*',
    '<front>',
  );
  $remove_paths_imp = implode(PHP_EOL, $remove_paths);
  return $remove_paths_imp;
}

function lehigh2018_section_menu_remove_paths() {
  $remove_paths_default = _lehigh2018_section_menu_default_remove_paths();
  $theme_remove_path_val = theme_get_setting('lehigh2018_remove_section_menu_paths', 'lehigh2018');
  $default_value = !is_null($theme_remove_path_val) ? $theme_remove_path_val : $remove_paths_default;
  return $default_value;
}
