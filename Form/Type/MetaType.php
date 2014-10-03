<?php

namespace NS\SeoBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use NS\CatalogBundle\Entity\CategoryRepository;
use NS\CatalogBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class MetaType
 *
 * @package NS\SeoBundle\Form\Type
 */
class MetaType extends AbstractType
{
	/**
	 * Builds form
	 *
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
            ->add('url', 'text', array(
                'label'    => 'URL',
                'required' => true,
            ))
            ->add('title', 'text', array(
                'label'    => 'Title',
                'required' => true,
            ))
            ->add('keywords', 'textarea', array(
                'label'    => 'Keywords',
                'required' => false,
            ))
            ->add('description', 'textarea', array(
                'label'    => 'Description',
                'required' => false,
            ))
        ;
    }

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NS\SeoBundle\Entity\Meta'
        ));
    }

	/**
	 * @return string
	 */
	public function getName()
    {
        return 'ns_seo_meta';
    }
}
