<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuoteItems Controller
 *
 * @property \App\Model\Table\QuoteItemsTable $QuoteItems
 */
class QuoteItemsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes', 'Inventories']
        ];
        $this->set('quoteItems', $this->paginate($this->QuoteItems));
        $this->set('_serialize', ['quoteItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Quote Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quoteItem = $this->QuoteItems->get($id, [
            'contain' => ['Quotes', 'Inventories']
        ]);
        $this->set('quoteItem', $quoteItem);
        $this->set('_serialize', ['quoteItem']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quoteItem = $this->QuoteItems->newEntity();
        if ($this->request->is('post')) {
            $quoteItem = $this->QuoteItems->patchEntity($quoteItem, $this->request->data);
            if ($this->QuoteItems->save($quoteItem)) {
                $this->Flash->success(__('The quote item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote item could not be saved. Please, try again.'));
            }
        }
        $quotes = $this->QuoteItems->Quotes->find('list', ['limit' => 200]);
        $inventories = $this->QuoteItems->Inventories->find('list', ['limit' => 200]);
        $this->set(compact('quoteItem', 'quotes', 'inventories'));
        $this->set('_serialize', ['quoteItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quoteItem = $this->QuoteItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quoteItem = $this->QuoteItems->patchEntity($quoteItem, $this->request->data);
            if ($this->QuoteItems->save($quoteItem)) {
                $this->Flash->success(__('The quote item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote item could not be saved. Please, try again.'));
            }
        }
        $quotes = $this->QuoteItems->Quotes->find('list', ['limit' => 200]);
        $inventories = $this->QuoteItems->Inventories->find('list', ['limit' => 200]);
        $this->set(compact('quoteItem', 'quotes', 'inventories'));
        $this->set('_serialize', ['quoteItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quoteItem = $this->QuoteItems->get($id);
        if ($this->QuoteItems->delete($quoteItem)) {
            $this->Flash->success(__('The quote item has been deleted.'));
        } else {
            $this->Flash->error(__('The quote item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
