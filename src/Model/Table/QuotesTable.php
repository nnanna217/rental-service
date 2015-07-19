<?php
namespace App\Model\Table;

use App\Model\Entity\Quote;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $QuoteItems
 */
class QuotesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('quotes');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('QuoteItems', [
            'foreignKey' => 'quote_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->add('transport_cost', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('transport_cost');
            
        $validator
            ->add('mode_of_receipt', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('mode_of_receipt');
            
        $validator
            ->add('date_of_event', 'valid', ['rule' => 'date'])
            ->allowEmpty('date_of_event');
            
        $validator
            ->add('total', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('total');
            
        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('created_by');
            
        $validator
            ->add('modified_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('modified_by');
            
        $validator
            ->allowEmpty('subject');
            
        $validator
            ->add('date_of_setup', 'valid', ['rule' => 'date'])
            ->allowEmpty('date_of_setup');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        return $rules;
    }
}
