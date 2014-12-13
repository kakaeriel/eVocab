<?php

namespace App\Controller;

class VocabsController extends AppController {

    public $paginate = [
        'limit' => 20,
        'order' => [
            'Vocabs.ts' => 'desc'
        ]
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        $this->set('vocabs', $this->paginate());
    }

    public function add() {
        $vocab = $this->Vocabs->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Vocabs->save($vocab)) {
                $this->Flash->success(__('Your vocab has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your vocab.'));
        }
        $this->set('vocab', $vocab);
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid vocab'));
        }

        $vocab = $this->Vocabs->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Vocabs->patchEntity($vocab, $this->request->data);
            if ($this->Vocabs->save($vocab)) {
                $this->Flash->success(__('Your vocab has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your vocab.'));
        }

        $this->set('vocab', $vocab);
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $vocab = $this->Vocabs->get($id);
        if ($this->Vocabs->delete($vocab)) {
            $this->Flash->success(__('The vocab with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function search() {
        if ($this->request->is(['get']) && isset($this->request->query['word'])) {
            $word = ($this->request->query['word']);
            $vocabs = $this->Vocabs->find()->where(['first_word LIKE' => '%' . $word . '%'])->orWhere(['second_word LIKE' => '%' . $word . '%']);
            $this->set('vocabs', $vocabs);
        }

        $this->render('index');
    }

}
