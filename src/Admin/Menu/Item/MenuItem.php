<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

final class MenuItem implements MenuItemInterface
{
    private string $name;
    private MenuItems $items;
    /** @var array<string, mixed> */
    private array $options;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(string $name, array $options)
    {
        $this->name = $name;
        $this->items = new MenuItems();
        $this->options = $options;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getItems(): MenuItems
    {
        return $this->items;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
