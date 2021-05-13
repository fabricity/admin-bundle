<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout\Element;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Menus;

final class Element implements ElementInterface
{
    private Menus $menus;
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->menus = new Menus();
    }

    public function getMenus(): Menus
    {
        return $this->menus;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setMenus(Menus $menus): self
    {
        $this->menus = $menus;

        return $this;
    }
}
