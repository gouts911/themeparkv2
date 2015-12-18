<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Subcategory $Subcategory
 */
class State extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Park' => array(
			'className' => 'Park',
			'foreignKey' => 'state_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
        public function getByCountry($country_id = null) {
    /*$country_id = $this->request->data['Park']['country_id'];
 
    $states = $this->State->find('list', array(
    'conditions' => array('State.country_id' => $country_id),
    'recursive' => -1
    ));
 
    $this->set('states',$states);
    $this->layout = 'ajax';*/
    return $this->find('list', array(
            'conditions' => array('State.country_id' => $country_id),
            'recursive' => -1
        ));
}

}

