<?php
App::uses('AppController', 'Controller');
/**
 * AttractionsTypes Controller
 *
 * @property AttractionsType $AttractionsType
 * @property PaginatorComponent $Paginator
 */
class AttractionsTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AttractionsType->recursive = 0;
		$this->set('attractionsTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttractionsType->exists($id)) {
			throw new NotFoundException(__('Invalid attractions type'));
		}
		$options = array('conditions' => array('AttractionsType.' . $this->AttractionsType->primaryKey => $id));
		$this->set('attractionsType', $this->AttractionsType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttractionsType->create();
			if ($this->AttractionsType->save($this->request->data)) {
				$this->Session->setFlash(__('The attractions type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attractions type could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$attractions = $this->AttractionsType->Attraction->find('list');
		$types = $this->AttractionsType->Type->find('list');
		$this->set(compact('attractions', 'types'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->AttractionsType->id = $id;
		if (!$this->AttractionsType->exists($id)) {
			throw new NotFoundException(__('Invalid attractions type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AttractionsType->save($this->request->data)) {
				$this->Session->setFlash(__('The attractions type has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attractions type could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('AttractionsType.' . $this->AttractionsType->primaryKey => $id));
			$this->request->data = $this->AttractionsType->find('first', $options);
		}
		$attractions = $this->AttractionsType->Attraction->find('list');
		$types = $this->AttractionsType->Type->find('list');
		$this->set(compact('attractions', 'types'));
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
		$this->AttractionsType->id = $id;
		if (!$this->AttractionsType->exists()) {
			throw new NotFoundException(__('Invalid attractions type'));
		}
		if ($this->AttractionsType->delete()) {
			$this->Session->setFlash(__('Attractions type deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Attractions type was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
