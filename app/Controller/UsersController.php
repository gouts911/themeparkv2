<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public function beforeFilter() {
        parent::beforeFilter();
        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        if ($this->Session->read('Auth.User.role') == "admin"){
            $this->Auth->allow('add', 'logout');
        }else if ($this->Session->read('Auth.User.role') == "proprietaire"){
            $this->Auth->allow( 'logout');
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) { 
                
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
            }
        }
    } 

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
    
    public function confirm(){
        
        if ($this->request->is('post')) {
                if ($this->Auth->login()) {
                    $id = $this->Auth->User('id');
                    
                    $this->User->id = $id;
                    $user = $this->User->find('first',array(
                       'conditions' =>array('id'=> $id) 
                    ));
                    
                    $user['User']['actif'] = true;
                    
                    if ($this->User->save($user)) {
                        $this->Session->setFlash(__('The user has been confirmed'), 'flash/success');
                        return $this->redirect($this->Auth->redirectUrl());
        
                    }
                    
                } else {
                    $this->Session->setFlash(__("Nom d'user ou mot de passe invalide, réessayer"));
                }
        }
    }
	public $components = array('Paginator');
    public function about(){
         
        
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$data = $this->request->data['User'];
                    if (!$data['image']['name']){
                        unset($data['image']);
                    }
                    if ($this->User->save($data)) {
                        $this->send_mail($data['email'], $data['username'], $data['password']);
			$this->Session->setFlash(__('The user has been saved'), 'flash/success');
			$this->redirect(array('action' => 'index'));
                    } else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
                    }
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$data = $this->request->data['User'];
                    if (!$data['image']['name']){
                        unset($data['image']);
                    }           
                    if ($this->User->save($data)) {
			$this->Session->setFlash(__('The user has been saved'), 'flash/success');
			$this->redirect(array('action' => 'index'));
                    } else {
			$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
                    }
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
        public function send_mail($receiver = null, $name = null, $pass = null) {
            $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/confirm/";
            $message = 'Hi,' . $name . ', Your Password is: ' . $pass;
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail('gmail');
            $email->from('fgauthier1985@gmail.com');
            $email->to($receiver);
            $email->subject('Mail Confirmation');
            $email->send($message . " " . $confirmation_link);
    }
}
