<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu\Item;

/**
 * @implements \IteratorAggregate<MenuItemInterface>
 */
final class MenuItems implements \IteratorAggregate, \Countable
{
    /** @var MenuItemInterface[] */
    private array $items = [];

    public function __construct(MenuItemInterface ...$items)
    {
        foreach ($items as $item) {
            $this->items[$item->getName()] = $item;
        }
    }

    public function count(): int
    {
        return \count($this->items);
    }

    /**
     * @return \Traversable<MenuItemInterface>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    public function add(MenuItemInterface ...$items): MenuItems
    {
        foreach ($items as $item) {
            $this->items[$item->getName()] = $item;
        }

        return $this;
    }

    public function has(string $name): bool
    {
        return isset($this->items[$name]);
    }

    public function get(string $name): MenuItemInterface
    {
        return $this->items[$name];
    }

    public function remove(MenuItemInterface $item): MenuItems
    {
        $this->items = \array_filter($this->items, fn(MenuItemInterface $i) => $i !== $item);

        return $this;
    }
}