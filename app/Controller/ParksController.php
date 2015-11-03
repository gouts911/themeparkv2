<?php
App::uses('AppController', 'Controller');
/**
 * Parks Controller
 *
 * @property Park $Park
 * @property PaginatorComponent $Paginator
 */
class ParksController extends AppController {

    public $helpers = array('Js');
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
		$this->Park->recursive = 0;
		$this->set('parks', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Park->exists($id)) {
			throw new NotFoundException(__('Invalid park'));
		}
		$options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
		$this->set('park', $this->Park->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Park->create();
                        $this->request->data['Park']['user_id'] = $this->Auth->user('id');
			if ($this->Park->save($this->request->data)) {
				$this->Session->setFlash(__('The park has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The park could not be saved. Please, try again.'), 'flash/error');
			}
		}
                $countries = $this ->Park->State->Country->find('list');
                
                $states = array('choisir etat/province');
		$users = $this->Park->User->find('list');
		$this->set(compact('users','countries','states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Park->id = $id;
		if (!$this->Park->exists($id)) {
			throw new NotFoundException(__('Invalid park'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Park->save($this->request->data)) {
				$this->Session->setFlash(__('The park has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The park could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Park.' . $this->Park->primaryKey => $id));
			$this->request->data = $this->Park->find('first', $options);
		}
		$users = $this->Park->User->find('list');
                $states = $this->Park->State->find('list');
		$this->set(compact('users','states'));
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
		$this->Park->id = $id;
		if (!$this->Park->exists()) {
			throw new NotFoundException(__('Invalid park'));
		}
		if ($this->Park->delete()) {
			$this->Session->setFlash(__('Park deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Park was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
