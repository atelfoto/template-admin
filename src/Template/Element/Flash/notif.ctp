<?php
$class = 'info';
$name = " ";
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!empty($params['name'])) {
    $name .= ' ' . $params['name'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="notifications flash-msg principal" onclick="this.classList.add('hidden');">
    <div class="<?= h($class) ?> notification">
        <div class="left">
            <div class="icone">
                <span class="icon-<?= h($class) ?>"></span>
               <!-- ❌ -->
            </div>
        </div>
        <div class="right">
            <h2><?= h($name) ?> </h2>
            <p><?= h($message) ?></p>
        </div>
    </div>
</div>

<?php $this->append('scriptBottom'); ?>
<script>
    $(document).ready(function(){

        $('.flash-msg').animate({opacity: 1.0}, 10000).fadeOut('slow');
        $('.flash-msg').delay(10000).fadeOut('slow');
    });
</script>
<?php $this->end(); ?>
