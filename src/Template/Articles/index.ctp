<div id="articlesBlock">
    <h1>Articles list</h1>
    <div class="btn"><?= $this->Html->link('Add Article', ['action' => 'add']) ?></div>
    <div class="articlesList">
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h2><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></h2>
                <span><?= $article->description; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>