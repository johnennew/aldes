<?php

/**
 * @file
 * Contains \Drupal\masquerade\Plugin\Block\MasqueradeBlock.
 */

namespace Drupal\aldes_system\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Link;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\masquerade\Plugin\Block\MasqueradeBlock;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a better 'Masquerade' block.
 *
 * @Block(
 *   id = "aldes_system_masquerade",
 *   admin_label = @Translation("Aldes Masquerade"),
 *   category = @Translation("Forms"),
 * )
 */
class AldesSystemMasqueradeBlock extends MasqueradeBlock implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    if ($this->masquerade->isMasquerading()) {
      return AccessResult::allowed();
    }
    // Display block for all users that has any of masquerade permissions.
    return AccessResult::allowedIfHasPermissions($account, $this->masquerade->getPermissions(), 'OR');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    if ($this->masquerade->isMasquerading()) {
      return Link::createFromRoute('Switch back', 'masquerade.unmasquerade')->toRenderable();
    }

    return $this->formBuilder->getForm('Drupal\masquerade\Form\MasqueradeForm');
  }

}
