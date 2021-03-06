<?php

namespace SlmQueueTest\Asset;

use Interop\Container\ContainerInterface;
use SlmQueue\Job\JobPluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * SimpleQueueFactory
 */
class SimpleQueueFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $jobPluginManager = new JobPluginManager($container);

        return new SimpleQueue($requestedName, $jobPluginManager);
    }

    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator, $name = '', $requestedName = '')
    {
        return $this($serviceLocator, $requestedName);
    }
}
