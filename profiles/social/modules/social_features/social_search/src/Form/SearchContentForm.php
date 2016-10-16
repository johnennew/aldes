<?php

namespace Drupal\social_search\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Component\Utility\UrlHelper;

/**
 * Class SearchContentForm.
 *
 * @package Drupal\social_search\Form
 */
class SearchContentForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'search_content_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['search_input'] = array(
      '#type' => 'textfield',
    );

    // Prefill search input on the search content page.
    if (\Drupal::routeMatch()->getRouteName() == 'view.search_content.page') {
      $form['search_input']['#default_value'] = \Drupal::routeMatch()->getParameter('keys');
    }

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Search'),
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if (empty($form_state->getValue('search_input'))) {
      // Redirect to the search content page with empty search values.
      $search_content_page = Url::fromRoute('view.search_content.page_no_value');
    }
    else {
      // Redirect to the search content page with filters in the GET parameters.
      $search_input = $form_state->getValue('search_input');
      $search_content_page = Url::fromRoute('view.search_content.page', array('keys' => $search_input));
    }
    $redirect_path = $search_content_page->toString();

    $query = UrlHelper::filterQueryParameters(\Drupal::request()->query->all());

    $redirect = Url::fromUserInput($redirect_path, array('query' => $query));

    $form_state->setRedirectUrl($redirect);
  }

}
