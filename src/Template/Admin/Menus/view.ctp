<?php  $this->assign('title', " " . ucfirst(__d("admin", "Menu")));
$this->assign('icon', lcfirst('Menu'));
$this->assign('heading', ucfirst('Menu'));
$this->Breadcrumbs->add([
    ['title' => __d("admin",'Menu'), "url" => ['action' => 'index']],
    ['title' => ucfirst(__d("admin",'View'))]
]); ?>
<section class="view content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><i class="icon-info"></i><?php echo 'Information'; ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa-minus"></i>
                </button>
                <?php echo $this->Html->link(
                    null,
                    ['action' => 'index'],
                    [
                        "class" => 'icon-cancel btn btn-default',
                        "data-toggle" => 'tooltip',
                        "data-original-title" => 'Fermer'
                    ]
                ); ?>
            </div>
        </div>
        <div class="card-body">
            <dl class="dl-horizontal">
                <dt><?= __d('admin','Name') ?></dt>
                <dd><?= h($menu->name) ?></dd>
                <dt><?= __d('admin','Alias') ?></dt>
                <dd><?= h($menu->alias) ?></dd>
                <dt><?= __d('admin','Controller') ?></dt>
                <dd><?= h($menu->controller) ?></dd>
                <dt>
                    <?= __d('admin','Parent Menu') ?>
                </dt>
                <dd>
                    <?= $menu->has('parent_menu')
                    ? $this->Html->link($menu->parent_menu->name,
                    ['controller' => 'Menus', 'action' => 'view', $menu->parent_menu->id])
                    : ''
                    ?>
                </dd>
                <dt>
                    <?= __d('admin','User') ?>
                </dt>
                <dd>
                    <?= $menu->has('user')
                    ? $this->Html->link($menu->user->id,
                    ['controller' => 'Users', 'action' => 'view', $menu->user->id])
                    : ''
                    ?>
                </dd>
                <dt><?= __d('admin','Description') ?></dt>
                <dd><?= h($menu->description) ?></dd>
                <dt><?= __d('admin','Robots') ?></dt>
                <dd><?= h($menu->robots) ?></dd>
                <dt><?= __d('admin','Keywords') ?></dt>
                <dd><?= h($menu->keywords) ?></dd>
                <dt><?= __d('admin', 'Id') ?></dt>
                <dd><?= $this->Number->format($menu->id) ?></dd>
                <dt><?= __d('admin', 'Lft') ?></dt>
                <dd><?= $this->Number->format($menu->lft) ?></dd>
                <dt><?= __d('admin', 'Rght') ?></dt>
                <dd><?= $this->Number->format($menu->rght) ?></dd>
                <dt><?= __d('admin', 'Created') ?></dt>
                <dd><?= h($menu->created) ?></dd>
                <dt><?= __d('admin', 'Modified') ?></dt>
                <dd><?= h($menu->modified) ?></dd>
                <dt><?= __d('admin', 'Online') ?></dt>
                <dd><?= $menu->online ? __d('admin', 'Yes') : __d('admin', 'No'); ?></dd>
            </dl>
        </div>
    </div>
    <div class="card 1 Menus">
        <div class="card-header">
            <h3 class="card-title"><i class="icon-share-alt"></i><?= __d('admin', 'Menus') ?></h3>
            <div class="card-tools">
                <!-- <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> -->
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <?php if (!empty($menu->child_menus)): ?>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= __d('admin', 'Id') ?></th>
                            <th scope="col"><?= __d('admin', 'Name') ?></th>
                            <th scope="col"><?= __d('admin', 'Alias') ?></th>
                            <th scope="col"><?= __d('admin', 'Controller') ?></th>
                            <th scope="col"><?= __d('admin', 'Parent Id') ?></th>
                            <th scope="col"><?= __d('admin', 'Lft') ?></th>
                            <th scope="col"><?= __d('admin', 'Rght') ?></th>
                            <th scope="col"><?= __d('admin', 'User Id') ?></th>
                            <th scope="col"><?= __d('admin', 'Description') ?></th>
                            <th scope="col"><?= __d('admin', 'Robots') ?></th>
                            <th scope="col"><?= __d('admin', 'Keywords') ?></th>
                            <th scope="col"><?= __d('admin', 'Created') ?></th>
                            <th scope="col"><?= __d('admin', 'Modified') ?></th>
                            <th scope="col"><?= __d('admin', 'Online') ?></th>
                            <th class="online">online</th>
                            <th scope="col" colspan="3" class="actions"><?= __d('admin', 'Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($menu->child_menus as $childMenus):
                    ?>
                    <tr>
                        <td><?= h($childMenus->id) ?></td>
                        <td><?= h($childMenus->name) ?></td>
                        <td><?= h($childMenus->alias) ?></td>
                        <td><?= h($childMenus->controller) ?></td>
                        <td><?= h($childMenus->parent_id) ?></td>
                        <td><?= h($childMenus->lft) ?></td>
                        <td><?= h($childMenus->rght) ?></td>
                        <td><?= h($childMenus->user_id) ?></td>
                        <td><?= h($childMenus->description) ?></td>
                        <td><?= h($childMenus->robots) ?></td>
                        <td><?= h($childMenus->keywords) ?></td>
                        <td><?= h($childMenus->created) ?></td>
                        <td><?= h($childMenus->modified) ?></td>
                        <td><?= h($childMenus->online) ?></td>
                        <td class="online">
                            <?php if ($childMenus->online): ?>
                            <?php echo $this->Html->link(
                                    __d('admin', 'enable'),
                                [
                                    'action' => 'online', $childMenus->id, $childMenus->online
                                ],
                                [
                                    'class' => 'active',
                                    'data-toggle' => 'tooltip', 
                                    "data-original-title" => 'Clic pour Désactiver'
                                ]
                            );?>
                            <?php else: ?>
                            <?php echo $this->Html->link(
                                __d('admin', 'Inactive'),
                                [
                                    'action' => 'online', $childMenus->id, $childMenus->online
                                ],
                                [
                                    'class' => 'inactive',
                                    'data-toggle' => 'tooltip', 
                                    "data-original-title" => "Clic pour Activer"
                                ]
                            );
                            endif; ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(
                                null,
                            ['controller' => 'Menus', 'action' => 'view', $childMenus->id],
                            [
                                'class'=>'icon-eye btn btn-outline-dark',
                                'data-toggle' => 'tooltip',
                                "data-original-title" => __d('admin', "view")
                            ]) ?>
                        </td>
                        <td>
                            <?= $this->Html->link(
                                null,
                            ['controller' => 'Menus', 'action' => 'edit', $childMenus->id],
                            [
                            'class'=>'icon-pencil btn btn-outline-dark ',
                            'data-toggle' => 'tooltip',
                            "data-original-title" => __d('admin', "Edit")
                            ]) ?>
                        </td>
                        <td>
                            <?= $this->Form->postLink(
                                null,
                            ['controller' => 'Menus', 'action' => 'delete', $childMenus->id],
                            [
                            'confirm' => __d('admin', 'Are you sure you want to delete # {0}?', 
                            $childMenus->id), 
                            'class'=>'icon-trash-empty btn btn-outline-dark',
                            'data-toggle' => 'tooltip',
                            "data-original-title" => __d('admin', "Delete")
                            ]
                            ); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</section>
