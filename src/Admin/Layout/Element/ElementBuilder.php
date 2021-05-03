<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout\Element;

use Fabricity\Bundle\AdminBundle\Admin\Menu\MenuFactory;
use Fabricity\Bundle\AdminBundle\Admin\Menu\Menus;

final class ElementBuilder implements ElementBuilderInterface
{
    private string $name;
    private MenuFactory $menuFactory;
    private Menus $menus;

    public function __construct(string $name, MenuFactory $menuFactory)
    {
        $this->name = $name;
        $this->menuFactory = $menuFactory;
        $this->menus = new Menus();
    }

    public function getElement(): ElementInterface
    {
        $element = new Element($this->name);
        $element->setMenus($this->menus);

        return $element;
    }

    public function addMenu(string $name, string $type, array $options = []): ElementBuilderInterface
    {
        $menu = $this->menuFactory->create($name, $type, $options);
        $this->menus->add($menu);

        return $this;
    }
}