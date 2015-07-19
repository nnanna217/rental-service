<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuoteShipments Controller
 *
 * @property \App\Model\Table\QuoteShipmentsTable $QuoteShipments
 */
class QuoteShipmentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes']
        ];
        $this->set('quoteShipments', $this->paginate($this->QuoteShipments));
        $this->set('_serialize', ['quoteShipments']);
    }

    /**
     * View method
     *
     * @param string|null $id Quote Shipment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quoteShipment = $this->QuoteShipments->get($id, [
            'contain' => ['Quotes']
        ]);
        $this->set('quoteShipment', $quoteShipment);
        $this->set('_serialize', ['quoteShipment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quoteShipment = $this->QuoteShipments->newEntity();
        if ($this->request->is('post')) {
            $quoteShipment = $this->QuoteShipments->patchEntity($quoteShipment, $this->request->data);
            if ($this->QuoteShipments->save($quoteShipment)) {
                $this->Flash->success(__('The quote shipment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote shipment could not be saved. Please, try again.'));
            }
        }
        $quotes = $this->QuoteShipments->Quotes->find('list', ['limit' => 200]);
        $this->set(compact('quoteShipment', 'quotes'));
        $this->set('_serialize', ['quoteShipment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote Shipment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quoteShipment = $this->QuoteShipments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quoteShipment = $this->QuoteShipments->patchEntity($quoteShipment, $this->request->data);
            if ($this->QuoteShipments->save($quoteShipment)) {
                $this->Flash->success(__('The quote shipment has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote shipment could not be saved. Please, try again.'));
            }
        }
        $quotes = $this->QuoteShipments->Quotes->find('list', ['limit' => 200]);
        $this->set(compact('quoteShipment', 'quotes'));
        $this->set('_serialize', ['quoteShipment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote Shipment id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quoteShipment = $this->QuoteShipments->get($id);
        if ($this->QuoteShipments->delete($quoteShipment)) {
            $this->Flash->success(__('The quote shipment has been deleted.'));
        } else {
            $this->Flash->error(__('The quote shipment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
