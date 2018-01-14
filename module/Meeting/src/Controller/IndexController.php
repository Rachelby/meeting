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
    
    /**
     * Post manager.
     * @var Application\Service\PostManager 
     */
    private $meetupManager;
    
    /**
     * Constructor is used for injecting dependencies into the controller.
     */
    public function __construct($entityManager, $meetupManager) 
    {
        $this->entityManager = $entityManager;
        $this->meetupManager = $meetupManager;
    }

    /**
     * This action displays the "New Post" page. The page contains 
     * a form allowing to enter post title, content and tags. When 
     * the user clicks the Submit button, a new Post entity will 
     * be created.
     */
    public function addAction() 
    {     
        // Create the form.
        $form = new PostForm();
        
        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {
            
            // Get POST data.
            $data = $this->params()->fromPost();
            
            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {
                                
                // Get validated form data.
                $data = $form->getData();
                
                // Use post manager service to add new post to database.                
                $this->meetupManager->addNewMeetup($data);
                
                // Redirect the user to "index" page.
               return $this->redirect()->toRoute('meeting', [
                    'controller' => 'meetup', 
                    'action'     => 'list'
                ]);
            }
        }
        
        // Render the view template.
        return new ViewModel([
            'form' => $form
        ]);
    }   
}