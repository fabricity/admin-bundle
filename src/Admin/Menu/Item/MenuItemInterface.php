<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

interface MenuItemInterface
{
    public function getName(): string;

    public function getItems(): MenuItems;

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array;
}
