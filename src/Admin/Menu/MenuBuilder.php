<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemFactory;
use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemInterface;
use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItems;

final class MenuBuilder implements MenuBuilderInterface
{
    private string $name;
    /** @var array<string, mixed> */
    private array $options;
    private MenuItemFactory $menuItemFactory;
    private MenuItems $menuItems;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(string $name, array $options, MenuItemFactory $menuItemFactory)
    {
        $this->name = $name;
        $this->options = $options;
        $this->menuItemFactory = $menuItemFactory;
        $this->menuItems = new MenuItems();
    }

    public function getMenu(): MenuInterface
    {
        return new Menu($this->name, $this->options, $this->menuItems);
    }

    public function createItem(string $name, array $options = []): MenuItemInterface
    {
        $options = \array_merge($options, [
           'translation_domain' => $options['translation_domain'] ?? $this->options['translation_domain'],
           'icon' => $options['icon'] ?? $this->options['default_icon'],
           'icon_class' => $options['icon_class'] ?? $this->options['default_icon_class'],
        ]);

        return $this->menuItemFactory->create($name, $options);
    }

    public function addItem(string $name, array $options = []): MenuBuilderInterface
    {
        $menuItem = $this->createItem($name, $options);
        $this->menuItems->add($menuItem);

        return $this;
    }

    public function getItem(string $name): MenuItemInterface
    {
        return $this->menuItems->get($name);
    }

    public function hasItem(string $name): bool
    {
        return $this->menuItems->has($name);
    }

    public function removeItem(string $name): MenuBuilderInterface
    {
        if ($this->menuItems->has($name)) {
            $this->menuItems->remove($this->menuItems->get($name));
        }

        return $this;
    }
}