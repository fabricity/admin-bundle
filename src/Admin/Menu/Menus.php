<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

/**
 * @implements \IteratorAggregate<int, MenuInterface>
 */
final class Menus implements \IteratorAggregate
{
    /** @var MenuInterface[] */
    private array $menus = [];

    public function __construct(MenuInterface ...$menus)
    {
        foreach ($menus as $menu) {
            $this->menus[$menu->getName()] = $menu;
        }
    }

    /**
     * @return \Traversable<MenuInterface>
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->menus);
    }

    public function add(MenuInterface ...$menus): Menus
    {
        foreach ($menus as $menu) {
            $this->menus[$menu->getName()] = $menu;
        }

        return $this;
    }

    public function has(string $name): bool
    {
        return isset($this->menus[$name]);
    }

    public function get(string $name): MenuInterface
    {
        return $this->menus[$name];
    }

    public function remove(MenuInterface $item): Menus
    {
        $this->menus = \array_filter($this->menus, fn(MenuInterface $i) => $i !== $item);

        return $this;
    }
}