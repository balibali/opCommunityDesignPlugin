<?php

class CommunityDesignForm extends BaseForm
{
  protected $community;
  protected $configKeys = array(
    'design_css',
    'design_header_html',
  );

  public function __construct(Community $community, $options = array(), $CSRFSecret = null)
  {
    $defaults = array();
    foreach ($this->configKeys as $key)
    {
      $defaults[$key] = $community->getConfig($key);
    }

    $this->community = $community;

    parent::__construct($defaults, $options, $CSRFSecret);
  }

  public function configure()
  {
    $this->setWidget('design_css', new sfWidgetFormTextarea(array(), array('rows' => 10, 'cols' => 60)));
    $this->getWidgetSchema()->setLabel('design_css', 'CSS');
    $this->getWidgetSchema()->setHelp('design_css', 'head 内の末尾に挿入されるCSSです。');
    $this->setValidator('design_css', new sfValidatorString());

    $this->setWidget('design_header_html', new sfWidgetFormTextarea(array(), array('rows' => 10, 'cols' => 60)));
    $this->getWidgetSchema()->setLabel('design_header_html', 'ヘッダーHTML');
    $this->getWidgetSchema()->setHelp('design_header_html', 'ローカルナビゲーションのすぐ下の部分に挿入されるHTMLです。');
    $this->setValidator('design_header_html', new sfValidatorString());

    $this->getWidgetSchema()->setNameFormat('community_design[%s]');
  }

  public function save()
  {
    foreach ($this->configKeys as $key)
    {
      $this->community->setConfig($key, $this->getValue($key));
    }
  }
}
