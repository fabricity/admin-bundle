<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

final class MenuItem implements MenuItemInterface
{
    private MenuItems $items;
    private string $name;
    /** @var array<string, mixed> */
    private array $options;
    private ?MenuItem $parent = null;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(string $name, array $options)
    {
        $this->name = $name;
        $this->options = $options;

        $items = new MenuItems();
        $items->setParent($this);
        $this->items = $items;
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

    public function getParent(): MenuItem
    {
        return $this->parent;
    }

    public function hasParent(): bool
    {
        return null !== $this->parent;
    }

    public function makeActive(): void
    {
        $this->options['active'] = true;

        if ($this->hasParent()) {
            $this->getParent()->makeActive();
        }
    }

    public function setParent(?MenuItem $parent): void
    {
        $this->parent = $parent;
    }
}
