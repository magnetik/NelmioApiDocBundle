<?php

namespace Nelmio\ApiDocBundle\Tests\Functional\Form;

use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @Definition(
 *     definition="DummyType",
 *     type="object"
 * )
 */
class DummyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'text',
            TextType::class
        );
    }
}
