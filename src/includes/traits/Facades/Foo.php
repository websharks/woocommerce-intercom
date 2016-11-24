<?php
/**
 * Foo (example).
 *
 * @author @raamdev
 * @copyright WP Sharks™
 */
declare (strict_types = 1);
namespace WebSharks\WpSharks\WooCommerceIntercom\Traits\Facades;

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
 * Foo (example).
 *
 * @since 160909.7530
 */
trait Foo
{
    /**
     * @since 160909.7530 Foo example.
     *
     * @param mixed ...$args Variadic args to underlying utility.
     *
     * @see Classes\Utils\Foo::__invoke()
     */
    public static function foo(...$args)
    {
        return $GLOBALS[static::class]->Utils->Foo->__invoke(...$args);
    }
}
