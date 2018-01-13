<?php 
	
namespace Meeting\Form; 

use Zend\Form\Form; 
use Zend\Form\Element;

/**
* 	MeetupForm 
*/
class MeetupForm extends Form
{
	
	function __construct($name = null)
	{
		parent::__construct('meetup'); 

		$this->setAttribute('method', 'POST');

		$this->add([
			'name' => 'id', 
			'type' => 'hidden'
		]); 

		$this->add([
			'name' => 'titre', 
			'type' => 'text',
			'class' => 'form-control',
			'options' => [
				'label' => 'Titre du meetup '
			]
		]); 

		$this->add([
			'name' => 'organisateur', 
			'type' => 'Zend\Form\Element\Select',
			'class' => 'form-control',
			'options' => [
				'label' => 'Organisateur ',
				'value_options' => [
					'0' => '',
					'1' => 'Rachel',
					'2' => 'Toto'
				]
			]
		]); 

		$this->add([
			'name' => 'organisation', 
			'type' => 'Zend\Form\Element\Select',
			'class' => 'form-control',
			'options' => [
				'label' => 'Organisation ',
				'value_options' => [
					'0' => '',
					'1' => 'Zend Organisation',
					'2' => 'Une autre organisation'
				]
			]
		]); 

		$this->add([
			'name' => 'description', 
			'type' => 'text',
			'class' => 'form-control',
			'options' => [
				'label' => 'Petite description du meetup '
			]
		]); 

		$this->add([
			'name' => 'dateDebut', 
			'type' => 'Zend\Form\Element\Date',
			'class' => 'form-control',
			'options' => [
				'label' => 'Date de début ', 
				'format' => 'd-m-Y'
			],
			'attributes' => [
				//'min' => '18-01-2018',
				//'max' => '20-01-2019',
				'step' => 1
			]
		]); 

		$this->add([
			'name' => 'dateFin', 
			'type' => 'Zend\Form\Element\Date',
			'options' => [
				'label' => 'Date de fin ', 
				'format' => 'd-m-Y'
			],
			'attributes' => [
				//'min' => '18-01-2018',
				//'max' => '20-01-2019',
				'step' => 1
			]
		]); 

		$this->add([
			'name' => 'submit', 
			'type' => 'submit',
			'attributes' => [
				'value' => 'Enregister',
				'id'    => 'buttonSave'
			]
		]);

	}
}