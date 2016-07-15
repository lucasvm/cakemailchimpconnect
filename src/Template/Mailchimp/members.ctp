<h1>Members</h1>
<div class="row">
<div class="container">
<p><a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal" >Add New Member</a></p>
<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th>Email</th>
					<th>Status</th>
					<th>Delete</th>
				  </tr>
				</thead>
				<?php foreach($members->members as $member):
					?>
					<tbody>
							<tr>
								<td><?php echo $member->email_address; ?> </td>
								<td><?php echo $member->status; ?> </td>
								<td><?php echo $this->Html->link(
								'Delete',
								array('controller' => 'mailchimp', 'action' => 'deletemember', $member->id, $listid),
								array('confirm' => 'Do you want really to delete this element?','class' => 'btn btn-danger btn-sm active')); ?></td>
							</tr>
					</tbody>
					<?php
					  endforeach;	
				?>
				</table>
</div>
</div>
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Member</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Post', array('url' => '/mailchimp/addmember')); ?>
				  <div class="form-group">
					<?php echo $this->Form->input('memberemail', [
						'label' => 'Email',
					]); ?>
				  </div>
				  <div class="form-group">
					<?php echo $this->Form->input('listid', [
						'label' => 'List Id',
						'value' => $listid,
						'readonly' => 'readonly',
						'type' => 'hidden'
					]); ?>
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
            </div>
        </div>
    </div>
</div>