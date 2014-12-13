<?php

namespace App\View\Cell;

use Cake\View\Cell;

class NavigationCell extends Cell {

    public function display($active = 1) {
        $this->loadModel('Navigations');
        $navigations = $this->Navigations->find('threaded')
                ->where(['is_active' => $active]);
        $this->set('navigations', $navigations);
    }

}
