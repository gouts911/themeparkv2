<?php
App::uses('AppModel', 'Model');
/**
 * AttractionType Model
 *
 * @property Attractions $Attractions
 * @property Types $Types
 */
class AttractionType extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Attractions' => array(
			'className' => 'Attractions',
			'foreignKey' => 'attractions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Types' => array(
			'className' => 'Types',
			'foreignKey' => 'types_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
