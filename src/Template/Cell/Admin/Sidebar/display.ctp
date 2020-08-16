<!-- sidebar display -->
<?php
$c_name = $this->request->getParam('controller');
$a_name = $this->request->getParam('action');
?>
<nav class="mt-2">
    <ul class="sidebar-menu nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <?php foreach ($menus as $menu) : ?>
            <li class="nav-item has-treeview <?php if (($c_name == $menu->controller && $a_name != 'home') || ($menu->controller == "Homes" && $a_name == 'home')) : ?>menu-open<?php endif; ?>">
                <a href="#" class="nav-link <?php if ($c_name == $menu->controller && $a_name != 'home') : ?>active<?php endif; ?>">
                    <i class="nav-icon icon-<?= lcfirst("$menu->controller"); ?>"></i>
                    <p>
                        <?= $menu->alias; ?>
                        <i class="icon-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <?php if ($menu->controller !== 'Homes') : ?>
                        <li class="nav-item ">
                            <a class="nav-link icon-lis <?php if ($c_name == $menu->controller && $a_name == 'index') : ?> active <?php endif; ?>" href="<?= $this->Url->build(['controller' => $menu->controller, 'action' => 'index']); ?>">
                                <i class="nav-icon icon-list"></i>
                                <p><?= "index " . $menu->alias; ?></p>
                            </a>
                        </li>
                    <?php elseif ($menu->controller == "Homes") : ?>
                        <li class="nav-item has-treeview">
                            <a class="nav-link <?php if ( $menu->controller == 'Homes' && $a_name == 'home') : ?> active <?php endif; ?>" href="<?= $this->Url->build(['controller' => "Menus" , 'action' => 'home']); ?>" >
                                <i class="nav-icon icon-list"></i>
                                <p><?= $menu->alias; ?></p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if ($menu->controller !== "Dashboards" && $menu->controller !== 'Homes') : ?>
                        <li class="nav-item has-treeview">
                            <a class="nav-link <?php if ($c_name == $menu->controller && $a_name == 'add') : ?> active <?php endif; ?>" href="<?= $this->Url->build(['controller' => $menu->controller, 'action' => 'add']); ?>">
                                <i class="nav-icon icon-plus"></i>
                                <p><?= __d("admin", "add") ?></p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if ($menu->controller == "Settings") : ?>
                        <li class="nav-item has-treeview <?php if ($c_name == $menu->controller && $a_name == 'clearCache') : ?>active<?php endif; ?>">
                            <a class="nav-link <?php if ($c_name == $menu->controller && $a_name == 'clearCache') : ?> active <?php endif; ?>" href="<?= $this->Url->build(['controller' => $menu->controller, 'action' => 'clearCache']); ?>">
                                <i class="nav-icon icon-trash-empty"></i>
                                <p><?= __d("admin", "clear cache") ?></p>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </li>
        <?php endforeach ?>
    </ul>
</nav>
