<?php 
    
namespace Meeting\Model; 

use Zend\Db\tableGateway\TableGatewayInterface;
/**
* 
*/
class MeetupTable
{

	protected $tableGateway; 

	public function __construct(TableGatewayInterface $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}

    public function fetchAll()
    {
    	return $this->tableGateway->select();
    }

    public function getMeetup(int $id)
    {
        $current = $this->tableGateway->select([
            'id' => $id
        ]);

        return $current->current();
    }

    public function deleteMeetup(int $id)
    {
    	$current = $this->tableGateway->delete([
    		'id' => $id
    	]);
    }

    public function saveMeetup(Meetup $meetup)
    {
    	$data = [
			'id'           => $meetup->getId(),
			'titre'        => $meetup->getTitre(),
			'description'  => $meetup->getDescription(),
			'organisation' => $meetup->getOrganisation(),
			'organisateur' => $meetup->getOrganisateur(),
			'dateDebut'    => $meetup->getDateDebut(),
			'dateFin'      => $meetup->getDateFin()
    	];

    	//for update 
    	if ($meetup->getId()) {
            $this->tableGateway->update($data, [
              'id' => $meetup->getId()
            ]);
                 
        //For insert new user
        } else {
            $this->tableGateway->insert($data);
               
        }

    }
}
