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
        $this->Auth->allow('add');
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
        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->newEntity();

//        if ($this->request->is('post')) {
//
//            $user = $usersTable->patchEntity($user, $this->request->data['Users']);
//            if ($usersTable->save($user)) {
//                $profile = $this->Profiles->newEntity();
//                $profile->user_id = $user->id;
//                $profile = $this->Profiles->patchEntity($profile, $this->request->data);
//                if ($this->Profiles->save($profile)) {
//                    $this->Flash->success(__('The profile has been saved.'));
//                    return $this->redirect(['action' => 'index']);
//                } else {
//                    $this->Flash->error(__('The profile could not be saved. Please, try again.'));
//                }
//            }
//        }

        $user = $this->Profiles->Users->newEntity();
        $profile = $this->Profiles->newEntity();
        if ($this->request->is('post')) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
//            Debugger::dump($this->request->data);
//            exit;
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Profiles->patchEntity($profile, $this->request->data);
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
