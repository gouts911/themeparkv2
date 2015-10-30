
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="areas view">

			<h2><?php  echo __('Area'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Area Name'); ?></strong></td>
		<td>
			<?php echo h($area['Area']['area_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Area Description'); ?></strong></td>
		<td>
			<?php echo h($area['Area']['area_description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Park'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($area['Park']['park_name'], array('controller' => 'parks', 'action' => 'view', $area['Park']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User Id'); ?></strong></td>
		<td><?php  if ($this->Session->read('Auth.User.role') == "admin") { 
                echo h($area['User']['username']); }?>&nbsp;</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Attractions'); ?></h3>
				
				<?php if (!empty($area['Attraction'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											
		<th><?php echo __('Attraction Name'); ?></th>
		<th><?php echo __('Attraction Description'); ?></th>
		<th><?php echo __('Admission Price'); ?></th>
		
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($area['Attraction'] as $attraction): ?>
		<tr>
			
			<td><?php echo $attraction['attraction_name']; ?></td>
			<td><?php echo $attraction['attraction_description']; ?></td>
			<td><?php echo $attraction['admission_price']; ?></td>
			
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attractions', 'action' => 'view', $attraction['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php 
                        if(     ($attraction['user_id'] == $this->Session->read('Auth.User.id')) || ($this->Session->read('Auth.User.role') == "admin")){
                                     echo $this->Html->link(__('Edit'), array('controller' => 'attractions', 'action' => 'edit', $attraction['id']), array('class' => 'btn btn-default btn-xs')); 
				echo $this->Form->postLink(__('Delete'), array('controller' => 'attractions', 'action' => 'delete', $attraction['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $attraction['id'])); 
                        }?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Attraction'), array('controller' => 'attractions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
