<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\DependencyInjection\Compiler;

use Fabricity\Bundle\AdminBundle\Admin\Type\TypeInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

final class TypeRegisterPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('fabricity_bundle_admin.admin_type.type_register')) {
            return;
        }

        $definition = $container->findDefinition('fabricity_bundle_admin.admin_type.type_register');

        $this->register($definition, $container->findTaggedServiceIds('fabricity.admin.type.layout'));
        $this->register($definition, $container->findTaggedServiceIds('fabricity.admin.type.menu'));
    }

    /**
     * @param iterable<TypeInterface> $types
     */
    private function register(Definition $definition, iterable $types): void
    {
        foreach ($types as $id => $tags) {
            $definition->addMethodCall('register', [new Reference($id)]);
        }
    }
}