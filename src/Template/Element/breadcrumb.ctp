<section class="articles index content-header">
    <div class="col-sm-">
        <h1 class="icon-<?= $this->fetch('icon'); ?>">
            <?= $this->fetch('title') ?> <?= " "; ?>
            <span><?= $this->fetch('heading'); ?></span>
        </h1>
    </div>
    <div class="col-sm-">
        <?php
        $this->Breadcrumbs->prepend(
            __d('admin', 'dashboard'),
            ['controller' => 'Dashboards', 'action' => 'index'],
            [
                'innerAttrs' => [
                    'class' => "active"
                ],
                'templateVars' => [
                    'icon' => 'icon-gauge'
                ]
            ]
        );
        $this->Breadcrumbs->setTemplates([
            'wrapper' => '<ol class="breadcrumb float-sm-right"> {{content}} </ol>',
            'item' => '<li{{attrs}} class="{{icon}} breadcrumb-item"> <a href="{{url}}" title="{{title}}">{{title}}</a></li>{{separator}}',
            'itemWithoutLink' => '<li {{attrs}} class="breadcrumb-item active">{{title}}</li>{{separator}}'
        ]);
        echo $this->Breadcrumbs->render();
        ?>
    </div>
</section>
