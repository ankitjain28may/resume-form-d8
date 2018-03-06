<?php

namespace Drupal\resume\Plugin\Block;

use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provies a Resume Block
 *
 * @Block(
 *     id = "resume_form_block",
 *     admin_label = @Translation("Resume Form Block"),
 *     category = @Translation("Resume Form"),
 * )
 */

class ResumeFormBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $form = \Drupal::formBuilder()->getForm('Drupal\resume\Form\ResumeForm');
        return $form;
    }
}