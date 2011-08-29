<?php

namespace Virtal\Bundle\DisqusBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VirtalDisqusExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
        
        $container->setParameter('virtal_disqus.disqus_shortname', null);
        if (isset($config['disqus_shortname'])) {
            $container->setParameter('virtal_disqus.disqus_shortname', $config['disqus_shortname']);
        }

        if (isset($config['disqus_developer'])) {
            $container->setParameter('virtal_disqus.disqus_developer', $config['disqus_developer']);
        }

    }
}
