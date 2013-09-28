<?php

namespace NS\SeoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class MetaRepository
 *
 * @package NS\SeoBundle\Entity
 */
class MetaRepository extends EntityRepository
{
	/**
	 * @param string $url
	 * @return Meta|null
	 */
	public function findOneByUrl($url)
	{
		return $this->findOneBy(array('url' => $url));
	}
} 