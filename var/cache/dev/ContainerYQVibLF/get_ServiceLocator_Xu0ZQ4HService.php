<?php

namespace ContainerYQVibLF;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Xu0ZQ4HService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.xu0ZQ4H' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.xu0ZQ4H'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'address' => ['privates', '.errored..service_locator.xu0ZQ4H.App\\Entity\\Address', NULL, 'Cannot autowire service ".service_locator.xu0ZQ4H": it needs an instance of "App\\Entity\\Address" but this type has been excluded in "config/services.yaml".'],
        ], [
            'address' => 'App\\Entity\\Address',
        ]);
    }
}
