<?php

namespace RestApi\Model;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Brewery
 *
 * @ORM\Table(name="brewery", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Brewery {
	/**
	 * @var integer
	 *
	 * JMS\Type("integer")
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @JMS\Type("string")
	 *
	 * @ORM\Column(name="name", type="string", length=45, nullable=true)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @JMS\Type("string")
	 *
	 * @ORM\Column(name="city", type="string", length=45, nullable=true)
	 */
	private $city;

	/**
	 * @var string
	 *
	 * @JMS\Type("string")
	 *
	 * @ORM\Column(name="website", type="string", length=45, nullable=true)
	 */
	private $website;

	/**
	 * @var array.<Beer>
	 *
	 * @ORM\OneToMany(targetEntity="RestApi\Model\Beer", mappedBy="brewery", fetch="EAGER")
	 */
	private $beers;


	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Brewery
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 * @return Brewery
	 */
	public function setCity($city) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set website
	 *
	 * @param string $website
	 * @return Brewery
	 */
	public function setWebsite($website) {
		$this->website = $website;

		return $this;
	}

	/**
	 * Get website
	 *
	 * @return string
	 */
	public function getWebsite() {
		return $this->website;
	}

	/**
	 * @param Beer $beer
	 */
	public function addBeer(Beer $beer) {
		if (!$this->beers) {
			$this->beers = [];
		}

		$beer->setBrewery($this);

		array_push($this->beers, $beer);
	}

	/**
	 * @return array.<Beer>
	 */
	public function getBeers() {
		return $this->beers;
	}

}
