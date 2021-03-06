<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Menu $menu
 */
?>

<?php $this->assign('title', __d('admin', "menu"));
$this->assign('icon', 'menus');
$this->assign('heading', ucfirst(__d("admin", 'Add')));
$this->Breadcrumbs->add([
    ['title' => __d('admin', 'menus'), "url" => ["action" => "index"]],
    ['title' => ucfirst(__d("admin", 'Add'))]
]);
?>
<section class="menus form content">
    <div class="box box-primary card card-default">
    <?= $this->Form->create(
        $menu,
        [
            'novalidate' => true,
            'type' => 'file',
            'class' => 'form-horizontal'
        ]) ?>
        <div class="box-header with-border card-header">
            <ul class="nav nav-pills nav-stacked nav-tabs" role="tablist">
                <li class="active nav-item">
                    <a href="#contenu" data-toggle="pill" class="nav-link active" role="tab" aria-selected="true">
                        Contenu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#publication" data-toggle="tab" class="nav-link" role="tab" aria-selected="false">
                        Publication
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-default icon-info" data-toggle="tooltip" data-original-title="Pour les publication dans Google et les Reseaux Sociaux"></a>
                </li>
            </ul>
            <div class="card-tools">
                <?php echo $this->Form->control('online', ['label' => false]); ?>
                <?= $this->Form->button(__d('admin', 'Submit'), [
                'templateVars' => ['1' => 'primary icon-floppy']
                ]) ?>
                <?php echo $this->Html->link(null,
                    ['action' => 'index'],
                    [
                        "class" => 'icon-cancel btn btn-default',
                        "data-toggle" => 'tooltip',
                        "data-original-title" => 'Fermer'
                    ]
                );?>
            </div>
        </div>
        <div class="box-body card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="contenu">
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('alias');
            echo $this->Form->control('parent_id', ['options' => $parentMenus, 'empty' => true]);
            // echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            ?>
        </div>
        <div class="tab-pane" id="publication">
			<?php
            echo $this->Form->control('keywords');
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
        // size: 'small',
        on: 'En ligne',
        off: 'Hors ligne',
        onstyle: 'success',
        offstyle: 'danger',
    });
});
$('#description').keyup(function() {
        var nombreCaractere = $(this).val().length;
        var nombreMots = jQuery.trim($(this).val()).split(' ').length;
        if ($(this).val() === '') {
            nombreMots = 0;
        }
        var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 250';
        $('#compteur').text(msg);
        if (nombreCaractere > 220) {
            $('#compteur').addClass("mauvais");
        } else {
            $('#compteur').removeClass("mauvais");
        }
    })

</script>
<?php $this->end(); ?>
