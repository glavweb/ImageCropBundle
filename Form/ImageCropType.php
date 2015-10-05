<?php

namespace Anacona16\Bundle\ImageCropBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ImageCropType extends AbstractType
{
    /**
     * @var $scaling array
     */
    private $scaling;

    /**
     * @var $downloadUri string
     */
    private $downloadUri;

    /**
     * @var $originalWidth int
     */
    private $originalWidth;

    /**
     * @var $originalHeight int
     */
    private $originalHeight;

    /**
     * CropType constructor.
     *
     * @param array $scaling
     * @param string $downloadUri
     * @param int $originalWidth
     * @param int $originalHeight
     */
    public function __construct(array $scaling, $downloadUri, $originalWidth, $originalHeight)
    {
        $this->scaling = $scaling;
        $this->downloadUri = $downloadUri;
        $this->originalWidth = $originalWidth;
        $this->originalHeight = $originalHeight;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('scaling', 'choice', array(
                'choices' => $this->scaling,
                'label' => 'form.label.scaling',
                'translation_domain' => 'ImageCropBundle',
            ))
            ->add('path', 'hidden', [
                'data' => $this->downloadUri,
            ])
            ->add('cropx', 'hidden', [
                'empty_data' => 0,
            ])
            ->add('cropy', 'hidden', [
                'empty_data' => 0,
            ])
            ->add('cropw', 'hidden', [
                'empty_data' => $this->originalWidth,
            ])
            ->add('croph', 'hidden', [
                'empty_data' => $this->originalHeight,
            ])
            ->add('save', 'submit', array(
                'label' => 'form.label.save',
                'translation_domain' => 'ImageCropBundle',
            ))
        ;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'anacona16_image_crop_crop_type';
    }
}