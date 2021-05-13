<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

interface MenuItemInterface
{
    public function getItems(): MenuItems;

    public function getName(): string;

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array;
}
