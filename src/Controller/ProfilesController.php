<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Error\Debugger;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Profiles Controller
 *
 * @property \App\Model\Table\ProfilesTable $Profiles
 * @property \App\Model\Table\UsersTable $Users
 */
class ProfilesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index');
    }

    public function isAuthorized($user)
    {

        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add'])) {
            return true;
        }

        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $profiles = $this->Profiles->get($id);
        if ($profiles->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('profiles', $this->paginate($this->Profiles));
        $this->set('_serialize', ['profiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('profile', $profile);
        $this->set('_serialize', ['profile']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
//        $user = $usersTable->newEntity();
        $profile = $this->Profiles->newEntity();
        if ($this->request->is('post')) {
            $session = $this->request->session()->read('Users.data');
            $profile->user_id = (isset($session->id)) ? $profile->user_id = $session->id : $this->Auth->user('id');
            $profile->created_by =  $this->Auth->user('id');
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
            if ($this->Profiles->save($profile)) {
                /**
                 * @TODO Move to Event Listener
                 */
                $usersTable = TableRegistry::get('Users');
                $users = $usersTable->get($profile->user_id);
                $users->level = 2;
//
                if ($usersTable->save($users)) {
                    $this->Flash->success(__('The profile has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }


        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profile = $this->Profiles->get($id, [
            'contain' => []
        ]);
        $session = $this->request->session()->read('Users.data');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
            $profile->user_id = (isset($session->id)) ? $profile->user_id = $session->id : $this->Auth->user('id');
            $profile->modified_by =  $this->Auth->user('id');
            if ($this->Profiles->save($profile)) {
                $this->Flash->success(__('The profile has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profile could not be saved. Please, try again.'));
            }
        }
        $users = $this->Profiles->Users->find('list', ['limit' => 200]);
        $this->set(compact('profile', 'users'));
        $this->set('_serialize', ['profile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profile id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profile = $this->Profiles->get($id);
        if ($this->Profiles->delete($profile)) {
            $this->Flash->success(__('The profile has been deleted.'));
        } else {
            $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
