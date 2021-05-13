<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemInterface;

interface MenuBuilderInterface
{
    /**
     * @param array<string, mixed> $options
     */
    public function addItem(string $name, array $options = []): MenuBuilderInterface;

    /**
     * @param array<string, mixed> $options
     */
    public function createItem(string $name, array $options = []): MenuItemInterface;

    public function getItem(string $name): MenuItemInterface;

    public function hasItem(string $name): bool;

    public function removeItem(string $name): MenuBuilderInterface;
}
