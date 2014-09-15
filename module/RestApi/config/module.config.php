<?php
return array(
	'controllers' => array(
		'invokables' => array(
		)
	),
	'router' => array(
		'routes' => array(
		),
	'service_manager' => array(
		'factories' => array(
			'serializer' => function () {
					// Doctrine Annotations does not use normal PSR-0 autoloading,
					// so we have to register stuff ourselves.
					// See: http://stackoverflow.com/questions/14629137/jmsserializer-stand-alone-annotation-does-not-exist-or-cannot-be-auto-loaded/
					\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
						'JMS\Serializer\Annotation',
						__DIR__ . '/../../../vendor/jms/serializer/src'
					);

					return \JMS\Serializer\SerializerBuilder::create()
						->setCacheDir(__DIR__ . '/../../../data/cache')
						->setDebug(true)
						->build();
				},
		)
	)
);