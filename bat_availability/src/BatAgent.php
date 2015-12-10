<?php

/**
 * @file
 * Contains \Drupal\bat_availability\BatAgent.
 */

namespace Drupal\bat_availability;

use Drupal\bat_availability\BatAgentInterface;
use Drupal\bat_availability\BatCalendarController;
use Drupal\bat_availability\BatCalendar;
use Drupal\bat_availability\BatEvent;

/**
 *
 */
class BatAgent implements BatAgentInterface {
  /**
   *
   */
  private $unit_id;

  /**
   *
   */
  private $availability_states;

  /**
   *
   */
  public function __construct($unit_id) {
    $this->unit_id = $unit_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setValidStates(array $availability_states) {
    $this->availability_states = $availability_states;
  }

  /**
   * {@inheritdoc}
   */
  public function getAvailability(array $availability_filters) {
    return $this->availability_states;
  }

  /**
   * {@inheritdoc}
   */
  public function checkAvailability() {

  }

  /**
   * {@inheritdoc}
   */
  public function updateAvailabilityStates(\DateTime $start_date, \DateTime $end_date, $state) {
    $controller = new BatCalendarController();
    $calendar = new BatCalendar($this->unit_id, $controller);
    $event = new BatEvent($start_date, $end_date, $state);

    $calendar->addEvents(array($event));
  }

  /**
   * {@inheritdoc}
   */
  public function updateAvailabilityEvents(Drupal\bat\Entity\AvailabilityEvent $availability_event_entity) {

  }
}
