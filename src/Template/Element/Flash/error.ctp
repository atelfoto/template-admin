<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="notifications flash-msg" onclick="this.classList.add('hidden');">
    <div class="notification error">
        <div class="left">
            <div class="icone">
                <span class="icon-cancel"></span>
                    <!-- ❌ -->
               
            </div>
        </div>
        <div class="right">
            <h2>Echec</h2>
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
