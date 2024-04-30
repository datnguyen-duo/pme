<?php
/* Template Name: Press */
get_header(); ?>
<div class="template-press-page-container">
    <?php $post_section = get_field('post_section'); ?>
    <section class="featured-block-section">
        <div class="content">
            <h1 class="title" js-animation="fade-up"><?php the_title() ?></h1>

            <div class="block">
                <div class="block-col">
                    <div class="block-info">
                        <div class="block-info-content">
                            <div class="block-tag">
                                <div class="tag-icon">
                                    <img src="<?= get_template_directory_uri().'/src/images/icons/star-blue.svg' ?>" alt="">
                                </div>
                                Featured
                            </div>

                            <?php if( $post_section['title'] ): ?>
                                <h2 class="block-title"><?= $post_section['title'] ?></h2>
                            <?php endif; ?>

                            <?php if( $post_section['subtitle'] ): ?>
                                <h3 class="block-sub-title"><?= $post_section['subtitle'] ?></h3>
                            <?php endif; ?>

                            <?php if( $post_section['description'] ): ?>
                                <div class="block-description"><?= $post_section['description'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="block-col">
                    <div class="block-image">
                        <?= wp_get_attachment_image($post_section['image'], 'full') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $posts_section = get_field('posts_section');
    if( $posts_section['title'] || $posts_section['posts'] ): ?>
        <section class="blocks-section">
            <div class="content">
                <?php if( $posts_section['title'] ): ?>
                    <h2 class="title" js-animation="fade-up"><?= $posts_section['title'] ?></h2>
                <?php endif; ?>

                <?php if( $posts_section['posts'] ): ?>
                    <div class="blocks">
                        <?php foreach( $posts_section['posts'] as $post ): setup_postdata($post);
                            $logo = get_field('logo');
                            $list = get_field('list'); ?>
                            <div class="block-holder">
                                <div class="block">
                                    <div class="block-logo">
                                        <?= wp_get_attachment_image($logo, 'large') ?>
                                    </div>
                                    <h3 class="block-title"><?php the_title() ?></h3>
                                    <?php if( $list ): ?>
                                    <div class="block-info-list">
                                        <?php foreach ( $list as $item ): ?>
                                            <p><?php if( $item['title'] ): ?><strong><?= $item['title'].':' ?></strong><?php endif; ?> <?= $item['description'] ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
