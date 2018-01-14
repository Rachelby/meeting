<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Meeting;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
    	return[
    		'factories' => [
    			Model\MeetupTable::class => function ($container) {
    				$tableGateway = $container->get(Model\MeetupTableGateway::class);
    				return new Model\MeetupTable($tableGateway); 
    			},
    			Model\MeetupTableGateway::class => function ($container) {
    				$adapter = $container->get(AdapterInterface::class); 
    				$resultSetPrototype = new ResultSet(); 
    				$resultSetPrototype->setArrayObjectPrototype(new Model\Meetup); 
    				return new TableGateway('meetup', $adapter, null, $resultSetPrototype); 
    			}
    		], 
           
    	]; 
    }

    public function getControllerConfig()
    {
    	return [
    		'factories' => [
    			Controller\MeetupController::class => function ($container) {
    				return new Controller\MeetupController(
    					$container->get(Model\MeetupTable::class)
    				);
    			},
                Controller\IndexController::class => 
                    Controller\Factory\IndexControllerFactory::class, 
    		]
    	];
    }
}
