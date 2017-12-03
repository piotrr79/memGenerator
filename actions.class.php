<?php

/**
 * dementi actions.
 *
 * @package    dementujemy24
 * @subpackage dementi
 * @author     kontakt@websolutio.pl
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dementiActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', '1')->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }

  public function executeShow(sfWebRequest $request)
  {
    // get item id from request 
    $d_id = $request->getParameter('id');
    //querry
    $this->dementi = Doctrine_Core::getTable('Dementi')->createQuery('a')->from('Dementi d')->innerJoin('d.sfGuardUser u' )->where('id = ?', $d_id)
    ->fetchOne(); //important but ->fetchOne(!!!)
    //just in case from orygin executeShow action
    $this->forward404Unless($this->dementi);
  }
  
  public function executePolityka(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', 1)->andWhere('category_id = ?', 1)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }

  public function executeSport(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', '1')->andWhere('category_id = ?', 2)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }
  
  public function executeRozrywka(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', '1')->andWhere('category_id = ?', 3)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }
  
  public function executeLudzie(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', '1')->andWhere('typed_id = ?', 1)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }
  
  public function executeInstytucje(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', '1')->andWhere('typed_id = ?', 2)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      
  }
  
  public function executePoczekalnia(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('publish = ?', 0)->innerJoin('d.sfGuardUser u' )->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();   
  }  
  public function executeSearch(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager('Dementi', '10');
    $this->pager->setQuery(Doctrine::getTable('Dementi')->createQuery('a')->from('Dementi d')->where('d.title LIKE ?', array($request->getParameter('text')))->orderBy('created_at DESC'));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  } 
}
