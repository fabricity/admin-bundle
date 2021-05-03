<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Layout\Element;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Menus;

interface ElementInterface
{
    public function getMenus(): Menus;
}
