<!-- nom du site dans le haut de la bare latérale gauche  -->
<?php
use Cake\Core\Configure;
?>
<a href="<?= $this->Url->build('/'); ?>" class="brand-link" data-toggle="tooltip" data-original-title="retour page d'accueil" target="_blank">
    <?= $this->Html->image('logo.png',
    [
        'alt' => "logo",
        'class' => 'brand-image img-circle elevation-3',
        "style" => "opacity: .8"
    ]);?>
    <span class="brand-text font-weight-light"> <?= Configure::read('Site.name');?></span>
  </a>
