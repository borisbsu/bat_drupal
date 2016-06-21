<?php

/**
 * @file
 * Contains \Drupal\bat_unit\Entity\Unit.
 */

namespace Drupal\bat_unit\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Unit entities.
 */
class UnitViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['bat_unit']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Unit'),
      'help' => $this->t('The Unit ID.'),
    );

    $data['bat_unit']['type']['field'] = array(
      'title' => t('Booking Unit Bundle'),
      'help' => t('Booking Unit Bundle Label.'),
      'id' => 'bat_unit_handler_unit_bundle_field',
    );

    $data['bat_unit']['unit_bulk_form'] = array(
      'title' => t('Unit operations bulk form'),
      'help' => t('Add a form element that lets you run operations on multiple units.'),
      'field' => array(
        'id' => 'unit_bulk_form',
      ),
    );

    return $data;
  }

}
