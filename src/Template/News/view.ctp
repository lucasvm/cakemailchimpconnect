<!-- File: /src/Template/News/view.ctp -->
<h1><?= h($news->title) ?></h1>
<p><?= h($news->body) ?></p>
<p><small>Created: <?= $news->created->format(DATE_RFC850) ?></small></p>