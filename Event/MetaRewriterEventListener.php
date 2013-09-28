<?php

namespace NS\SeoBundle\Event;

use DOMDocument;
use NS\CmsBundle\Event\AfterPageRenderEvent;
use NS\SeoBundle\Entity\MetaRepository;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class MetaRewriterEventListener
 *
 * @package NS\SeoBundle\Event
 */
class MetaRewriterEventListener
{
	/**
	 * @var MetaRepository
	 */
	private $metaRepository;

	/**
	 * @param AfterPageRenderEvent $event
	 */
	public function onAfterPageRender(AfterPageRenderEvent $event)
	{
		// current page url
		$url = $event->getRequest()->getPathInfo();

		// searching for meta object
		$meta = $this->metaRepository->findOneByUrl($url);
		if (!$meta) {
			return;
		}

		$content = $event->getResponse()->getContent();

		// replacing title
		if ($meta->getTitle()) {
			$content = preg_replace(
				"/<title>[\s\S]*?<\\/title>/ims",
				"<title>{$meta->getTitle()}</title>",
				$content
			);
		}

		// replacing description
		if ($meta->getDescription()) {
			$content = preg_replace(
				"/<meta([\s\S]*?)name=\"description\"([\s\S]*?)content=\"[\s\S]*?\"\\/>/",
				"<meta$1name=\"description\"$2content=\"{$meta->getDescription()}\"/>",
				$content
			);
		}

		// replacing keywords
		if ($meta->getKeywords()) {
			$content = preg_replace(
				"/<meta([\s\S]*?)name=\"keywords\"([\s\S]*?)content=\"[\s\S]*?\"\\/>/",
				"<meta$1name=\"keywords\"$2content=\"{$meta->getKeywords()}\"/>",
				$content
			);
		}

		$event->getResponse()->setContent($content);
	}

	/**
	 * @param MetaRepository $metaRepository
	 */
	public function setMetaRepository(MetaRepository $metaRepository)
	{
		$this->metaRepository = $metaRepository;
	}
}