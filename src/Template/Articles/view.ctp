<h1><?= $article->title ?></h1>
<p><?= $article->body ?></p>
<div class="btn edit"><p><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></p></div>
<div class="btn remove"><p><?= $this->Html->link('Delete', ['action' => 'delete', $article->id]) ?></p></div>