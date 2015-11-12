
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3">

        <div class="actions">

            <?php echo $this->element('menu/side_menu'); ?>

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="users view">

            <form action="" method="post">
                <input type="submit" value="Send confirm email" />
                <input type="hidden" name="button_pressed" value="1" />
            </form>

            <?php
            if (isset($_POST['button_pressed'])) {
                $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/confirm/";
                $message = 'Hi,' . $user['User']['username'] . ', Your Password is: ' . $user['User']['password'];
                App::uses('CakeEmail', 'Network/Email');
                $email = new CakeEmail('gmail');
                $email->from('fgauthier1985@gmail.com');
                $email->to($user['User']['email']);
                $email->subject('Mail Confirmation');
                $email->send($message . " " . $confirmation_link);
                echo 'Email Sent.';
            }
            ?>
            <h2><?php echo __('User'); ?></h2>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>		<td><strong><?php echo __('Avatar'); ?></strong></td>

                            <td>
                                <?php if ($user['User']['image']) echo $this->Html->image($user['User']['image'], array('escape' => false)); ?>
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Username'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['username']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Password'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['password']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Role'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['role']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['email']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['created']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo h($user['User']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->

        </div><!-- /.view -->


        <div class="related">

            <h3><?php echo __('Related Parks'); ?></h3>

            <?php if (!empty($user['Park'])): ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo __('Id'); ?></th>
                                <th><?php echo __('User Id'); ?></th>
                                <th><?php echo __('Park Name'); ?></th>
                                <th><?php echo __('Park Location'); ?></th>
                                <th><?php echo __('Park Email'); ?></th>
                                <th><?php echo __('Park Website'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($user['Park'] as $park):
                                ?>
                                <tr>
                                    <td><?php echo $park['id']; ?></td>
                                    <td><?php echo $park['user_id']; ?></td>
                                    <td><?php echo $park['park_name']; ?></td>
                                    <td><?php echo $park['park_location']; ?></td>
                                    <td><?php echo $park['park_email']; ?></td>
                                    <td><?php echo $park['park_website']; ?></td>
                                    <td class="actions">
                                        <?php echo $this->Html->link(__('View'), array('controller' => 'parks', 'action' => 'view', $park['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'parks', 'action' => 'edit', $park['id']), array('class' => 'btn btn-default btn-xs')); ?>
                                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parks', 'action' => 'delete', $park['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $park['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><!-- /.table table-striped table-bordered -->
                </div><!-- /.table-responsive -->

            <?php endif; ?>


            <div class="actions">
                <?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Park'), array('controller' => 'parks', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->

        </div><!-- /.related -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
<?php

function send_mail($receiver = null, $name = null, $pass = null) {
    $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/confirm/";
    $message = 'Hi,' . $name . ', Your Password is: ' . $pass;
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail('gmail');
    $email->from('fgauthier1985@gmail.com');
    $email->to($receiver);
    $email->subject('Mail Confirmation');
    $email->send($message . " " . $confirmation_link);
}
?>