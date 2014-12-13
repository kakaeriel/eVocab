<?php

namespace App\Controller;

class TestsController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function index() {
        $tests = $this->Tests->find()->contain(['TestVocabs', 'TestTypes']);
        $this->set('tests', $tests);
    }
    
    public function start() {
        
    }

}
