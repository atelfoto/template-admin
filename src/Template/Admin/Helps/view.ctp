<?php $this->assign('title', " " . ucfirst(__d("admin", "Help")));
$this->assign('icon', lcfirst('Help'));
$this->assign('heading', ucfirst('Help'));
$this->Breadcrumbs->add([
    ['title' => __d("admin", 'Help'), "url" => ['action' => 'index']],
    ['title' => ucfirst(__d("admin", 'View'))]
]); ?>
<section class="view content">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><i class="icon-info"></i><?php echo 'Information'; ?></h3>
            <div class="card-tools">
                <?php echo $this->Html->link(
                    null,
                    ['action' => 'edit', $help->id],
                    [
                        "class" => 'icon-pencil btn btn-outline-dark',
                        "data-toggle" => 'tooltip',
                        "data-original-title" => __d('admin', 'edit')
                    ]
                ); ?>
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
                <dt><?= __d('admin', 'Name') ?></dt>
                <dd><?= h($help->name) ?></dd>
                <dt><?= __d('admin', 'Slug') ?></dt>
                <dd><?= h($help->slug) ?></dd>
                <dt><?= __d('admin', 'Id') ?></dt>
                <dd><?= $this->Number->format($help->id) ?></dd>
                <dt><?= __d('admin', 'Created') ?></dt>
                <dd><?= h($help->created) ?></dd>
                <dt><?= __d('admin', 'Modified') ?></dt>
                <dd><?= h($help->modified) ?></dd>
                <dt><?= __d('admin', 'Online') ?></dt>
                <dd><?= $help->online ? __d('admin', 'Yes') : __d('admin', 'No'); ?></dd>
            </dl>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="icon-doc-text-inv"></i><?= __d('admin', 'Content') ?></h3>
            <!--<ul class="nav nav-pills nav-stacked nav-tabs"></ul>-->
            <div class="div card-tools">
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
            <?= $this->Text->autoParagraph($help->content); ?>
        </div>
    </div>
</section>
