<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemInterface;
use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItems;
use Symfony\Component\HttpFoundation\Request;

final class Menu implements MenuInterface
{
    private MenuItems $items;
    private string $name;
    /** @var array<string, mixed> */
    private array $options;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(string $name, array $options, MenuItems $menuItems)
    {
        $this->name = $name;
        $this->items = $menuItems;
        $this->options = $options;
    }

    public function addItem(MenuItemInterface $item): void
    {
        $this->items->add($item);
    }

    public function getItems(): MenuItems
    {
        return $this->items;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function handleRequest(Request $request): void
    {
        $route = $request->get('_route');

        foreach ($this->getItems()->recursive() as $menuItem) {
            $options = $menuItem->getOptions();

            if ($options['route'] === $route) {
                $menuItem->makeActive();
            }
        }
    }
}
