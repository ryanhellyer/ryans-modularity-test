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
        add_filter('the_content', [$this, 'theContent']);

        return true;
    }

    public function theContent()
    {
        return '<p>Ryans\' Inpsyde Modularity test plugin is working!</p>';
        // Would also like to use forUseInOtherPlugin() from the other plugin here.
    }
}
