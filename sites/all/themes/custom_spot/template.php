<?php

// Выводим форму в шаблон
function custom_spot_preprocess_node(&$variables) {
  $url = request_uri();
  if (isset($variables['content']['field_cost'])) {
    $variables['content']['field_cost'][0]['#markup'] .= ' руб.';
  }
  $variables['comment_button'] = '<div class="comments-button button-item"><a href="' . $url . '#comments" class="btn btn-default">Отзывы</a></div>';
  $variables['media_button'] = '<div class="media-button button-item"><a href="' . $url . '#media" class="btn btn-default">Медиа</a></div>';
  $variables['map_button'] = '<div class="map-button button-item"><a href="' . $url . '#map" class="btn btn-default">Карта</a></div>';
  $variables['advice_button'] = '<div class="advice-button button-item"><a href="' . $url . '#advice" class="btn btn-default">Советы</a></div>';

  $user = user_load($variables['uid']);
  if (in_array('company', $user->roles)) {
    $variables['used_by_form'] = drupal_get_form('used_by_form');
    $variables['field_map'] = render($variables['content']['field_map']);
    $variables['field_videos'] = render($variables['content']['field_videos']);
  }
  else {
    $variables['field_map'] = '';
    $variables['field_videos'] = '';
  }
}

// Скрываем заголовок на странице с услугой
function custom_spot_preprocess_page(&$variables) {
  if (!empty($variables['node']) && $variables['node']->type == 'services') {
    $variables['title'] = '';
  }
}
