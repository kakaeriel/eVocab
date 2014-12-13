<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class VocabsTable extends Table {

    public function initialize(array $config) {
        $this->hasMany('TestVocabs');
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->notEmpty('first_word')
                ->notEmpty('second_word')
                ->add('first_word', 'custom', [
                    'rule' => function ($value, $context) {
                if ($context['newRecord']) {
                    $vocab = $this->find()->where(['first_word' => $value])->orWhere(['second_word' => $value]);
                }
                else {
                    $vocab = $this->find()->where(['first_word' => $value])->orWhere(['second_word' => $value])->where(['id !=' => $context['data']['id']]);
                }
                if ($vocab->count() > 0) {
                    return FALSE;
                }
                return TRUE;
            }
                ])
                ->add('second_word', 'custom', [
                    'rule' => function ($value, $context) {
                if ($context['newRecord']) {
                    $vocab = $this->find()->where(['first_word' => $value])->orWhere(['second_word' => $value]);
                }
                else {
                    $vocab = $this->find()->where(['first_word' => $value])->orWhere(['second_word' => $value])->where(['id !=' => $context['data']['id']]);
                }
                if ($vocab->count() > 0) {
                    return FALSE;
                }
                return TRUE;
            }
        ]);

        return $validator;
    }

}
