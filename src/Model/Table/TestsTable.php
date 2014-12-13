<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TestsTable extends Table {

    public function initialize(array $config) {
        $this->hasMany('TestVocabs');
        $this->belongsTo('TestTypes');
    }

}
