<?php
App::uses('AppModel', 'Model');
/**
 * Type Model
 *
 * @property Attraction $Attraction
 */
class Type extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
    public $displayField = 'type_description';
	public $validate = array(
		'type_description' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Attraction' => array(
			'className' => 'Attraction',
			'joinTable' => 'attractions_types',
			'foreignKey' => 'type_id',
			'associationForeignKey' => 'attraction_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
