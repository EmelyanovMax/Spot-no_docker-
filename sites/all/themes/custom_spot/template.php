<?php

// Выводим форму в шаблон
function custom_spot_preprocess_node(&$variables) {
  $url = request_uri();
  if (isset($variables['content']['field_cost'])) {
    $variables['content']['field_cost'][0]['#markup'] .= ' руб.';
  }
  $variables['comment_button'] = '<div class="comments-button"><a href="' . $url . '#comments" class="btn btn-default">Отзывы и коментарии</a></div>';
  $variables['media_button'] = '<div class="media-button"><a href="' . $url . '#media" class="btn btn-default">Фото и Видео</a></div>';

  $user = user_load($variables['uid']);
  if (in_array('company', $user->roles)) {
    $variables['used_by_form'] = drupal_get_form('used_by_form');
  }
  else {
    $variables['content']['field_map'] = '';
  }
}

// Скрываем заголовок на странице с услугой
function custom_spot_preprocess_page(&$variables) {
  if (!empty($variables['node']) && $variables['node']->type == 'services') {
    $variables['title'] = '';
  }
}
