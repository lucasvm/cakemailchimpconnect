<h1>Edit Category</h1>
<?php
    echo $this->Form->create($categories);
    echo $this->Form->input('name');
    echo $this->Form->input('description', ['rows' => '3']);
    echo $this->Form->button(__('Save Category'));
    echo $this->Form->end();
?>