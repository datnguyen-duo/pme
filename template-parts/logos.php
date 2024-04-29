<?php
$front_page_id = get_option('page_on_front');
$logos_s = get_field('logos_section');
if( $logos_s['title'] || $logos_s['logos'] ): ?>
    <section class="template-part-logos">
        <div class="content">
            <?php if( $logos_s['title'] ): ?>
                <h2 class="title"><?= $logos_s['title'] ?></h2>
            <?php endif; ?>

            <?php if( $logos_s['logos'] ): ?>
                <div class="logos <?= (sizeof($logos_s['logos']) > 7) ? 'more-than-7' : null ?>">
                    <?php foreach( $logos_s['logos'] as $item ): ?>
                        <div class="logo-holder">
                            <?= wp_get_attachment_image($item['logo'], 'large') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>