<?php

namespace WhiteOctober\BreadcrumbsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root("white_october_breadcrumbs", 'array');
        $rootNode
            ->children()
                ->scalarNode('homepage')->defaultValue(null)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
