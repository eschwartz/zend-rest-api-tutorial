<?php
/**
 * Created by PhpStorm.
 * User: edanschwartz
 * Date: 7/25/14
 * Time: 2:50 PM
 */

namespace RestApi;

use Zend\Mvc\MvcEvent;

class Module {
	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\ClassMapAutoloader' => array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getServiceConfig() {
		return array();
	}

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}


	public function onBootstrap(MvcEvent $e) {
		$eventManager = $e->getApplication()
			->getEventManager();
		$sharedEventManager = $eventManager
			->getSharedManager();

		$serviceManager = $e->getApplication()->getServiceManager();
	}
}