<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Profiles
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        $this->hasOne('Profiles', [
            'foreignKey' => 'user_id'
        ]);
//        $this->hasMany('Customers', [
//            'foreignKey' => 'created_by'
//        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
//        $validator
//            ->add('id', 'valid', ['rule' => 'numeric'])
//            ->allowEmpty('id', 'create');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->notEmpty('email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'A password is required');

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList',
                ['rule' => ['inList', ['admin', 'user']],
                    'message' => 'Please enter a valid role']
            );

        $validator->add('password', 'custom', ['rule' => function ($value, $context) {
            if (isset($context->data['confirm_password']) && $value
                != $context->data['confirm_password']
            ) {
                return false;
            }
            return true;
        }, 'message' => "Your password does not match your confirm password. Please try again", 'on' =>
        ['create', 'update'], 'allowEmpty' => true]);


//        $validator
//            ->add('active_fg', 'valid', ['rule' => 'numeric'])
//            ->allowEmpty('active_fg');

        return $validator;
    }

//    public function validationResetpassword(Validator $validator){
//        $validator
//            ->requirePresence('password')
//            ->notEmpty('password','Please enter Password')
//            ->add('confirm_password', [
//                'compare' => [
//                    'rule' => ['compareWith','password'],
//                    'message' => 'Confirm Password does not match with Password.'
//                ]])
//            ->requirePresence('confirm_password')
//            ->notEmpty('confirm_password','Please enter Confirm Password')
//        ;
//
//        return $validator;
//    }

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
        return $rules;
    }
}
