
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Attractions Type'), array('action' => 'edit', $attractionsType['AttractionsType']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Attractions Type'), array('action' => 'delete', $attractionsType['AttractionsType']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $attractionsType['AttractionsType']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Attractions Types'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Attractions Type'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Attractions'), array('controller' => 'attractions', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Attraction'), array('controller' => 'attractions', 'action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Type'), array('controller' => 'types', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="attractionsTypes view">

			<h2><?php  echo __('Attractions Type'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($attractionsType['AttractionsType']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Attraction'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attractionsType['Attraction']['id'], array('controller' => 'attractions', 'action' => 'view', $attractionsType['Attraction']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Type'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attractionsType['Type']['id'], array('controller' => 'types', 'action' => 'view', $attractionsType['Type']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
