<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Error\Debugger;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use Cake\Network\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('logout');
    }

    public function isAuthorized($user)
    {

        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['dashboard','add','index'])) {
            return true;
        }
// All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $users = $this->Users->get($id);
        if ($users->user_id == $user['id']) {
            return true;
        }
//        $this->Flash->error(__('You do not have sufficient privileges. Contact your administrator'));
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id, [
            'contain' => ['Profiles']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data);exit;
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->created_by = $this->Auth->user('id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->request->session()->write('Users.data', $user);
                return $this->redirect(['controller' => 'profiles', 'action' => 'add']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function dashboard()
    {
        $this->layout = 'admin';
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Profiles']
        ]);
        $this->set('user',$user);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
//                $level = $this->Users->find()
//                    ->select(['level'])
//                    ->where(['active_fg'=>1])
//                    ->andWhere(['id'=>$this->Auth->user('id')])->toArray()
//                ;
//
//                $userLevel = $level[0]['level'];
                if ($this->Auth->user('level') == 1) {
                    $this->Flash->set(__('Registration Incomplete. Please Complete your registration'));
                    return $this->redirect(['controller' => 'profiles', 'action' => 'add']);
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function forgotpwd(){
        $this->loadModel('Profile');

        $show_form = true;

        if ($this->request->is('post')){

            $email = $this->request->data('email');
            if (isset($this->request->data['email'])) {
                $user = $this->Users->find()
                    ->select(['id'])
                    ->where(['email =' => $email]);


                if (!empty($user)) {
                        $show_form = false;
                    //@TODO Use Event Listeners
                        $pass_code = join('_', array(User::encrypt(date('Y-m-d H:i:s')), User::encrypt($email)));

                        if ($this->sendPwdResetEmail($email, $pass_code)) {
                            $this->Flash->set(__('Check your email for the password reset details '));
                        }
                     else {
                        $this->Flash->set(__('The Email address does not exist'));
                    }
                } else {
                    $this->Flash->set(__('The credentials entered do not match'));
                }
            } else {
                $this->Flash->set(__('Invalid credentials entered'));
            }
        }

        $this->set('show_form', $show_form);

    }

    private function sendPwdResetEmail($to, $pass_code){
        $message = 'Click the following link to reset your password '. $this->request->domain().Router::url(['controller'=>'users','action'=>'resetpwd',$pass_code]);
//        debug($message);
//        debug($this->request->domain());
        $email = new Email('gmail');
        $email->from(['nnanna217@gmail.com' => 'KFA Rentals'])
            ->to($to)
            ->subject('KFA RENTALS: Email Reset')
            ->send($message);

        return $email;
    }
}
