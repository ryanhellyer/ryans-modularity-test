<?php

namespace RyansModularityTest\RyansModule;

use Inpsyde\Modularity\Module\ExecutableModule;
use Psr\Container\ContainerInterface;
use Inpsyde\Modularity\Module\ModuleClassNameIdTrait;

class RyansModule implements ExecutableModule
{
    use ModuleClassNameIdTrait;
    private ContainerInterface $container;

    /*
    THIS IS NOT NEEDED SINCE WE'RE USING ModuleClassNameIdTrait which provides this method automatically based on the class name.
    public function id(): string
    {
        return 'ryans-other-module';
    }
    */

    public function run(ContainerInterface $container): bool
    {
        $this->container = $container;

        add_filter('the_content', function(): string {
            $textFromOtherPlugin = 'Connector is not working yet!';

            /** @var ContentModifer $ryanSharedService **/
            $ryanSharedService = $this->container->get('ryan.shared.service');

            $textFromOtherPlugin = $ryanSharedService->text();

            return $textFromOtherPlugin;
        });

        return true;
    }
}
