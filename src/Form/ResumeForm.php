<?php

/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm
 */
namespace Drupal\resume\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ResumeForm extends FormBase
{
    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'resume_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {

        $form['candidate_name'] = [
            '#type' => 'textfield',
            '#title' => t('Candidate Name'),
            '#required' => true
        ];

        $form['candidate_mail'] = [
            '#type' => 'email',
            '#title' => t('Email ID'),
            '#required' => true,
        ];

        $form['candidate_number'] = [
            '#type' => 'tel',
            '#title' => t('Mobile Number'),
        ];

        $form['candidate_dob'] = [
            '#type' => 'date',
            '#title' => t('Enter the DOB'),
            '#required' => true,
        ];

        $form['candidate_gender'] = [
            '#type' => 'select',
            '#title' => t('Gender'),
            '#options' => [
                'Female' => t('Female'),
                'Male' => t('Male'),
            ],
        ];

        $form['candidate_confirmation'] = [
          '#type' => 'radios',
          '#title' => t('Are you above 18 years old?'),
          '#options' => [
            'Yes' =>t('Yes'),
            'No' =>t('No')
          ],
        ];

        $form['candidate_copy'] = [
            '#type' => 'checkbox',
            '#title' => t('Send me a copy of the application'),
        ];

        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
          '#type' => 'submit',
          '#value' => $this->t('Save'),
          '#button_type' => 'primary',
        ];
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
        if (strlen($form_state->getValue('candidate_number')) < 10) {
          $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
        }
      }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        foreach ($form_state->getValues() as $key => $value) {
            drupal_set_message($key . ': ' . $value);
        }
    }
}