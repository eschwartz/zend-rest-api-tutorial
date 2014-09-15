<?php
namespace RestApi\Controller;


use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;


class BreweryRestController extends AbstractRestfulController {
	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $em;

	public function getList() {
		$breweries = $this->getBreweryRepo()
			->findAll();
		$serializer = $this->getServiceLocator()
			->get('serializer');

		$breweriesJson = $serializer->serialize($breweries, 'json');
		return new JsonModel(json_decode($breweriesJson));
	}


	/**
	 * @return \Doctrine\ORM\EntityRepository
	 */
	protected function getBreweryRepo() {
		return $this->getEntityManager()
			->getRepository('RestApi\Model\Brewery');
	}


	/**
	 * @return array|\Doctrine\ORM\EntityManager|object
	 */
	protected function getEntityManager() {
		if ($this->em) {
			return $this->em;
		}

		return $this->em = $this->getServiceLocator()
			->get('doctrine.entitymanager.orm_default');
	}

} 