<?php

namespace Virtal\Bundle\DisqusBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class DisqusHelper extends Helper
{
    protected $templating;
    protected $disqus_shortname;
    protected $disqus_developer;

    public function __construct(EngineInterface $templating, $disqus_shortname = null, $disqus_developer = null)
    {
        $this->templating  = $templating;
        $this->disqus_shortname  = $disqus_shortname;
        $this->disqus_developer  = $disqus_developer;
    }

    /**
     * Returns javascript necessary for initializing Disqus comments
     *
     * @param array  $parameters An array of parameters for the template
     * @param string $name       A template name
     *
     * @return string javascript
     */
    public function comments($parameters = array(), $name = null)
    {
        $name = $name ?: 'VirtalDisqusBundle::comments.html.php';
        return $this->templating->render($name, $parameters + array(
            'disqus_shortname' => $this->disqus_shortname,
            'disqus_developer' => (int)$this->disqus_developer,
        ));
    }

    /**
     * Returns javascript necessary for initializing Disqus comment count links
     *
     * @param array  $parameters An array of parameters for the template
     * @param string $name       A template name
     *
     * @return string javascript
     */
    public function commentCount($parameters = array(), $name = null)
    {
        $name = $name ?: 'VirtalDisqusBundle::commentCount.html.php';
        return $this->templating->render($name, $parameters + array(
            'disqus_shortname' => $this->disqus_shortname,
            'disqus_developer' => (int)$this->disqus_developer,
        ));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return 'disqus';
    }
}
