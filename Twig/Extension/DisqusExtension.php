<?php

namespace Virtal\Bundle\DisqusBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

class DisqusExtension extends \Twig_Extension
{
    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns a list of global functions to add to the existing list.
     *
     * @return array An array of global functions
     */
    public function getFunctions()
    {
        return array(
            'disqus_comments' => new \Twig_Function_Method($this, 'renderComments', array('is_safe' => array('html'))),
            'disqus_comment_count' => new \Twig_Function_Method($this, 'renderCommentCount', array('is_safe' => array('html'))),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'disqus';
    }

    public function renderComments($parameters = array(), $name = null)
    {
        return $this->container->get('virtal_disqus.helper')->comments($parameters, $name ?: 'VirtalDisqusBundle::comments.html.twig');
    }

    public function renderCommentCount($parameters = array(), $name = null)
    {
        return $this->container->get('virtal_disqus.helper')->commentCount($parameters, $name ?: 'VirtalDisqusBundle::commentCount.html.twig');
    }
}
