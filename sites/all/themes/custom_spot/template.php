<?php

// Выводим форму в шаблон
function custom_spot_preprocess_node(&$variables) {
  $user = user_load($variables['uid']);
  if (in_array('company', $user->roles)) {
    $variables['used_by_form'] = drupal_get_form('used_by_form');
  }
}
