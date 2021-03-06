<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link(__("Theme Parks"), array(
                                            'controller' => 'parks',
                                            'action' => 'index'),
                                            array('class' => 'navbar-brand')); ?>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <?php if ($this->Session->check('Auth.User')) {
                    echo $this->Html->link(__("Hello ") . " ". $this->Session->read('Auth.User.username'),
                                            array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')));
                    echo "</li><li>";
                    if ($this->Session->read('Auth.User.role') == "admin") {
                        echo $this->Html->link("[".__("add user",true)."]", array(
                            'controller' => 'users',
                            'action' => 'add'));
                        echo "</li><li>";
                    }
                    echo $this->Html->link(__("[Logout]"), array(
                        'controller' => 'users',
                        'action' => 'logout'));
                    
                } else {
                    echo $this->Html->link(__("[Login]"
                            ), array(
                        'controller' => 'users',
                        'action' => 'login')
                    );
                    
                }
                ?>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php echo $this->I18n->flagSwitcher(array(
                       'class' => 'languages',
                       'id' => 'language-switcher'
                        ));
                ?>
                </ul>
            </li>
            <li>
                <?php echo $this->Html->link(__("About"
                            ), array(
                        'controller' => 'users',
                        'action' => 'about')
                    );?>
            </li>
            
        </ul><!-- /.nav navbar-nav -->
        
    </div><!-- /.navbar-collapse -->
    
</nav><!-- /.navbar navbar-default -->

<?php echo $this->Html->link($this->Html->image('Kids_At_Theme_Park_clip_art2.svg', array('width' => '100', 'height' => '100')),
                       array(
                    'controller' => 'users',
                    'action' => 'about'),
                       array('escape' => false , 'class' => 'navbar-brand')); ?>
