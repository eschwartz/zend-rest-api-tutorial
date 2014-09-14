<?php
return array(
	'doctrine' => array(
		'driver' => array(
			'annotation_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/../../module/RestApi/src')
			),
			'orm_default' => array(
				'drivers' => array(
					'RestApi' => 'annotation_driver'
				)
			)
		),
		'connection' => array(
			'orm_default' => array(
				'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
				'params' => array(
					'host' => 'localhost',
					'port' => '3306',
					'dbname' => 'zend-rest-api',
				),
			),
		)
	));