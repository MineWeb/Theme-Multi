<header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand home" href="<?= $this->Html->url('/') ?>">
          <?php
          if(isset($theme_config['logo']) && $theme_config['logo']) {
            //echo $this->Html->image($theme_config['logo']);
            echo '<img src="'.$theme_config['logo'].'">';
          } else {
            echo '<p>'.$website_name.'</p>';
          }
          ?>
        </a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll"><a href="<?= $this->Html->url('/') ?>"><?= $Lang->get('GLOBAL__HOME') ?></a></li>
                    <?php
                    if(!empty($nav)) {
                      $i = 0;
                      foreach ($nav as $key => $value) { ?>
                        <?php if(empty($value['Navbar']['submenu'])) { ?>
                          <li class="scroll">
                              <a href="<?= $value['Navbar']['url'] ?>"><span class="white hcolor">
							  <?php if(!empty($value['Navbar']['icon'])): ?>
								<i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
							  <?php endif; ?>
							  <?= $value['Navbar']['name'] ?>
							  </span></a>
                          </li>
                        <?php } else { ?>
                          <li class="dropdown">
                            <a id="menu-dropdown" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="white hcolor">
							<?php if(!empty($value['Navbar']['icon'])): ?>
								<i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
							<?php endif; ?>
							<?= $value['Navbar']['name'] ?> 
							<span class="caret"></span></span></a>
                            <ul class="dropdown-menu" role="menu">
                            <?php
                            $submenu = json_decode($value['Navbar']['submenu']);
                            foreach ($submenu as $k => $v) {
                            ?>
                              <li><a style="transition: 0.3s linear;" href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>><?= rawurldecode(str_replace('+', ' ', $k)) ?></a></li>
                            <?php } ?>
                            </ul>
                          </li>
                        <?php } ?>
                        <?php
                          $i++;
                        }
                      } ?>
                    <ul class="nav navbar-nav ">
                        <li class="scroll ">
                            <?php if(!$isConnected) { ?>
                                <a href="#" data-toggle="dropdown" role="dropdown"  aria-expanded="false">Espace membre<span class="caret "></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                                        <li><a href="/login"><span class="hidden-xs text-uppercase "> <?= $Lang->get('USER__LOGIN')?></span></a></li>
                                        <li><a href="/register"><span class="hidden-xs text-uppercase "> <?= $Lang->get('USER__REGISTER')?></span></a></li>
                                    <?php } else { ?>
                                        <li><a href="#login" data-toggle="modal"><span class="hidden-xs text-uppercase "> <?= $Lang->get('USER__LOGIN')?></span></a></li>
                                        <li><a href="#register" data-toggle="modal"><span class="hidden-xs text-uppercase "> <?= $Lang->get('USER__REGISTER')?></span></a></li>
                                    <?php } ?>
                                    
                                </ul>
                            <?php } else { ?>
                                <a href="#" class="dropdown-toggle"   data-toggle="dropdown" role="button" aria-expanded="false"><?= $user['pseudo'] ?> <img src="API/get_head_skin/<?= $user['pseudo'] ?>/16"> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-toggle="modal"><i class="fa fa-flag"></i> <?= $Lang->get('NOTIFICATIONS__LIST') ?></a><span class="notification-indicator"></span></li>
                                    <li><a href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>" data-toggle="modal"><i class="fa fa-user"></i> <?= $Lang->get('USER__PROFILE') ?></a></li>
                                    <li><a href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>"><i class="fa fa-power-off"></i> <?= $Lang->get('USER__LOGOUT') ?></a></li>
                                    <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                                        <li><a href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i class="fa fa-cogs"></i> <?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
