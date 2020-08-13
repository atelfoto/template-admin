<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="notifications flash-msg" onclick="this.classList.add('hidden')">
    <div class="notification success">
        <div class="left">
            <div class="icone">
              <span class="icon-check"></span>
            </div>
        </div>
        <div class="right">
            <h2>Bravo</h2>
            <p><?= h($message) ?></p>
        </div>
    </div>
</div>
<!-- ✓  <span class="icon-angle-down"></span>-->

<?php $this->append('scriptBottom'); ?>
<script>
    $(document).ready(function(){
        $('.flash-msg').animate({opacity: 1.0}, 10000).fadeOut('slow');
        $('.flash-msg').delay(10000).fadeOut('slow');
    });
</script>
<?php $this->end(); ?>


