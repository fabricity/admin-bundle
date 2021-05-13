<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemInterface;
use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItems;

interface MenuInterface
{
    public function addItem(MenuItemInterface $item): void;

    public function getItems(): MenuItems;

    public function getName(): string;

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array;
}
