<?php 
	
namespace Meeting\Model; 

/**
* Meeting model
*/
class Meetup
{

	protected $id; 
	protected $titre; 
	protected $description; 
	protected $organisation; 
	protected $organisateur; 
	protected $dateDebut; 
	protected $dateFin; 

	
	public function exchangeArray(array $data)
	{
		$this->id = $data['id']; 
		$this->titre = $data['titre']; 
		$this->description = $data['description']; 
		$this->organisation = $data['organisation']; 
		$this->organisateur = $data['organisateur']; 
		$this->dateDebut = $data['dateDebut']; 
		$this->dateDebut = $data['dateDebut']; 
		$this->dateFin = $data['dateFin']; 
	}

	public function getArrayCopy()
	{
		return [
			'id'           => $this->id,
			'titre'        => $this->titre,
			'description'  => $this->description,
			'organisation' => $this->organisation,
			'organisateur' => $this->organisateur,
			'dateDebut'    => $this->dateDebut,
			'dateFin'      => $this->dateFin,
		];
	}

	public function getId()
	{
		return $this->id; 
	}

	public function getTitre()
	{
		return $this->titre; 
	}

	public function getDescription()
	{
		return $this->description; 
	}

	public function getOrganisation()
	{
		return $this->organisation; 
	}

	public function getOrganisateur()
	{
		return $this->organisateur; 
	}

	public function getDateDebut()
	{
		return $this->dateDebut; 
	}

	public function getDateFin()
	{
		return $this->dateFin; 
	}
}

 ?>