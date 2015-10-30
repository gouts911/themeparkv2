<nav class="nav-pills" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- /.navbar-toggle -->
		
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            
            <ul class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Park <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Parks',true), array('controller' => 'parks', 'action' => 'index'), array('class' => '')); ?></li>
				<?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "proprietaire") {
                                    echo '<li class="list-group-item">' . $this->Html->link(__('New Park'), array('controller' => 'parks', 'action' => 'add'), array('class' => '')) . '</li>';
                                }
                                    ?>
                </ul>
            </ul>
            <ul class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Areas <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index'), array('class' => '')); ?></li> 
				<?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "proprietaire") {
                                    echo '<li class="list-group-item">' . $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add'), array('class' => '')) . '</li>'; 
                                }
                                    ?>
                </ul>
            </ul>
            <ul class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Attraction <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Attractions'), array('controller' => 'attractions', 'action' => 'index'), array('class' => '')); ?></li> 
				<?php if ($this->Session->read('Auth.User.role') == "admin" || $this->Session->read('Auth.User.role') == "proprietaire") {
                                    echo '<li class="list-group-item">' . $this->Html->link(__('New Attraction'), array('controller' => 'attractions', 'action' => 'add'), array('class' => '')) . '</li>'; 
                                }
                                    ?>
                </ul>
            </ul>
            <ul class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Type <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="list-group-item"><?php echo $this->Html->link(__('List Types'), array('controller' => 'types', 'action' => 'index'), array('class' => '')); ?></li> 
				<?php if ($this->Session->read('Auth.User.role') == "admin") {
                                    echo '<li class="list-group-item">' . $this->Html->link(__('New Types'), array('controller' => 'types', 'action' => 'add'), array('class' => '')) . '</li>'; 
                                }
                                    ?>
                </ul>
            </ul>
            <?php if ($this->Session->read('Auth.User.role') == "admin") {
            echo '<ul class="dropdown">';
                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu User <b class="caret"></b></a>';
                echo '<ul class="dropdown-menu">';
                echo '<li class="list-group-item">'. $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index'), array('class' => '')).'</li>'; 
				                       echo '<li class="list-group-item">' . $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')) . '</li></ul>'; 
                                
                                    
                 }?>
            
                     
        </ul><!-- /.nav navbar-nav -->
    </div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->