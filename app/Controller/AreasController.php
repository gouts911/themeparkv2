<?php
App::uses('AppController', 'Controller');
/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 */
class AreasController extends AppController {

/**
 * Components
 *
 * @var array
 */
        
    
	public $components = array('Paginator','RequestHandler');
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
	if ($this->request->is('ajax')) {
            
                            $term = $this->request->query('term');
                            $listareas = $this->Area->getAreaNames($term);
                            
                            $this->set(compact('listareas'));
                            $this->set('_serialize', 'listareas');
                }	
            
            $this->Area->recursive = 0;
		$this->set('areas', $this->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
		$this->set('area', $this->Area->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
           
                
		if ($this->request->is('post')) {
                    
			$this->Area->create();
                        $this->request->data['Area']['user_id'] = $this->Auth->user('id');
                        
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash(__('The area has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The area could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$parks = $this->Area->Park->find('list');
		$this->set(compact('parks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Area->id = $id;
		if (!$this->Area->exists($id)) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash(__('The area has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The area could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
			$this->request->data = $this->Area->find('first', $options);
		}
		$parks = $this->Area->Park->find('list');
                $users = $this->Area->User->find('list');
		$this->set(compact('parks','users'));
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
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid area'));
		}
		if ($this->Area->delete()) {
			$this->Session->setFlash(__('Area deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Area was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
