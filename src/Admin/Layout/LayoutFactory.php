<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout;

use Fabricity\Bundle\AdminBundle\Admin\Layout\Element\ElementBuilder;
use Fabricity\Bundle\AdminBundle\Admin\Menu\MenuFactory;
use Fabricity\Bundle\AdminBundle\Admin\Type\LayoutTypeInterface;
use Fabricity\Bundle\AdminBundle\Admin\Type\TypeRegister;

final class LayoutFactory implements LayoutFactoryInterface
{
    private TypeRegister $typeRegister;
    private MenuFactory $menuFactory;

    public function __construct(TypeRegister $typeRegister, MenuFactory $menuFactory)
    {
        $this->typeRegister = $typeRegister;
        $this->menuFactory = $menuFactory;
    }

    public function create(string $type): Layout
    {
        /** @var LayoutTypeInterface $resolvedType */
        $resolvedType = $this->typeRegister->resolve(TypeRegister::LAYOUT, $type);

        $asideLeftBuilder = new ElementBuilder('asideLeft', $this->menuFactory);
        $resolvedType->buildAsideLeft($asideLeftBuilder);

        return new Layout(
            $asideLeftBuilder->getElement()
        );
    }
}