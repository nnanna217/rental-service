<?php
namespace App\Model\Table;

use App\Model\Entity\Profile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class ProfilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('profiles');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');
            
        $validator
            ->allowEmpty('middlename');
            
        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');
            
        $validator
            ->allowEmpty('address');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');
            
        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmpty('phone_number');
            
        $validator
            ->allowEmpty('next_of_kin');
            
        $validator
            ->add('dob', 'valid', ['rule' => 'datetime'])
            ->requirePresence('dob', 'create')
            ->notEmpty('dob');
            
        $validator
            ->add('active_fg', 'valid', ['rule' => 'numeric'])
            ->requirePresence('active_fg', 'create')
            ->notEmpty('active_fg');
            
        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('created_by');
            
        $validator
            ->add('modified_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('modified_by');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
