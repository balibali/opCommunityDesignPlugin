<?php

class opCommunityDesignPluginConfiguration extends sfPluginConfiguration
{
  protected $css;
  protected $headerHtml;

  public function initialize()
  {
    if (sfConfig::get('sf_app') === 'pc_frontend')
    {
      $this->dispatcher->connect('op_action.post_execute', array($this, 'setDesign'));
    }
  }

  public function setDesign(sfEvent $event)
  {
    $module = $event['moduleName'];
    $navType = sfConfig::get('sf_nav_type', sfConfig::get('mod_'.$module.'_default_nav', 'default'));

    if ('community' === $navType)
    {
      $actionInstance = $event['actionInstance'];

      $navId = sfConfig::get('sf_nav_id', $actionInstance->getRequestParameter('id'));
      $community = Doctrine_Core::getTable('Community')->find($navId);

      if ($community)
      {
        $this->css        = $community->getConfig('design_css');
        $this->headerHtml = $community->getConfig('design_header_html');

        if ($this->css)
        {
          $dispatcher = $actionInstance->getContext()->getEventDispatcher();
          $dispatcher->connect('response.filter_content', array($this, 'appendCss'));
        }

        if ($this->headerHtml)
        {
          $dispatcher = $actionInstance->getContext()->getEventDispatcher();
          $dispatcher->connect('response.filter_content', array($this, 'appendHeaderHtml'));
        }
      }
    }
  }

  public function appendCss(sfEvent $event, $value)
  {
    $html = sprintf('<style type="text/css">%s</style>', $this->css);
    $value = preg_replace('/<\/head>/', $html.'\0', $value, 1);

    return $value;
  }

  public function appendHeaderHtml(sfEvent $event, $value)
  {
    $html = sprintf('<div class="communityHeader">%s</div>', $this->headerHtml);
    $value = preg_replace('/<div(\s[^>]+)* class="Layout">/', $html.'\0', $value, 1);

    return $value;
  }
}
