<?php

namespace Tamago\LinkedinImporterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class CCCLinkedinImporterExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('apiconfig.yml');

        // Add user's params to our param array
        $params = $container->getParameter('ccc_linkedin_importer');
        foreach ($config as $key => $param) {
            $params[$key] = $param;
        }

        // Update in the container
        $container->setParameter('ccc_linkedin_importer', $params);
    }

}
