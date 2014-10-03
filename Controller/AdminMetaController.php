<?php

namespace NS\SeoBundle\Controller;

use NS\SeoBundle\Entity\Meta;
use NS\SeoBundle\Entity\MetaRepository;
use NS\SeoBundle\Form\Type\MetaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AdminMetaController
 *
 * @package NS\SeoBundle\Controller
 */
class AdminMetaController extends Controller
{
	/**
	 * @return Response
	 */
	public function indexAction()
	{
        /** @var MetaRepository $metaRepository */
        $metaRepository = $this->get('ns_seo.repository.meta');
        $metas = $metaRepository->findAll();

		return $this->render('NSSeoBundle:AdminMeta:index.html.twig', array(
			'metas' => $metas,
		));
	}

    /**
     * @param Request $request
     * @return Response
     */
	public function formAction(Request $request)
	{
        $id = $request->query->get('id');
        $meta = new Meta();
        if ($id) {
            /** @var MetaRepository $metaRepository */
            $metaRepository = $this->get('ns_seo.repository.meta');
            $meta = $metaRepository->find($request->query->get('id'));
        }

		$form = $this->createForm(new MetaType(), $meta);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->getDoctrine()->getManager()->persist($meta);
            $this->getDoctrine()->getManager()->flush();
            return $this->back();
        }

		return $this->render('NSAdminBundle:Layout:col1-form.html.twig', array(
            'form'  => $form->createView(),
            'title' => 'Meta',
		));
	}

    /**
     * @param Request $request
     * @return Response
     */
	public function deleteAction(Request $request)
	{
        /** @var MetaRepository $metaRepository */
        $metaRepository = $this->get('ns_seo.repository.meta');
        $meta = $metaRepository->find($request->query->get('id'));

        $this->getDoctrine()->getManager()->remove($meta);
        $this->getDoctrine()->getManager()->flush();

		return $this->back();
	}

	/**
	 * @return RedirectResponse
	 */
	private function back()
	{
		return $this->redirect($this->generateUrl(
			'ns_admin_bundle', array(
				'adminBundle'     => 'NSSeoBundle',
				'adminController' => 'meta',
				'adminAction'     => 'index',
			)
		));
	}
}
