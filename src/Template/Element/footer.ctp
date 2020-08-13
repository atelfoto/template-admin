<footer class="main-footer">
    <?php if (isset($layout) && $layout == 'top') : ?>
        <div class="container">
        <?php endif; ?>
        <div>
            <strong>
                Copyright &copy; 2012-<?= date('Y'); ?>
                <!-- <a href="https://<?= env('HTTP_HOST'); ?>"> -->
                <?= env('HTTP_HOST'); ?>
                <!-- </a>. -->
            </strong>
            All rights reserved.
        </div>
        <div class="hidden-xs">
            <!-- <b>Version</b> 2.4.5 -->
        </div>
        <?php if (isset($layout) && $layout == 'top') : ?>
        </div>
    <?php endif; ?>
</footer>
