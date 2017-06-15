<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 14.06.17
 * Time: 14:16
 */

/**
 * Implements hook_action_info().
 */
function custom_end_subscription_action_info() {
  $items = array();
  $items['trobs_custom_user_activation'] = array(
    'label' => t('User activation: show message'),
    'parameter' => array(),
    'group' => t('Custom'),
    'base' => 'trobs_custom_action_activation',
  );
  return $items;
}

/**
 * Implements action callback.
 */
function custom_end_subscription_action_activation() {
  $_SESSION['is_first_login'] = TRUE;
}

/**
 * Implements hook_rules_event_info().
 */
function custom_end_subscription_rules_event_info() {
  return array(
    'subscription_7_days_remains' => array(
      'label' => t('7 days subscription remains'),
      'module' => 'custom_end_subscription',
      'group' => t('Custom'),
      'variables' => array(
        'current_user' => array(
          'type' => 'user',
          'label' => t('The current logged in user.')
        ),
      ),
    ),
    'subscription_3_days_remains' => array(
      'label' => t('3 days subscription remains'),
      'module' => 'custom_end_subscription',
      'group' => t('Custom'),
      'variables' => array(
        'current_user' => array(
          'type' => 'user',
          'label' => t('The current logged in user.')
        ),
      ),
    ),
    'subscription_1_day_remains' => array(
      'label' => t('1 day subscription remains'),
      'module' => 'custom_end_subscription',
      'group' => t('Custom'),
      'variables' => array(
        'current_user' => array(
          'type' => 'user',
          'label' => t('The current logged in user.')
        ),
      ),
    ),
    'subscription_ends' => array(
      'label' => t('Subscription ends'),
      'module' => 'custom_end_subscription',
      'group' => t('Custom'),
      'variables' => array(
        'current_user' => array(
          'type' => 'user',
          'label' => t('The current logged in user.')
        ),
      ),
    ),

  );
}