<?php
$class = 'message';
$name ='';

if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!empty($params['name'])) {
    $name .= ' ' . $params['name'];
}
if(!empty($params['image'])){
    $image = "users/avatar/".$this->request->getSession()->read('Auth.User.id')."/thumb_".$params['image'];
} else {
    $image = "avatars/gravatar_mini.jpg";
}
?>
<div class="notifications flash-msg" onclick="this.classList.add('hidden')">
    <div class="notification ">
        <div class="left">
            <div class="img">
                <?= $this->Html->image(h($image),
                 ['class' => ' ',
                 'width'=>60, "height" => 60]) ?>
            </div>
        </div>
        <div class="right">
            <h2>bonjour <?= h($name) ?>  !</h2>
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