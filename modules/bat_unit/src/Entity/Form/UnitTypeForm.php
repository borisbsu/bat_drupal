<?php

/**
 * @file
 * Contains \Drupal\bat_unit\Entity\Form\UnitTypeForm.
 */

namespace Drupal\bat_unit\Entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;

/**
 * Form controller for Unit type edit forms.
 *
 * @ingroup bat
 */
class UnitTypeForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\bat\Entity\UnitType */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['langcode'] = array(
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = $entity->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Unit type.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Unit type.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.bat_unit_type.edit_form', ['bat_unit_type' => $entity->id()]);
  }

}