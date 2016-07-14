<h1>Edit News</h1>
<?php
    echo $this->Form->create($news);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->button(__('Save News'));
    echo $this->Form->end();
?>