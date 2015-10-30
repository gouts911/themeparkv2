<?php
App::uses('AppController', 'Controller');
/**
 * AttractionTypes Controller
 *
 * @property AttractionType $AttractionType
 * @property PaginatorComponent $Paginator
 */
class AttractionTypesController extends AppController {

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
		$this->AttractionType->recursive = 0;
		$this->set('attractionTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AttractionType->exists($id)) {
			throw new NotFoundException(__('Invalid attraction type'));
		}
		$options = array('conditions' => array('AttractionType.' . $this->AttractionType->primaryKey => $id));
		$this->set('attractionType', $this->AttractionType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AttractionType->create();
			if ($this->AttractionType->save($this->request->data)) {
				$this->Session->setFlash(__('The attraction type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attraction type could not be saved. Please, try again.'));
			}
		}
		$attractions = $this->AttractionType->Attraction->find('list');
		$types = $this->AttractionType->Type->find('list');
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
		if (!$this->AttractionType->exists($id)) {
			throw new NotFoundException(__('Invalid attraction type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AttractionType->save($this->request->data)) {
				$this->Session->setFlash(__('The attraction type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attraction type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AttractionType.' . $this->AttractionType->primaryKey => $id));
			$this->request->data = $this->AttractionType->find('first', $options);
		}
		$attractions = $this->AttractionType->Attraction->find('list');
		$types = $this->AttractionType->Type->find('list');
		$this->set(compact('attractions', 'types'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AttractionType->id = $id;
		if (!$this->AttractionType->exists()) {
			throw new NotFoundException(__('Invalid attraction type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AttractionType->delete()) {
			$this->Session->setFlash(__('The attraction type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attraction type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
