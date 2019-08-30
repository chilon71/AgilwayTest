<?php

namespace App\Controller;

use App\Controller\AppController;

class ArticlesController extends AppController {

	public function initialize() {
		parent::initialize();

		$this->loadComponent('Paginator');
		$this->loadComponent('Flash');
	}

	public function index() {
		$articles = $this->Articles->find();
		$this->set(compact('articles'));
	}

	public function view($slug = null) {
		$article = $this->Articles->findBySlug($slug)->firstOrFail();
		$this->set(compact('article'));
	}

	public function add() {
		$article = $this->Articles->newEntity();
		if ($this->request->is('post')) {
			$article = $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
		}
		$this->set('article', $article);
	}

	public function edit($slug) {
	    $article = $this->Articles->findBySlug($slug)->firstOrFail();
	    if ($this->request->is(['post', 'put'])) {
	        $this->Articles->patchEntity($article, $this->request->getData());
	        if ($this->Articles->save($article)) {
	            $this->Flash->success(__('Update success'));
	            return $this->redirect(['action' => 'index']);
	        }
	        $this->Flash->error(__('Error'));
	    }

	    $this->set('article', $article);
	}

	public function delete($id) {
		$article = $this->Articles->get($id);
		$result  = $this->Articles->delete($article);
		if ($result) {
			$this->Flash->success(__('Your delete article.'));
	        return $this->redirect(['action' => 'index']);
		}
		$this->Flash->error(__('Error'));
		return $this->redirect(['action' => 'index']);
		echo '<pre>';
		var_dump($result);
		exit;
	}
}