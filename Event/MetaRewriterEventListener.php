<?php

namespace NS\SeoBundle\Event;

use NS\CmsBundle\Event\AfterPageRenderEvent;

/**
 * Class MetaRewriterEventListener
 *
 * @package NS\SeoBundle\Event
 */
class MetaRewriterEventListener
{
	/**
	 * @param AfterPageRenderEvent $event
	 */
	public function onAfterPageRender(AfterPageRenderEvent $event)
	{
		$content = $event->getResponse()->getContent();

		$content .= '111111';

		$event->getResponse()->setContent($content);
	}
}