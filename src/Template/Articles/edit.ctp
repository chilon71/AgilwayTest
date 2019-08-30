<h1>Edit Article</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('title', ['required' => true]);
    echo $this->Form->control('description', ['rows' => '2', 'required' => true]);
    echo $this->Form->control('body', ['rows' => '5', 'required' => true]);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>