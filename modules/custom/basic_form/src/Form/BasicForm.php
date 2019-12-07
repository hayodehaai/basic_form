<?php

namespace Drupal\basic_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation;
/**
  * Basic Form class
  */
class basicForm extends FormBase {
  public function getFormId() {
    return 'basic_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];

    $form['gender'] = [
      '#type' => 'select',
      '#title' => $this
        ->t('Gender'),
      '#options' => [
        'Male' => $this
          ->t('Male'),
        'Female' => $this
            ->t('Female'),
      ],
      '#required' => TRUE,
    ];

    $form['birthday'] = [
      '#type' => 'date',
      '#title' => $this->t('Birthday'),
      '#required' => TRUE,
    ];

    $form['age'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Age'),
      '#attributes' => array('readonly' => 'readonly', 'value' => 'Enter your birthday!'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
      $this->messenger()->addMessage($this->t('Your Data:'), 'status', TRUE);
      $this->messenger()->addMessage($this->t('Name: ') . $form_state->getValue('name'), 'status', TRUE);
      $this->messenger()->addMessage($this->t('Gender: ') . $form_state->getValue('gender'), 'status', TRUE);
      $this->messenger()->addMessage($this->t('Birthday: ') . $form_state->getValue('birthday'), 'status', TRUE);
	  $this->messenger()->addMessage($this->t('Age: ') . $form_state->getValue('age'), 'status', TRUE);

  }
  }
 ?>
