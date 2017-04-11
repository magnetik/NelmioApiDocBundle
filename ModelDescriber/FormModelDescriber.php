<?php

/*
 * This file is part of the NelmioApiDocBundle package.
 *
 * (c) Nelmio
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\ApiDocBundle\ModelDescriber;

use EXSyst\Component\Swagger\Schema;
use Nelmio\ApiDocBundle\Describer\ModelRegistryAwareInterface;
use Nelmio\ApiDocBundle\Describer\ModelRegistryAwareTrait;
use Nelmio\ApiDocBundle\Model\Model;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormTypeInterface;

class FormModelDescriber implements ModelDescriberInterface, ModelRegistryAwareInterface
{
    use ModelRegistryAwareTrait;

    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function describe(Model $model, Schema $schema)
    {
        $schema->setType('object');
        $properties = $schema->getProperties();

        $class = $model->getType()->getClassName();

        $form = $this->formFactory->create($class, null, []);

    }

    public function parseForm($form)
    {

    }

    public function supports(Model $model): bool
    {
        $result = is_a($model->getType()->getClassName(), FormTypeInterface::class, true);
        return $result;
    }
}
