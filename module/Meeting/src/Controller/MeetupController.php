<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Meeting\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MeetupController extends AbstractActionController
{
    protected $table; 

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $meeting = $this->table->fetchAll(); 

        foreach ($meeting as $meetup) {
            echo $meetup->getTitre() .' - '. $meetup->getDescription(); 

        }
        return new ViewModel();
    }

    public function addAction()
    {
        $form = new \Meeting\form\MeetupForm(); 

        $form->get('submit')->setAttribute('class', 'btn btn-success'); 

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return new ViewModel([
                'form' => $form
            ]);
        }

        $meetup = new \Meeting\Model\Meetup(); 

        $form->setData($request->getPost());
        $form->isValid();
       /* if (!$form->isValid()) {
            print_r($form->getData());
            exit("not valid");
        }*/

        $meetup->exchangeArray($form->getData()); 

        $this->table->saveMeetup($meetup); 

<<<<<<< HEAD
        $this->redirect()->toRoute('meeting', ['action' => 'list']);
=======
        return $this->redirect()->toRoute('meeting', [
            'controller' => 'meetup', 
            'action'     => 'list'
        ]);
>>>>>>> d4ead037208912edf2be980172f5a38bef579603
        
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        
        if ($id == 0) {
            exit('invalid id');
        }
        try {
            $meetup = $this->table->getMeetup($id);
        } catch(\Exception $e) {
            exit('Error with Meetup table');
        }
        $form = new \Meeting\Form\MeetupForm();

        
        $form->bind($meetup);

        $form->get('submit')->setAttribute('class', 'btn btn-success'); 

        $request = $this->getRequest();
        $request->isPost();
        //if not post request
        if (! $request->isPost()) {
            return new ViewModel([
                'form' => $form,
                'id' => $id
            ]);

        }

        $form->setData($request->getPost());
       
        $this->table->saveMeetup($meetup);
<<<<<<< HEAD
      
        $this->redirect()->toRoute('meeting', ['action' => 'list']);
=======
        return $this->redirect()->toRoute('meeting', [
          'controller' => 'meetup',
          'action' => 'list'
        ]);
>>>>>>> d4ead037208912edf2be980172f5a38bef579603
    }

    public function listAction()
    {
        return new ViewModel([
            'meetups' => $this->table->fetchAll()
        ]);
    }


    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        
        if ($id == 0) {
            exit('invalid id');
        }
        try {
            $meetup = $this->table->getMeetup($id);
        } catch(\Exception $e) {
            exit('Error with Meetup table');
        }


        $request = $this->getRequest();
   
        //if not post request
        if (! $request->isPost()) {
            return new ViewModel([
                'meeetup' => $meetup,
                'id' => $id
            ]);
        }

        $del = $request->getPost('del', 'No'); 

        if ($del == 'Yes') {
           //exit('supprimé');
           $id = (int) $meetup->getId(); 
           $this->table->deleteMeetup($id);
        }

        $this->redirect()->toRoute('meeting', ['action' => 'list']);

    }

}
