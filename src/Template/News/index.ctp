<h1>News</h1>
<div class="row">
<div class="container">
			  <p>List all news</p>
			  <div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th>Title</th>
					<th>Body</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Remove</th>
				  </tr>
				</thead>
				
				<?php if(!empty($news)): foreach($news as $newsFor):
							?>
							<tbody>
							<tr>
								<td><a href="javascript:void(0);"><?php echo $newsFor->title; ?></a></td>
								<td><p><?php echo $newsFor->body; ?></p> </td>
								<td><?= $newsFor->created->format(DATE_RFC850) ?></td>
								<td><?= $this->Html->link('Edit', ['action' => 'edit', $newsFor->id]) ?></td>
								<td><?= $this->Form->postLink(
										'Delete',
										['action' => 'delete', $newsFor->id],
										['confirm' => 'Are you sure?'])
									?></td>
							</tr>
							</tbody>
							<?php
						  endforeach;	else: ?>
						<p class="no-record">No post(s) found......</p>
						<?php endif; ?>
		</table>
	</div>
	</div>
	<div class="paginator">
	<?php
	    echo $this->Paginator->counter(
	            'Showing {{start}} to {{end}} of total {{count}}'
	    );
	    ?>
    <nav>
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?> 
        </ul>
    </nav>
        <p><?= $this->Paginator->counter() ?></p>
	</div> 
</div>