<h1>Add Categories</h1> 

<?php echo $this->Form->create($categories); 
// just added the categories input 

echo $this->Form->input('name'); 

echo $this->Form->input('description', ['rows' => '3']);

echo $this->Form->button(__('Create')); 

echo $this->Form->end();
