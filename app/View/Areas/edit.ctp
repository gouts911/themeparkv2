
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<?php echo $this->element('menu/side_menu'); ?>
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
        <?php
            $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array('inline' => false));
            $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('inline' => false));
  

        //load file for this view to work on 'autocomplete' field
            $this->Html->script('View/Areas/index', array('inline' => false));
        ?>
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Area'); ?></h2>

		<div class="areas form">
		
			<?php echo $this->Form->create('Area', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('area_name', array('class' => 'form-control',
                                            'id' => 'autocomplete')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('area_description', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('park_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						
					</div><!-- .form-group -->

					<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->