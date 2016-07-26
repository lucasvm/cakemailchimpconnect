<h1>Add News</h1> 

<?php echo $this->Form->create($news); 
// just added the categories input 

echo $this->Form->input('categories'); 

echo $this->Form->input('title'); 

echo $this->Form->input('body', ['rows' => '3']); 

echo $this->Form->input('status', array('type' => 'checkbox', 'label' => __('Status', true)));

echo $this->Form->button(__('Save Article')); 

echo $this->Form->end();
