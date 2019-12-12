<?php

namespace Drupal\turn\Plugin\Filter;

use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * @file
 * Contains Drupal\turn\Plugin\Filter\TurnName.
 */

/**
 * A filter to turn the last- and first name.
 */

/**
 * This creates the checkbox in the editor configuration.
 *
 * @Filter(
 *   id = "filter_turn",
 *   title = @Translation("Turn Name"),
 *   description = @Translation("Turn first- and last name!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class TurnName extends FilterBase {

  /**
   * Filter function.
   */
  public function process($text, $langcode) {
    $replace = $this->t('Name: LASTNAME FIRSTNAME');
    $new_text = str_replace('[name:FIRSTNAME:LASTNAME]', $replace, $text);
    $result = new FilterProcessResult($new_text);
    return $result;
  }

}
