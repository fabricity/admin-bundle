<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\DependencyInjection;

use Fabricity\Bundle\AdminBundle\Layout\LayoutInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class FabricityAdminExtension extends Extension
{
    /**
     * @param array<mixed> $configs
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('admin.xml');

        $container
            ->registerForAutoconfiguration(LayoutInterface::class)
            ->addTag('fabricity.admin.layout')
        ;
    }
}