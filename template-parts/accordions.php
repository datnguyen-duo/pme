<?php
$id = @$args['id'];
$autoplay = @$args['autoplay'] ? boolval($args['autoplay']) : false;
$accordions = @$args['accordions'];
if( $accordions ): ?>
    <div id="<?= $id ?>" class="template-part-accordions <?= ($autoplay) ? ' autoplay-accordions' : null ?>" js-accordions="container" <?php if( $autoplay ): ?> data-js-accordions-autoplay="true" <?php endif; ?>>
        <?php foreach($accordions as $index => $accordion): ?>
            <div class="accordion <?= ( $index == 0 ) ? ' active' : null ?>" js-accordions="accordion">
                <div class="accordion-header <?= ( $index == 0 ) ? ' active' : null ?>" js-accordions="opener">
                    <div class="accordion-title"><?= $accordion['title'] ?></div>
                    <div class="accordion-opener"></div>
                </div>
                <div class="accordion-content gl-text-editor" js-accordions="hidden-content" style="display:<?= ( $index == 0 ) ? ' block' : null ?>;">
                    <?= $accordion['description'] ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>