<h1>All Campaigns</h1>
<div class="row">
<div class="container">
			  <p>Lists already created on Mailchimp Account</p>
			  <p><a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal" >Create New List</a></p>
			  <div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th>#</th>
					<th>Name</th>
					<th>Edit</th>
					<th>Delete</th>
				  </tr>
				</thead>
				
				<?php
				foreach($getLists as $apub) {
						  foreach($apub as $list) {
							?>
							<tbody>
							<tr>
								<td><?php echo $list->id; ?> </td>
								<td><?php echo $list->name; ?></td>
								<td>
								<a href="#editModal<?php echo $list->id; ?>" data-sfid='"<?php echo $list->id; ?>"' data-toggle="modal" class="btn btn-primary btn-info"><span class="glyphicon glyphicon-edit"></span></a>
									<!--Yor Edit Modal Goes Here-->
									<div id="editModal<?php echo $list->id; ?>" class="modal hide fade in" role="dialog" ria-labelledby="myModalLabel" aria-hidden="true">
									 <div class="modal-header">
										<a class="close" data-dismiss="modal">×</a>
										<h3>Edit Customer Details</h3>
									</div>
								</td>
								<td><?php echo $this->Html->link(
								'Delete',
								array('controller' => 'mailchimp', 'action' => 'deletelist', $list->id),
								array('class' => 'btn btn-primary btn-danger'),
								array('span' => 'glyphicon glyphicon-floppy-remove'),
								array(),
								"Are you sure you wish to delete this recipe?"
							); ?></td>
							</tr>
							</tbody>
							<div id="editModal<?php echo $list->id; ?>" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Edit List <?php echo $list->name; ?></h4>
									</div>
									<div class="modal-body">
										<?php echo $this->Form->create('Post', array('url' => '/mailchimp/editlist')); ?>
										  <div class="form-group">
											<?php echo $this->Form->input('listname', array('default'=>$list->name)); ?>
											<?php echo $this->Form->hidden('id', array('default'=>$list->id)); ?>
										  </div>
										  <button type="submit" class="btn btn-default">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<?php
							
						  }
						  break;	
						
						}
					
						?>
						
							
								
					  
						  
					<?php
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
                <h4 class="modal-title">Create New List</h4>
            </div>
            <div class="modal-body">
                <?php echo $this->Form->create('Post', array('url' => '/mailchimp/add')); ?>
				  <div class="form-group">
					<?php echo $this->Form->input('listname'); ?>
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
				</form>
            </div>
        </div>
    </div>
</div>


