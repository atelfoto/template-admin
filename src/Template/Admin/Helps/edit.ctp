<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Help $help
 */
?>

<?php $this->assign('title', __d('admin', "help"));
$this->assign('icon', 'help');
$this->assign('heading', ucfirst(__d("admin", 'Edit')));
$this->Breadcrumbs->add([
    ['title' => __d('admin', 'helps'), "url" => ["action" => "index"]],
    ['title' => ucfirst(__d("admin", 'Edit'))]
]);
?>
<section class="helps form content">
    <div class="box box-primary card card-default">
        <?= $this->Form->create(
            $help,
            [
                'novalidate' => true,
                'type' => 'file',
                'class' => 'form-horizontal'
            ]
        ) ?>
        <div class="box-header with-border card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <?php echo $this->Html->link(
                    null,
                    ['action' => 'view', $help->id],
                    [
                        "class" => 'icon-eye btn btn-outline-dark',
                        "data-toggle" => 'tooltip',
                        "data-original-title" => 'vue'
                    ]
                ); ?>
                <?php echo $this->Form->control('online', ['label' => false]); ?>
                <?= $this->Form->button(__d('admin', 'Submit'), [
                    'templateVars' => ['1' => 'primary icon-floppy']
                ]) ?>
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
        <div class="box-body card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="contenu">
                    <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('content');
                    ?>
                </div>
                <div class="tab-pane" id="publication">
                    <?php
                    echo $this->Form->control(
                        "robots",
                        [
                            "options" => [
                                // "Paramètres globaux" => "Paramètres globaux",
                                "Index, Follow" => "Index, Follow",
                                "No index, follow" => "No index, follow",
                                "Index, Nofollow" => "Index, Nofollow",
                                "No index, no follow" => "No index, no follow"
                            ]
                        ]
                    ); ?>
                    <div>
                        <?= $this->Form->control(
                            'description',
                            ['type' => 'textarea']
                        ); ?>
                        <p id="compteur" class="text-right">
                            <i>0 mots - 0 Caractere / 250</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer card-footer">
            <?= $this->Form->button(__d('admin', 'Submit'), [
                'templateVars' => ['1' => 'primary ']
            ]) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</section>
<?php
$this->append('scriptBottom');
// echo  $this->Html->script("tinymce/tinymce");
?>
<script>
    $(function() {
        $('#online').bootstrapToggle({
            on: 'En ligne',
            off: 'Hors ligne',
            onstyle: 'success',
            offstyle: 'danger',
        });
    });
</script>
<?php $this->end(); ?>
