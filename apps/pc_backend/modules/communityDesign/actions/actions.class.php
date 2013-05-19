<?php

class communityDesignActions extends sfActions
{
  public function executeEdit(sfWebRequest $request)
  {
    $this->community = Doctrine_Core::getTable('Community')->find($request['id']);
    $this->forward404If(!$this->community);

    $this->form = new CommunityDesignForm($this->community);

    if ($request->isMethod(sfRequest::POST))
    {
      $this->form->bind($request[$this->form->getName()]);

      if ($this->form->isValid())
      {
        $this->form->save();

        $this->getUser()->setFlash('notice', 'デザインを変更しました。', false);
      }
    }
  }
}
