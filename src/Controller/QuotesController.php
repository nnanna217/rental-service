<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Quotes Controller
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 */
class QuotesController extends AppController
{

    public function isAuthorized($user)
    {

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        $action = $this->request->params['action'];
        // The add and index actions are always allowed.
        if (in_array($action, ['index','add','edit','view','add2'])) {
            return true;
        }
// All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
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
            'contain' => ['Customers']
        ];
        $this->set('quotes', $this->paginate($this->Quotes));
        $this->set('_serialize', ['quotes']);
    }

    public function add2(){
        $this->layout = 'admin';
        $quote = $this->Quotes->newEntity();
        if ($this->request->is('post')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->data);
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Quotes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('quote', 'customers'));
        $this->set('_serialize', ['quote']);

    }

    public function inventory_list(){
        $this->layout = 'admin';
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Customers', 'QuoteItems']
        ]);
        $this->set('quote', $quote);
        $this->set('_serialize', ['quote']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $quote = $this->Quotes->newEntity();

        $quote_shipment = TableRegistry::get('QuoteShipments');
//        $billingInfo = $quote_shipment->newEntit
        $quote = $this->Quotes->newEntity();
        if ($this->request->is('post')) {
//            debug($this->request->data());exit;
            $quote = $this->Quotes->patchEntity($quote, $this->request->data);
            if ($this->Quotes->save($quote)) {
                $quoteid = $quote->id;
                $this->Flash->success(__('The quote has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Quotes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('quote', 'customers'));
        $this->set('_serialize', ['quote']);
    }

    public function test(){
        $customers = TableRegistry::get('Customers');
        $this->paginate = [
            'contain' => []
        ];
        $this->set('customers', $this->paginate($customers));
        $this->set('_serialize', ['customers']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->data);
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('The quote has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quote could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Quotes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('quote', 'customers'));
        $this->set('_serialize', ['quote']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quotes->get($id);
        if ($this->Quotes->delete($quote)) {
            $this->Flash->success(__('The quote has been deleted.'));
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
