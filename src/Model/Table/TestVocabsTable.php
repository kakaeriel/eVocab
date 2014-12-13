<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TestVocabsTable extends Table {

    public function initialize(array $config) {
        $this->belongsTo('Tests');
        $this->belongsTo('Vocabs');
    }

}
