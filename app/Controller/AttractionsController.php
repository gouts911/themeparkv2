<?php
App::uses('AppController', 'Controller');
/**
 * Attractions Controller
 *
 * @property Attraction $Attraction
 * @property PaginatorComponent $Paginator
 */
class AttractionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
        public function beforeFilter() {
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "proprietaire"){
            $this->Auth->allow('add', 'delete','edit');
        }
        }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Attraction->recursive = 1;
		$this->set('attractions', $this->paginate());
	}

/**
 * view method
 
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Attraction->exists($id)) {
			throw new NotFoundException(__('Invalid attraction'));
		}
		$options = array('conditions' => array('Attraction.' . $this->Attraction->primaryKey => $id));
		$this->set('attraction', $this->Attraction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Attraction->create();
                        $this->request->data['Attraction']['user_id'] = $this->Auth->user('id');
			if ($this->Attraction->save($this->request->data)) {
				$this->Session->setFlash(__('The attraction has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attraction could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$areas = $this->Attraction->Area->find('list');
		$types = $this->Attraction->Type->find('list');
                
		$this->set(compact('areas', 'types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Attraction->id = $id;
		if (!$this->Attraction->exists($id)) {
			throw new NotFoundException(__('Invalid attraction'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Attraction->save($this->request->data)) {
				$this->Session->setFlash(__('The attraction has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attraction could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Attraction.' . $this->Attraction->primaryKey => $id));
			$this->request->data = $this->Attraction->find('first', $options);
		}
		$areas = $this->Attraction->Area->find('list');
		$types = $this->Attraction->Type->find('list');
                $users = $this->Attraction->User->find('list');
		$this->set(compact('areas', 'types','users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Attraction->id = $id;
		if (!$this->Attraction->exists()) {
			throw new NotFoundException(__('Invalid attraction'));
		}
		if ($this->Attraction->delete()) {
			$this->Session->setFlash(__('Attraction deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Attraction was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
