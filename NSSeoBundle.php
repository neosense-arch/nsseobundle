<?php

namespace NS\SeoBundle;

use NS\CoreBundle\Bundle\CoreBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class NSSeoBundle
 *
 * @package NS\SeoBundle
 */
class NSSeoBundle extends Bundle implements CoreBundle
{
	/**
	 * @param ContainerBuilder $container
	 */
	public function build(ContainerBuilder $container)
	{
		parent::build($container);
	}

    /**
     * Retrieves human-readable bundle title
     *
     * @return string
     */
    public function getTitle()
    {
        return 'Модуль SEO';
    }
}
