<?php

namespace RestApi\Model;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Beer
 *
 * @ORM\Table(name="beer", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="brewery_id_idx", columns={"brewery_id"})})
 * @ORM\Entity
 */
class Beer {
	/**
	 * @var integer
	 *
	 * @JMS\Type("integer")
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
	 * @ORM\Column(name="style", type="string", length=45, nullable=true)
	 */
	private $style;

	/**
	 * @var integer
	 *
	 *
	 * @ORM\Column(name="ibu", type="integer", nullable=true)
	 */
	private $ibu;

	/**
	 * @var \RestApi\Model\Brewery
	 *
	 * @JMS\Type("ArrayCollection<RestApi\Model\Brewery>")
	 *
	 * @ORM\ManyToOne(targetEntity="RestApi\Model\Brewery")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="brewery_id", referencedColumnName="id")
	 * })
	 */
	private $brewery;


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
	 * @return Beer
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
	 * Set style
	 *
	 * @param string $style
	 * @return Beer
	 */
	public function setStyle($style) {
		$this->style = $style;

		return $this;
	}

	/**
	 * Get style
	 *
	 * @return string
	 */
	public function getStyle() {
		return $this->style;
	}

	/**
	 * Set ibu
	 *
	 * @param integer $ibu
	 * @return Beer
	 */
	public function setIbu($ibu) {
		$this->ibu = $ibu;

		return $this;
	}

	/**
	 * Get ibu
	 *
	 * @return integer
	 */
	public function getIbu() {
		return $this->ibu;
	}

	/**
	 * Set brewery
	 *
	 * @param \RestApi\Model\Brewery $brewery
	 * @return Beer
	 */
	public function setBrewery(\RestApi\Model\Brewery $brewery = null) {
		$this->brewery = $brewery;

		return $this;
	}

	/**
	 * Get brewery
	 *
	 * @return \RestApi\Model\Brewery
	 */
	public function getBrewery() {
		return $this->brewery;
	}
}
