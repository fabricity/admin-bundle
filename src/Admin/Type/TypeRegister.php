<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Type;

final class TypeRegister
{
    /** @var array<string, array<string, TypeInterface>> */
    private array $types = [];

    public const LAYOUT = 'layout';
    public const MENU = 'menu';

    private const TYPES = [
        self::LAYOUT => LayoutTypeInterface::class,
        self::MENU => MenuTypeInterface::class,
    ];

    public function resolve(string $typeName, string $class): TypeInterface
    {
        $resolved = $this->types[$typeName][$class] ?? null;

        if (null === $resolved) {
            throw new \RuntimeException(\sprintf('Could not resolve %s for %s', $typeName, $class));
        }

        return $resolved;
    }

    public function register(TypeInterface $type): void
    {
        foreach (self::TYPES as $typeName => $class) {
            if (!$type instanceof $class) {
                continue;
            }

            $this->types[$typeName][\get_class($type)] = $type;
        }
    }
}
