<?php

namespace MajorAdaptiveViews\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * View Controller Manager Factory
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class ViewControllerManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'MajorAdaptiveViews\Service\ViewControllerManager';

    /**
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ViewControllerManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $plugins = parent::createService($serviceLocator);

        $config = $serviceLocator->get('Config');

        $smConfig = isset($config['view_controllers']) ? $config['view_controllers'] : array();

        $config = new Config($smConfig);
        $config->configureServiceManager($plugins);

        return $plugins;
    }
}
