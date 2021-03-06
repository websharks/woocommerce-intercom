<?php
/**
 * Menu page utils.
 *
 * @author @raamdev
 * @copyright WP Sharks™
 */
declare (strict_types = 1);
namespace WebSharks\WpSharks\WooCommerceIntercom\Classes\Utils;

use WebSharks\WpSharks\WooCommerceIntercom\Classes;
use WebSharks\WpSharks\WooCommerceIntercom\Interfaces;
use WebSharks\WpSharks\WooCommerceIntercom\Traits;
#
use WebSharks\WpSharks\WooCommerceIntercom\Classes\AppFacades as a;
use WebSharks\WpSharks\WooCommerceIntercom\Classes\SCoreFacades as s;
use WebSharks\WpSharks\WooCommerceIntercom\Classes\CoreFacades as c;
#
use WebSharks\WpSharks\Core\Classes as SCoreClasses;
use WebSharks\WpSharks\Core\Interfaces as SCoreInterfaces;
use WebSharks\WpSharks\Core\Traits as SCoreTraits;
#
use WebSharks\Core\WpSharksCore\Classes as CoreClasses;
use WebSharks\Core\WpSharksCore\Classes\Core\Base\Exception;
use WebSharks\Core\WpSharksCore\Interfaces as CoreInterfaces;
use WebSharks\Core\WpSharksCore\Traits as CoreTraits;
#
use function assert as debug;
use function get_defined_vars as vars;

/**
 * Menu page utils.
 *
 * @since 160909.7530 Initial release.
 */
class MenuPage extends SCoreClasses\SCore\Base\Core
{
    /**
     * Adds menu pages.
     *
     * @since 160909.7530 Initial release.
     */
    public function onAdminMenu()
    {
        s::addMenuPageItem([
            'auto_prefix'   => false,
            'parent_page'   => 'woocommerce',
            'menu_title'    => __('Intercom', 'woocommerce-intercom'),
            'template_file' => 'admin/menu-pages/options/default.php',

            'tabs' => [
                'default' => sprintf(__('%1$s', 'woocommerce-intercom'), esc_html($this->App->Config->©brand['©name'])),
                'restore' => [
                    'label' => __('Restore Default Options', 'woocommerce-intercom'),
                    'url'   => s::restoreDefaultOptionsUrl(), 'onclick' => 'confirm',
                ],
            ],
        ]);
    }
}
