</main> <!--#site-page-content end-->

<?php
$form_title = get_field('form_title', 'option');
$form_shortcode = get_field('form_shortcode', 'option');

// Contact info
$social_media_title = get_field('social_media_title', 'option');
$social_media = get_field('social_media', 'option');

$phone_title = get_field('phone_title', 'option');
$phone = get_field('phone', 'option');

$address_title = get_field('address_title', 'option');
$address = get_field('address', 'option');
$address_link = get_field('address_link', 'option');

$info_title = get_field('info_title', 'option');
$info = get_field('info', 'option');

$copyright = get_field('copyright', 'option');
?>
<footer id="site-footer">
    <div class="content">
        <div class="row">
            <div class="row-content">
                <div class="col">
                    <div class="inner-row">
                        <?php if( $form_title || $form_shortcode ): ?>
                            <div class="form-container">
                                <?php if( $form_title ): ?>
                                    <div class="form-title"><?= $form_title ?></div>
                                <?php endif; ?>

                                <?php if( $form_shortcode ): ?>
                                    <div class="form-holder"><?= do_shortcode($form_shortcode) ?></div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="inner-row">
                        <div class="info-list">
                            <div class="list-item">
                                <?php if( $phone_title ): ?>
                                    <div class="list-item-title"><?= $phone_title ?></div>
                                <?php endif; ?>

                                <?php if( $phone ): ?>
                                    <p class="list-item-text"><a href="tel:<?= $phone ?>"><?= $phone ?></a></p>
                                <?php endif; ?>
                            </div>

                            <div class="list-item list-item--address">
                                <?php if( $address_title ): ?>
                                    <div class="list-item-title"><?= $address_title ?></div>
                                <?php endif; ?>

                                <?php if( $address ): ?>
                                    <p class="list-item-text"><?= $address ?></p>
                                <?php endif; ?>

                                <?php
                                $link = $address_link;
                                if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <p class="list-item-text">
                                        <a class="underline" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>">
                                            <?= esc_html( $link_title ); ?>
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>

                            <?php if( $info_title || $info ): ?>
                                <div class="list-item">
                                    <?php if( $info_title ): ?>
                                        <div class="list-item-title"><?= $info_title ?></div>
                                    <?php endif; ?>

                                    <?php if( $info ): ?>
                                        <p class="list-item-text"><?= $info ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php if( has_nav_menu('menu-2') ): ?>
                        <nav>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-2',
                                    'container' => false,
                                )
                            ); ?>
                        </nav>
                    <?php endif; ?>

                    <?php if( $social_media ): ?>
                        <div class="social-media-holder">
                            <?php if( $social_media_title ): ?>
                                <div class="social-media-title"><?= $social_media_title ?></div>
                            <?php endif; ?>

                            <ul class="social-media">
                                <?php foreach ( $social_media as $item ): ?>
                                    <li>
                                        <a href="<?= $item['url'] ?>" target="_blank">
                                            <?= wp_get_attachment_image($item['icon']['id'], 'large') ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row-content">
                <div class="col">
                    <?php if( has_nav_menu('menu-3') ): ?>
                        <nav>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-3',
                                    'container' => false,
                                )
                            ); ?>
                        </nav>
                    <?php endif; ?>
                </div>

                <div class="col">
                    <?php if( $copyright ): ?>
                        <p class="copyright">©<?= date('Y') ?> <?= $copyright ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

</div> <!--#site-page end-->

<?php wp_footer(); ?>
</body>

</html>