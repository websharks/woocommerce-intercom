<?php
/**
 * Application.
 *
 * @author @raamdev
 * @copyright WP Sharks™
 */
declare(strict_types=1);
namespace WebSharks\WpSharks\WooCommerceIntercom\Classes;

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
 * Application.
 *
 * @since 160909.7530 Initial release.
 */
class App extends SCoreClasses\App
{
    /**
     * Version.
     *
     * @since 160909.7530
     *
     * @var string Version.
     */
    const VERSION = '161209.85885'; //v//

    /**
     * Constructor.
     *
     * @since 160909.7530 Initial release.
     *
     * @param array $instance Instance args.
     */
    public function __construct(array $instance = [])
    {
        $instance_base = [
            '©di' => [
                /*
                    '©default_rule' => [
                        'new_instances' => [
                        ],
                    ],
                */
            ],

            '§specs' => [
                '§in_wp'           => false,
                '§is_network_wide' => false,

                '§type' => 'plugin',
                '§file' => dirname(__FILE__, 4).'/plugin.php',
            ],
            '©brand' => [
                '©acronym' => 'WC ICOM',
                '©name'    => 'WooCommerce Intercom',

                '©slug' => 'woocommerce-intercom',
                '©var'  => 'woocommerce_intercom',

                '©short_slug' => 'wc-icom',
                '©short_var'  => 'wc_icom',

                '©text_domain' => 'woocommerce-intercom',
            ],

            '§pro_option_keys' => [],
            '§default_options' => [
                'app_id'    => '',
                'api_token' => '',

                'uri_inclusions' => '',
                'uri_exclusions' => '',

                'display_if_logged' => 'in-or-out',
            ],

            '§conflicts' => [
                '§plugins' => [
                    /*
                        '[slug]'  => '[name]',
                    */
                ],
                '§themes' => [
                    /*
                        '[slug]'  => '[name]',
                    */
                ],
                '§deactivatable_plugins' => [
                    /*
                        '[slug]'  => '[name]',
                    */
                ],
            ],
            '§dependencies' => [
                '§plugins' => [
                    'woocommerce' => [
                        'in_wp'       => true,
                        'name'        => 'WooCommerce',
                        'url'         => 'https://wordpress.org/plugins/woocommerce/',
                        'archive_url' => 'https://wordpress.org/plugins/woocommerce/developers/',
                    ],
                ],
            ],
        ];
        parent::__construct($instance_base, $instance);
    }

    /**
     * Early hook setup handler.
     *
     * @since 160909.7530 Initial release.
     */
    protected function onSetupEarlyHooks()
    {
        parent::onSetupEarlyHooks();
    }

    /**
     * Other hook setup handler.
     *
     * @since 160909.7530 Initial release.
     */
    protected function onSetupOtherHooks()
    {
        parent::onSetupOtherHooks();

        add_action('admin_menu', [$this->Utils->MenuPage, 'onAdminMenu']);

        add_action('woocommerce_order_given', [$this->Utils->Events, 'onWcOrderGiven']);
        add_action('woocommerce_order_status_changed', [$this->Utils->Events, 'onWcOrderStatusChanged'], 10, 3);

        add_action('woocommerce_subscription_status_changed', [$this->Utils->Events, 'onWcSubscriptionStatusChanged'], 10, 3);
        add_action('woocommerce_subscriptions_switched_item', [$this->Utils->Events, 'onWcSubscriptionItemSwitched'], 1000, 3);

        add_action('wp_footer', [$this->Utils->JsSnippet, 'onWpFooter']);
    }
}
