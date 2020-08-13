<?= $this->Form->create(null, ['type' => 'get', "style" => "display:flex", "class" => "search"]) ?>
<?= $this->Form->control('key', [
    'label' => false, 'value' => $this->request->getQuery('key'), 'autocomplete' => 'off'
]) ?>
<div>
    <?= $this->Form->button(null, ['templateVars' => ['1' => 'primary icon-search']]); ?>
</div>
<?= $this->Form->end() ?>
