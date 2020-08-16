<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php $this->assign('title', " " . __d("admin", "Users"));
$this->assign('icon', 'users');
$this->Breadcrumbs->add(__d("admin",'Users')); ?>
<div class="users index content">
	<div class="box box-primary card">
		<div class="box-header with-border card-header">
			<div class="box-title card-title">
				<?php echo $this->Element('search') ;?>
				<?php echo $this->Paginator->limitControl(
					[05 => 05, 10 => 10, 20 => 20, 50 => 50], 
					null, 
					['label' => false]
				); ?>	
			</div>
			<div class="card-tools">
				<?= $this->Html->link(__d("admin", 'Add'),
                ['action' => 'add'],
                ['class' => 'btn btn-primary icon-plus', 'escape' => false]) ?>
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
													<th scope="col"><?= $this->Paginator->sort('username') ?></th>
													<th scope="col"><?= $this->Paginator->sort('password') ?></th>
													<th scope="col"><?= $this->Paginator->sort('email') ?></th>
													<th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
													<th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
													<th scope="col"><?= $this->Paginator->sort('role') ?></th>
													<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
													<th scope="col"><?= $this->Paginator->sort('created') ?></th>
													<th scope="col"><?= $this->Paginator->sort('online') ?></th>
												<th scope="col" class="actions" colspan="2"><?= __d("admin", 'Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td class="ids"><?= $this->Form->checkbox('ids[]', ["value" => $user->id] );?></td>
																																																				<td><?= $this->Number->format($user->id) ?></td>
																																																																			<td><?= h($user->username) ?></td>
																																																																			<td><?= h($user->password) ?></td>
																																																																			<td><?= h($user->email) ?></td>
																																																																			<td><?= h($user->first_name) ?></td>
																																																																			<td><?= h($user->last_name) ?></td>
																																																																			<td><?= h($user->role) ?></td>
																																																																			<td><?= h($user->modified) ?></td>
																																																																			<td><?= h($user->created) ?></td>
																																																																			<td><?= h($user->online) ?></td>
																																	<td class="online">
							<?php if ($user->online == 1): ?>
							<?= $this->Html->link(
                                    __d('admin', 'Active'),
                                    [
                                        'action' => 'online', $user->id, $user->online
                                    ],
                                    [
                                        'class' => 'active',
										'data-toggle' => 'tooltip',
										'data-original-title' => __d('admin', 'disable')
                                    ]
                                ); ?>
						<?php else : ?>
							<?= $this->Html->link(
                                    __d('admin','Inactive'),
                                    [
                                        'action' => 'online', $user->id, $user->online
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
							<?= $this->Html->link(null, ['action' => 'edit', $user->id],
                                [
                                    'class' => 'icon-pencil btn btn-outline-secondary',
                                    'data-toggle' => 'tooltip',
                                    'title'=> __d('admin', 'edit')
                                ]
                            ) ?>
						</td>
						<td class="actions">
							<?= $this->Form->postLink(null, 
                                ['action' => 'delete', $user->id],   
                                [
                                    "block" => true,
                                    'confirm' => __d('admin', 'Are you sure you want to delete # {0}?', $user->id),
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
