<?php

namespace Meeting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Meeting\Entity\Meetup;

class IndexController extends AbstractActionController
{
	/**
   * Entity manager.
   * @var Doctrine\ORM\EntityManager
   */
    private $entityManager;

    public function __construct($entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction() 
    {
    // Get recent meetups
        $meetups = $this->entityManager->getRepository(\Entity\Meetup::class)
        ->findBy(['id'==1]);
        
    // Render the view template
        return new ViewModel([
          'meetups' => $meetups
      ]);
    }
}
