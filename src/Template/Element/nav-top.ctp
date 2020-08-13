<!-- <nav class="navbar navbar-static-top"> -->
<!-- bare de menu du haut -->
<ul class="navbar navbar-nav navbar-static-top">
    <li class="nav-item">
        <a href="#" data-widget="pushmenu" class="nav-link sidebar-toggle icon-menus" data-toggle="offcanvas" role="button">
        </a>
    </li>
</ul>
<ul class="nav-bar nav navbar-nav">
    <!-- voir nav nav-tabs -->
    <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <!-- voir pour ajouter role="button" role="button" aria-haspopup="true" aria-expanded="false" -->
            <?php if (!empty($this->request->getSession()->read('Auth.User.avatar'))) : ?>
                <?php echo $this->Html->image(
                    "users/avatar/" . $this->request->getSession()->read('Auth.User.id') . "/mini_" . h($this->request->getSession()->read('Auth.User.avatar')),
                    ['class' => 'user-image', "alt" => 'gravatar']
                ) ?>
                <span class="hidden-xs"><?= h($this->request->getSession()->read('Auth.User.username')); ?></span>
            <?php else : ?>
                <?= $this->Html->image("avatars/gravatar_mini.jpg", ['class' => 'user-image']);; ?>
            <?php endif ?>
        </a>
        <ul class="dropdown-menu">
            <li class="user-header nav-item">
                <?php if (empty($this->request->getSession()->read('Auth.User.avatar'))) : ?>
                    <?= $this->Html->image("avatars/gravatar_thumb.jpg", ['class' => 'img-circle user-image']);; ?>
                <?php else : ?>
                    <?php echo $this->Html->image(
                        "users/avatar/" . $this->request->getSession()->read('Auth.User.id') . "/thumb_" . h($this->request->getSession()->read('Auth.User.avatar')),
                        ['class' => 'img-circle user-image', "alt" => __d("admin", 'user image')]
                    ) ?>
                <?php endif ?>
                <p>
                    <?php echo $this->request->getSession()->read('Auth.User.username'); ?>
                    <small>
                        <?= __d("admin", 'member since') . " "; ?>
                        <?php echo $this->request->getSession()->read('Auth.User.created'); ?>
                    </small>
                </p>
            </li>
            <li class="user-footer nav-item">
                <?= $this->Html->link(
                    " " . __d("admin", 'profile'),
                    ['controller' => 'Users', 'action' => 'account'],
                    ['class' => 'btn btn-outline-secondary icon-user']
                ); ?>

                <?= $this->Html->link(
                    " " . __d("admin", 'logout'),
                    ['controller' => 'Users', 'action' => 'logout', "prefix" => false],
                    ['class' => "btn btn-outline-secondary icon-logout"]
                ); ?>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <?= $this->Html->link(
            __d("admin", "help"),
            [
                'controller' => 'Helps',
                'action' => 'index',
            ],
            [
                'class' => "nav-link"

            ]
        ); ?>
    </li>
</ul>
