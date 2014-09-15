<?php

namespace RestApiTest\RestApiTest\Controller;

use \PHPUnit_Framework_MockObject_MockObject as MockObject;
use RestApi\Model\Beer;
use RestApi\Model\Brewery;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use JMS\Serializer\SerializerInterface;


class BreweryRestControllerTest extends AbstractHttpControllerTestCase {

	/**
	 * @var \Zend\ServiceManager\ServiceManager
	 */
	private $sm;

	/**
	 * @var SerializerInterface
	 */
	private $serializer;

	protected function setUp() {
		$this->setApplicationConfig(include __DIR__ . '/../../../../../config/application.config.php');

		$this->sm = $this->getApplicationServiceLocator();
		$this->sm->setAllowOverride(true);

		$this->serializer = $this->getApplicationServiceLocator()
			->get('serializer');
	}


	/**
	 * @test
	 */
	public function shouldReturnAListOfBreweries() {
		$entityManagerMock = $this->getMock(
			'\Doctrine\ORM\EntityManager',
			array(
				'getRepository'
			),
			array(), '', false
		);
		$this->sm->setService('doctrine.entitymanager.orm_default', $entityManagerMock);

		$breweryRepoMock = $this->getMockBuilder('\Doctrine\ORM\EntityRepository')
			->disableOriginalConstructor()
			->getMock();

		// Mock the entity manager to return
		// a mock brewery repo
		$entityManagerMock
			->expects($this->once())
			->method('getRepository')
			->with('RestApi\Model\Brewery')
			->will($this->returnValue($breweryRepoMock));

		$summitBrewery = new Brewery();
		$summitBrewery->setName('Summit Brewery');
		$summitBrewery->setCity('St. Paul, MN');
		$summitBrewery->setWebsite('www.summitbrewery.com');

		$summitEPA = new Beer();
		$summitEPA->setName('Summit EPA');
		$summitEPA->setStyle('EPA');
		$summitEPA->setIbu(45);
		$summitBrewery->addBeer($summitEPA);

		$harrietBrewing = new Brewery();
		$harrietBrewing->setName('Harriet Brewing');
		$harrietBrewing->setCity('Minneapolis, MN');
		$harrietBrewing->setWebsite('www.harrietbrewing.com');


		// Mock the brewery repo to return our stub data
		$breweryRepoMock
			->expects($this->once())
			->method('findAll')
			->will($this->returnValue(array(
				$summitBrewery,
				$harrietBrewing
			)));


		// Make GET request to /breweries/
		$this->dispatch('/breweries/', 'GET');
		$response = $this->getResponse()->getContent();

		// Test response is successful
		$this->assertResponseStatusCode(200);

		// Test JSON response is serialized brewery data
		$this->assertJsonStringEqualsJsonString(json_encode(
			array(
				array(
					'name' => 'Summit Brewery',
					'city' => 'St. Paul, MN',
					'website' => 'www.summitbrewery.com',
					'beers' => array(
						array(
							'name' => 'Summit EPA',
							'style' => 'EPA',
							'ibu' => 45
						)
					)
				),
				array(
					'name' => 'Harriet Brewing',
					'city' => 'Minneapolis, MN',
					'website' => 'www.harrietbrewing.com'
				)
			)
		), $response);
	}

} 