<?php

namespace ContainerFG23mn2;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_L1KwqcLService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.l1KwqcL' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.l1KwqcL'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\AdminController::deleteAddress' => ['privates', '.service_locator.xu0ZQ4H', 'get_ServiceLocator_Xu0ZQ4HService', true],
            'App\\Controller\\AdminController::deleteAnnonce' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\AdminController::index' => ['privates', '.service_locator.kPUOGb8', 'get_ServiceLocator_KPUOGb8Service', true],
            'App\\Controller\\AdminController::showAddress' => ['privates', '.service_locator.VN7ySI4', 'get_ServiceLocator_VN7ySI4Service', true],
            'App\\Controller\\AdminController::showAnnonce' => ['privates', '.service_locator.UnVjGk7', 'get_ServiceLocator_UnVjGk7Service', true],
            'App\\Controller\\AdminController::showBank' => ['privates', '.service_locator.dyXehMn', 'get_ServiceLocator_DyXehMnService', true],
            'App\\Controller\\AdminController::update' => ['privates', '.service_locator.xu0ZQ4H', 'get_ServiceLocator_Xu0ZQ4HService', true],
            'App\\Controller\\AdminController::updateAnnonce' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\HomeController::getAnnonceId' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\HomeController::index' => ['privates', '.service_locator.avm1qzp', 'get_ServiceLocator_Avm1qzpService', true],
            'App\\Controller\\LoginController::accessUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\LoginController::index' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Controller\\RegistrationController::register' => ['privates', '.service_locator.e_4zbH4', 'get_ServiceLocator_E4zbH4Service', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\AdminController:deleteAddress' => ['privates', '.service_locator.xu0ZQ4H', 'get_ServiceLocator_Xu0ZQ4HService', true],
            'App\\Controller\\AdminController:deleteAnnonce' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\AdminController:index' => ['privates', '.service_locator.kPUOGb8', 'get_ServiceLocator_KPUOGb8Service', true],
            'App\\Controller\\AdminController:showAddress' => ['privates', '.service_locator.VN7ySI4', 'get_ServiceLocator_VN7ySI4Service', true],
            'App\\Controller\\AdminController:showAnnonce' => ['privates', '.service_locator.UnVjGk7', 'get_ServiceLocator_UnVjGk7Service', true],
            'App\\Controller\\AdminController:showBank' => ['privates', '.service_locator.dyXehMn', 'get_ServiceLocator_DyXehMnService', true],
            'App\\Controller\\AdminController:update' => ['privates', '.service_locator.xu0ZQ4H', 'get_ServiceLocator_Xu0ZQ4HService', true],
            'App\\Controller\\AdminController:updateAnnonce' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\HomeController:getAnnonceId' => ['privates', '.service_locator.2XW8uQ7', 'get_ServiceLocator_2XW8uQ7Service', true],
            'App\\Controller\\HomeController:index' => ['privates', '.service_locator.avm1qzp', 'get_ServiceLocator_Avm1qzpService', true],
            'App\\Controller\\LoginController:accessUser' => ['privates', '.service_locator.Hz5btge', 'get_ServiceLocator_Hz5btgeService', true],
            'App\\Controller\\LoginController:index' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Controller\\RegistrationController:register' => ['privates', '.service_locator.e_4zbH4', 'get_ServiceLocator_E4zbH4Service', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\AdminController::deleteAddress' => '?',
            'App\\Controller\\AdminController::deleteAnnonce' => '?',
            'App\\Controller\\AdminController::index' => '?',
            'App\\Controller\\AdminController::showAddress' => '?',
            'App\\Controller\\AdminController::showAnnonce' => '?',
            'App\\Controller\\AdminController::showBank' => '?',
            'App\\Controller\\AdminController::update' => '?',
            'App\\Controller\\AdminController::updateAnnonce' => '?',
            'App\\Controller\\HomeController::getAnnonceId' => '?',
            'App\\Controller\\HomeController::index' => '?',
            'App\\Controller\\LoginController::accessUser' => '?',
            'App\\Controller\\LoginController::index' => '?',
            'App\\Controller\\RegistrationController::register' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\AdminController:deleteAddress' => '?',
            'App\\Controller\\AdminController:deleteAnnonce' => '?',
            'App\\Controller\\AdminController:index' => '?',
            'App\\Controller\\AdminController:showAddress' => '?',
            'App\\Controller\\AdminController:showAnnonce' => '?',
            'App\\Controller\\AdminController:showBank' => '?',
            'App\\Controller\\AdminController:update' => '?',
            'App\\Controller\\AdminController:updateAnnonce' => '?',
            'App\\Controller\\HomeController:getAnnonceId' => '?',
            'App\\Controller\\HomeController:index' => '?',
            'App\\Controller\\LoginController:accessUser' => '?',
            'App\\Controller\\LoginController:index' => '?',
            'App\\Controller\\RegistrationController:register' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}