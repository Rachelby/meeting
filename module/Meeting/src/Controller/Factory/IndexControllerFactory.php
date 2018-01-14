<?php
namespace Meeting\Controller\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Meeting\Service\MeetupManager;
use Meeting\Controller\IndexController;

/**
 * This is the factory for PostController. Its purpose is to instantiate the
 * controller.
 */
class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                           $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $meetupManager = $container->get(MeetupManager::class);
        
        // Instantiate the controller and inject dependencies
        return new PostController($entityManager, $meetupManager);
    }
}