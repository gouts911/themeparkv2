
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="attractions view">

			<h2><?php  echo __('Attraction'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Attraction Name'); ?></strong></td>
		<td>
			<?php echo h($attraction['Attraction']['attraction_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Attraction Description'); ?></strong></td>
		<td>
			<?php echo h($attraction['Attraction']['attraction_description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Admission Price'); ?></strong></td>
		<td>
			<?php echo h($attraction['Attraction']['admission_price']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Area'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($attraction['Area']['area_name'], array('controller' => 'areas', 'action' => 'view', $attraction['Area']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User Id'); ?></strong></td>
		<td><?php  if ($this->Session->read('Auth.User.role') == "admin") { 
                echo h($attraction['User']['username']); }?>&nbsp;</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Types'); ?></h3>
				
				<?php if (!empty($attraction['Type'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											
		<th><?php echo __('Type Description'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($attraction['Type'] as $type): ?>
		<tr>
			
			<td><?php echo $type['type_description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'types', 'action' => 'view', $type['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php 
                        if(      ($this->Session->read('Auth.User.role') == "admin")){
                                     echo $this->Html->link(__('Edit'), array('controller' => 'types', 'action' => 'edit', $type['id']), array('class' => 'btn btn-default btn-xs')); 
				 echo $this->Form->postLink(__('Delete'), array('controller' => 'types', 'action' => 'delete', $type['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $type['id'])); 
                        }?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Type'), array('controller' => 'types', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
