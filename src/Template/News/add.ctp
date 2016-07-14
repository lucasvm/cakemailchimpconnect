<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add News') ?></legend>
		<?= //let's load jquery libs from google
		  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
		  $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));
		?>
		<?= $this->Html->script('tiny_mce4/jquery.tinymce.min'); ?>
        <?= $this->Form->input('title') ?>
        <?= $this->Form->input('body', array('type' => 'textarea', 'escape' => false, 'name' => 'elm4', 'id' => 'elm4')); ?>
		<?= $this->Form->input('status', array('type' => 'checkbox', 'label' => __('Status', true))); ?>
		<?= $this->Form->input('ad_photos[]', ['type' => 'file', 'multiple' => 'true', 'label' => 'Add Some Photos']); ?>
		<?= $this->Form->input('Categories', ['value' => 'categories', 'label' => 'Categories']); ?>
    </fieldset>
<?= $this->Form->button(__('Create')); ?>
<?= $this->Form->end() ?>
</div>
<script>
jQuery.tinyMCE.init({
  selector: 'textarea',  // change this value according to your HTML
  auto_focus: 'element1'
});
</script>