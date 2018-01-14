<?php
namespace Meetup\Service;

use Meetup\Entity\Meetup;
use Meetup\Entity\Organisation;
use Meetup\Entity\User;
use Zend\Filter\StaticFilter;

// The MeetupManager service is responsible for adding new Meetups.
class MeetupManager 
{
	/**
	* Doctrine entity manager.
	* @var Doctrine\ORM\EntityManager
	*/
	private $entityManager;

	// Constructor is used to inject dependencies into the service.
	public function __construct($entityManager)
	{
		$this->entityManager = $entityManager;
	}

	// This method adds a new Meetup.
	public function addNewMeetup($data) 
	{
	// Create new Meetup entity.
		$meetup = new Meetup();
		$meetup->setTitre($data['titre']);
		$meetup->setDescription($data['description']);
		$meetup->setOrganisation($data['organisation']);
		$meetup->setOrganisateur($data['organisateur']);
		$meetup->setDatedebut($data['dateDebut']);
		$meetup->setDatefin($data['dateFin']);

	// Add the entity to entity manager.
		$this->entityManager->persist($meetup);

	// Apply changes to database.
		$this->entityManager->flush();
	}

}