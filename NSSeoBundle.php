<?php

namespace NS\SeoBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class NSSeoBundle
 *
 * @package NS\SeoBundle
 */
class NSSeoBundle extends Bundle
{
	/**
	 * @param ContainerBuilder $container
	 */
	public function build(ContainerBuilder $container)
	{
		parent::build($container);
	}
}
