<?php

namespace Drupal\basic_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Basic Form class.
 */
class BasicForm extends FormBase {

  /**
   * Get form id.
   */
  public function getFormId() {
    return 'basic_form';
  }

  /**
   * Build form.
   */
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
      '#attributes' => ['readonly' => 'readonly', 'value' => 'Enter your birthday!'],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * Display the entered data.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $name = $form_state->getValue('name');
    $gender = $form_state->getValue('gender');
    $birthday = $form_state->getValue('birthday');
    $birthday = date("d-m-Y", strtotime($birthday));
    $age = $form_state->getValue('age');
    $this->messenger()->addMessage($this->t('Your Data:'), 'status', TRUE);
    $this->messenger()->addMessage($this->t('Name: @name', ['@name' => $name]), 'status', TRUE);
    $this->messenger()->addMessage($this->t('Gender: @gender', ['@gender' => $gender]), 'status', TRUE);
    $this->messenger()->addMessage($this->t('Birthday: @birthday', ['@birthday' => $birthday]), 'status', TRUE);
    $this->messenger()->addMessage($this->t('Age: @age', ['@age' => $age]), 'status', TRUE);

  }

}
