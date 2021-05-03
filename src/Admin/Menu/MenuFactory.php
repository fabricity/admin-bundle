<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle\Admin\Menu;

use Fabricity\Bundle\AdminBundle\Admin\Menu\Item\MenuItemFactory;
use Fabricity\Bundle\AdminBundle\Admin\Type\MenuTypeInterface;
use Fabricity\Bundle\AdminBundle\Admin\Type\TypeRegister;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class MenuFactory
{
    private TypeRegister $typeRegister;
    private MenuItemFactory $menuItemFactory;

    public function __construct(TypeRegister $typeRegister, MenuItemFactory $menuItemFactory)
    {
        $this->typeRegister = $typeRegister;
        $this->menuItemFactory = $menuItemFactory;
    }

    /**
     * @param array<string, mixed> $options
     */
    public function create(string $name, string $type, array $options): MenuInterface
    {
        /** @var MenuTypeInterface $resolvedType */
        $resolvedType = $this->typeRegister->resolve(TypeRegister::MENU, $type);

        $optionsResolver = $this->getOptionsResolver();
        $resolvedType->configureOptions($optionsResolver);
        $options = $optionsResolver->resolve($options);

        $builder = new MenuBuilder($name, $options, $this->menuItemFactory);
        $resolvedType->build($builder, $options);

        return $builder->getMenu();
    }

    private function getOptionsResolver(): OptionsResolver
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefaults([
                'default_icon' => null,
                'default_icon_class' => null,
                'label' => null,
                'label_translation_parameters' => [],
                'translation_domain' => 'admin'
            ])
            ->setAllowedTypes('default_icon', ['null', 'string'])
            ->setAllowedTypes('default_icon_class', ['null', 'string'])
            ->setAllowedTypes('label', ['null', 'string'])
            ->setAllowedTypes('translation_domain', ['null', 'string'])
            ->setAllowedTypes('label_translation_parameters', ['array'])
        ;

        return $resolver;
    }
}