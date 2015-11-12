<div class="users form">
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please confirm your username and password'); ?>
        </legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            //$user = $this->User->find()
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Confirm')); ?>
</div>
