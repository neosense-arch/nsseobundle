<?php

namespace NS\SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meta data entity
 *
 * @ORM\Table(name="ns_seo_meta")
 * @ORM\Entity(repositoryClass="MetaRepository")
 */
class Meta
{
	/**
	 * @var int
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(type="string", unique=true)
	 */
	private $url;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	private $keywords;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	private $description;
	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}
	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	/**
	 * @param string $keywords
	 */
	public function setKeywords($keywords)
	{
		$this->keywords = $keywords;
	}
	/**
	 * @return string
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}
	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	/**
	 * @param string $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}
	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}
}
