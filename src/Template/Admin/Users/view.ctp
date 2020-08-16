<?php  $this->assign('title', " " . ucfirst(__d("admin", "User")));
$this->assign('icon', lcfirst('User'));
$this->assign('heading', ucfirst('User'));
$this->Breadcrumbs->add([
    ['title' => __d("admin",'User'), "url" => ['action' => 'index']],
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
                <dt><?= __d('admin','Username') ?></dt>
                <dd><?= h($user->username) ?></dd>
                <dt><?= __d('admin','Password') ?></dt>
                <dd><?= h($user->password) ?></dd>
                <dt><?= __d('admin','Email') ?></dt>
                <dd><?= h($user->email) ?></dd>
                <dt><?= __d('admin','First Name') ?></dt>
                <dd><?= h($user->first_name) ?></dd>
                <dt><?= __d('admin','Last Name') ?></dt>
                <dd><?= h($user->last_name) ?></dd>
                <dt><?= __d('admin','Role') ?></dt>
                <dd><?= h($user->role) ?></dd>
                <dt><?= __d('admin', 'Id') ?></dt>
                <dd><?= $this->Number->format($user->id) ?></dd>
                <dt><?= __d('admin', 'Modified') ?></dt>
                <dd><?= h($user->modified) ?></dd>
                <dt><?= __d('admin', 'Created') ?></dt>
                <dd><?= h($user->created) ?></dd>
                <dt><?= __d('admin', 'Online') ?></dt>
                <dd><?= $user->online ? __d('admin', 'Yes') : __d('admin', 'No'); ?></dd>
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
            <?php if (!empty($user->menus)): ?>
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
                    <?php foreach ($user->menus as $menus):
                    ?>
                    <tr>
                        <td><?= h($menus->id) ?></td>
                        <td><?= h($menus->name) ?></td>
                        <td><?= h($menus->alias) ?></td>
                        <td><?= h($menus->controller) ?></td>
                        <td><?= h($menus->parent_id) ?></td>
                        <td><?= h($menus->lft) ?></td>
                        <td><?= h($menus->rght) ?></td>
                        <td><?= h($menus->user_id) ?></td>
                        <td><?= h($menus->description) ?></td>
                        <td><?= h($menus->robots) ?></td>
                        <td><?= h($menus->keywords) ?></td>
                        <td><?= h($menus->created) ?></td>
                        <td><?= h($menus->modified) ?></td>
                        <td><?= h($menus->online) ?></td>
                        <td class="online">
                            <?php if ($menus->online): ?>
                            <?php echo $this->Html->link(
                                    __d('admin', 'enable'),
                                [
                                    'action' => 'online', $menus->id, $menus->online
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
                                    'action' => 'online', $menus->id, $menus->online
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
                            ['controller' => 'Menus', 'action' => 'view', $menus->id],
                            [
                                'class'=>'icon-eye btn btn-outline-dark',
                                'data-toggle' => 'tooltip',
                                "data-original-title" => __d('admin', "view")
                            ]) ?>
                        </td>
                        <td>
                            <?= $this->Html->link(
                                null,
                            ['controller' => 'Menus', 'action' => 'edit', $menus->id],
                            [
                            'class'=>'icon-pencil btn btn-outline-dark ',
                            'data-toggle' => 'tooltip',
                            "data-original-title" => __d('admin', "Edit")
                            ]) ?>
                        </td>
                        <td>
                            <?= $this->Form->postLink(
                                null,
                            ['controller' => 'Menus', 'action' => 'delete', $menus->id],
                            [
                            'confirm' => __d('admin', 'Are you sure you want to delete # {0}?', 
                            $menus->id), 
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
