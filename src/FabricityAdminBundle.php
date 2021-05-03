<?php

declare(strict_types=1);

namespace Fabricity\Bundle\AdminBundle;

use Fabricity\Bundle\AdminBundle\DependencyInjection\Compiler\TypeRegisterPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class FabricityAdminBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new TypeRegisterPass());
    }
}
