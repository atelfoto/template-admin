<div class="paginator page navigation card-footer">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ') ?>
        <?php if ($this->Paginator->hasPrev()) : ?>
            <?= $this->Paginator->prev('< '); ?>
        <?php endif; ?>
        <?= $this->Paginator->numbers(['modulus' => 5]); ?>
        <?php if ($this->Paginator->hasNext()) : ?>
            <?= $this->Paginator->next(' >'); ?>
        <?php endif; ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __d("admin", 'Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
