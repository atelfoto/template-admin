<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu[]|\Cake\Collection\CollectionInterface $menus
 */
?>
<?php $this->assign('title', " " . __d("admin", "Menus"));
$this->assign('icon', 'menus');
$this->Breadcrumbs->add(__d("admin", 'Menus')); ?>
<div class="menus index content">
    <div class="box box-primary card">
        <div class="box-header with-border card-header">
            <div class="box-title card-title">
                <?php echo $this->Element('search'); ?>
                <?php echo $this->Paginator->limitControl(
                    [05 => 05, 10 => 10, 20 => 20, 50 => 50],
                    null,
                    ['label' => false]
                ); ?>
            </div>
            <div class="card-tools">
                <?= $this->Html->link(
                    __d("admin", 'Add'),
                    ['action' => 'add'],
                    ['class' => 'btn btn-primary icon-plus', 'escape' => false]
                ) ?>
            </div>
        </div>
        <div class="card-body box-body table-responsive">
            <?= $this->Form->create(null, ['url' => ['action' => 'deleteAll']]) ?>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="buttonAll" style="min-width:106px">
                            <button class="deleteAll" data-placement='right' data-toggle="tooltip" data-original-title="Supprimer les lignes selecionnées">
                                <?= __d('admin', 'Delete All'); ?>
                            </button>
                        </th>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('alias') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('controller') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
						<th scope="col"><?= $this->Paginator->sort('lft') ?></th>
						<th scope="col"><?= $this->Paginator->sort('rght') ?></th>
                        <th scope="col" colspan="2"></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('online') ?></th>
                        <th scope="col" class="actions" colspan="2"><?= __d("admin", 'Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $menu) : ?>
                        <tr>
                            <td class="ids"><?= $this->Form->checkbox('ids[]', ["value" => $menu->id]); ?></td>
                            <td><?= $this->Number->format($menu->id) ?></td>
                            <td><?= h($menu->name) ?></td>
                            <td><?= h($menu->alias) ?></td>
                            <td><?= h($menu->controller) ?></td>
                            <td>
                                <?= $menu->has('parent_menu')
                                    ? $this->Html->link(
                                        $menu->parent_menu->name,
                                        ['controller' => 'Menus', 'action' => 'view', $menu->parent_menu->id]
                                    )
                                    : ''
                                ?>
                            </td>
							<td><?= h($menu->lft) ?></td>
							<td><?= h($menu->rght) ?></td>
                            <td>
								<?= $this->Form->postLink(
									null,
									['action' => 'moveDown', $menu->id],
									[
										"block" => true,
									//	'confirm' => __d('admin', 'Do you want to go down. # {0}?', $menu->id),
										'class' => 'icon-down-dir', 'data-toggle' => 'tooltip',
										'title' => __d('admin', 'move Down')
									]
								)
								?>
							</td>
							<td>
								<?= $this->Form->postLink(
									null,
									['action' => 'moveUp', $menu->id],
									[
										"block" => true,
									//	'confirm' => __d('admin', 'Are you on to want to go up # {0}?', $menu->id),
										"class" => 'icon-up-dir', 'data-toggle' => 'tooltip',
										'title' => __d('admin', 'move Up')
									]
								) ?>
							</td>
                            <td>
                                <?= $menu->has('user')
                                    ? $this->Html->link(
                                        $menu->user->username,
                                        ['controller' => 'Users', 'action' => 'view', $menu->user->id]
                                    )
                                    : ''
                                ?>
                            </td>
                            <td><?= h($menu->created) ?></td>
                            <td><?= h($menu->modified) ?></td>
                            <td class="online">
                                <?php if ($menu->online == 1) : ?>
                                    <?= $this->Html->link(
                                        __d('admin', 'Active'),
                                        [
                                            'action' => 'online', $menu->id, $menu->online
                                        ],
                                        [
                                            'class' => 'active',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __d('admin', 'disable')
                                        ]
                                    ); ?>
                                <?php else : ?>
                                    <?= $this->Html->link(
                                        __d('admin', 'Inactive'),
                                        [
                                            'action' => 'online', $menu->id, $menu->online
                                        ],
                                        [
                                            'class' => 'inactive',
                                            'data-toggle' => 'tooltip',
                                            'data-original-title' => __d("admin", 'enable')
                                        ]
                                    ); ?>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    null,
                                    ['action' => 'edit', $menu->id],
                                    [
                                        'class' => 'icon-pencil btn btn-outline-secondary',
                                        'data-toggle' => 'tooltip',
                                        'title' => __d('admin', 'edit')
                                    ]
                                ) ?>
                            </td>
                            <td class="actions">
                                <?= $this->Form->postLink(
                                    null,
                                    ['action' => 'delete', $menu->id],
                                    [
                                        "block" => true,
                                        'confirm' => __d('admin', 'Are you sure you want to delete # {0}?', $menu->id),
                                        'class' => 'icon-trash-empty btn btn-outline-dark',
                                        "data-toggle" => 'tooltip',
                                        "data-original-title" => __d('admin', "Delete")
                                    ]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->Form->end() ?>
            <?= $this->fetch('postLink'); ?>
        </div>
        <?= $this->element("paginator"); ?>
    </div>
</div>
