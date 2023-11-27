<?php

namespace RyansModularityTest\RyansModule;

use Inpsyde\Modularity\Module\ExecutableModule;
use Psr\Container\ContainerInterface;

class RyansModule implements ExecutableModule
{
    public function id(): string
    {
        return 'ryans-module';
    }

    public function run(ContainerInterface $container): bool
    {
        /** @var ContentModifer $ryanSharedService **/
        $ryanSharedService = $container->get('ryan.shared.service');

        $textFromOtherPlugin = $ryanSharedService->text();
        echo $textFromOtherPlugin;
        die;

        return true;
    }

    public function theContent()
    {
        $textFromOtherPlugin = 'Connector is not working yet!';

        /** @var ContentModifer $ryanSharedService **/
        $ryanSharedService = $this->container->get('ryan.shared.service');

        $textFromOtherPlugin = $ryanSharedService->text();
        echo $textFromOtherPlugin;
        die; // killing execution for testing purposes.

        return  $textFromOtherPlugin;
    }
}
