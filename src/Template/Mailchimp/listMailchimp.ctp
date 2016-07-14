<h1>All Campaigns</h1>
<div class="row">
<div class="container">
			  <p>Lists already created on Mailchimp Account</p>
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
								<td><span class="glyphicon glyphicon-edit"></span> </td>
								<td><span class="glyphicon glyphicon-remove"></span></td>
							</tr>
							</tbody>
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