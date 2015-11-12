
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="parks view">

			<h2><?php  echo __('Park'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td><?php  if ($this->Session->read('Auth.User.role') == "admin") { 
                echo h($park['User']['username']); }?>&nbsp;</td>
</tr><tr>		<td><strong><?php echo __('Park Name'); ?></strong></td>
		<td>
			<?php echo h($park['Park']['park_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Park Location'); ?></strong></td>
		<td>
			<?php echo h($park['State']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Park Email'); ?></strong></td>
		<td>
			<?php echo h($park['Park']['park_email']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Park Website'); ?></strong></td>
		<td>
			<?php echo h($park['Park']['park_website']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Areas'); ?></h3>
				
				<?php if (!empty($park['Area'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											
		<th><?php echo __('Area Name'); ?></th>
		<th><?php echo __('Area Description'); ?></th>
		
		
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($park['Area'] as $area): ?>
		<tr>
			
			<td><?php echo $area['area_name']; ?></td>
			<td><?php echo $area['area_description']; ?></td>
			
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'areas', 'action' => 'view', $area['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                <?php 
                        if(     ($area['user_id'] == $this->Session->read('Auth.User.id')) || ($this->Session->read('Auth.User.role') == "admin")){
				 echo $this->Html->link(__('Edit'), array('controller' => 'areas', 'action' => 'edit', $area['id']), array('class' => 'btn btn-default btn-xs')); 
				echo $this->Form->postLink(__('Delete'), array('controller' => 'areas', 'action' => 'delete', $area['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $area['id'])); 
                        }?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Area'), array('controller' => 'areas', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
