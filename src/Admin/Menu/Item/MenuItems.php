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
    private ?MenuItemInterface $parent = null;

    public function __construct(MenuItemInterface ...$items)
    {
        foreach ($items as $item) {
            $this->items[$item->getName()] = $item;
        }
    }

    public function add(MenuItemInterface ...$items): MenuItems
    {
        foreach ($items as $item) {
            if ($this->hasParent()) {
                $item->setParent($this->getParent());
            }

            $this->items[$item->getName()] = $item;
        }

        return $this;
    }

    public function count(): int
    {
        return \count($this->items);
    }

    public function get(string $name): MenuItemInterface
    {
        return $this->items[$name];
    }

    /**
     * @return \Traversable<MenuItemInterface>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    public function getParent(): MenuItemInterface
    {
        return $this->parent;
    }

    public function has(string $name): bool
    {
        return isset($this->items[$name]);
    }

    public function hasParent(): bool
    {
        return null !== $this->parent;
    }

    /**
     * @return iterable<MenuItem>
     */
    public function recursive(): iterable
    {
        foreach ($this->items as $item) {
            yield $item;
            yield from $item->getItems()->recursive();
        }
    }

    public function remove(MenuItemInterface $item): MenuItems
    {
        $this->items = \array_filter($this->items, fn (MenuItemInterface $i) => $i !== $item);

        return $this;
    }

    public function setParent(?MenuItemInterface $parent): void
    {
        $this->parent = $parent;
    }
}
