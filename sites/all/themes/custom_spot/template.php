<?php

// Выводим форму в шаблон
function custom_spot_preprocess_node(&$variables) {
  $user = user_load($variables['uid']);
  if (in_array('company', $user->roles)) {
    $variables['used_by_form'] = drupal_get_form('used_by_form');
  }
}

// Скрываем заголовок на странице с услугой
function custom_spot_preprocess_page(&$variables) {
  if (!empty($variables['node']) && $variables['node']->type == 'services') {
    $variables['title'] = '';
  }
}
