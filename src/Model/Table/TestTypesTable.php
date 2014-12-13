<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TestTypesTable extends Table {

    public function initialize(array $config) {
        $this->hasMany('Tests');
    }

}
