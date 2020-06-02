<?php
/**
 * @package EgovBlock
 */

namespace App;

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit;
}

final class Init
{
    public static function getServices()
    {
        return array(
            Settings\CustomPostType::class,
            Settings\CustomTaxonomy::class           
        );
    }

    public static function registerServices()
    {
        foreach (self::getServices() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, "register")) {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
