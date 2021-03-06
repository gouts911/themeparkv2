
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="areas index">
		
			<h2><?php echo __('Areas'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							
							<th><?php echo $this->Paginator->sort('area_name'); ?></th>
							<th><?php echo $this->Paginator->sort('area_description'); ?></th>
							<th><?php echo $this->Paginator->sort('park_id'); ?></th>
							<th><?php echo $this->Paginator->sort('user_id'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($areas as $area): ?>
	<tr>
		
		<td><?php echo h($area['Area']['area_name']); ?>&nbsp;</td>
		<td><?php echo h($area['Area']['area_description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($area['Park']['park_name'], array('controller' => 'parks', 'action' => 'view', $area['Park']['id'])); ?>
		</td>
		<td><?php  if ($this->Session->read('Auth.User.role') == "admin") { 
                echo h($area['User']['username']); }?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $area['Area']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php if( ($area['Area']['user_id'] == $this->Session->read('Auth.User.id')) || $this->Session->read('Auth.User.role') == "admin"){
                            echo $this->Html->link(__('Edit'), array('action' => 'edit', $area['Area']['id']), array('class' => 'btn btn-default btn-xs')); 
                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $area['Area']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $area['Area']['id'])); 
                        
                        }?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->