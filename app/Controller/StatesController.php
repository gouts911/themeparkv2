<?php
App::uses('AppController', 'Controller');
 
class StatesController extends AppController {
 
public function getByCountry() {
    $country_id = $this->request->data['Park']['country_id'];
 
$states = $this->State->find('list', array(
'conditions' => array('State.country_id' => $country_id),
'recursive' => -1
));
 
$this->set('states',$states);
$this->layout = 'ajax';
}
}
