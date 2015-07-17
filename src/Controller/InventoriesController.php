<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventories Controller
 *
 * @property \App\Model\Table\InventoriesTable $Inventories
 */
class InventoriesController extends AppController
{


    public function isAuthorized($user)
    {

        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['add','index','view','edit'])) {
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
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $this->set('inventories', $this->paginate($this->Inventories));
        $this->set('_serialize', ['inventories']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventories->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('inventory', $inventory);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventories->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Inventories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'categories'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Inventories->Categories->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'categories'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventory id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventories->get($id);
        if ($this->Inventories->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
