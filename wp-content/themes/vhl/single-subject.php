<?php get_header() ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/ocean.jpg)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?= the_title() ?></h1>
        <div class="page-banner__intro">
            <p>I'll fill it later</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Back to About Us</a> <span class="metabox__main">Our History</span>
        </p>
    </div>

    <div class="generic-content">
        <?= the_content() ?>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Past Events</h2>

            <?php
            $args1 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '<',
                    ],
                    [
                        'key' => 'related_subject',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE',
                    ]
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $the_query1 = new WP_Query($args1);

            if ($the_query1->have_posts()) :
                while ($the_query1->have_posts()) :
                    $the_query1->the_post();

                    $the_occurrance1 = new DateTime(get_post_meta(get_the_ID(), 'occur', true));
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#" style="background-color: gray;">
                            <span class="event-summary__month"><?= $the_occurrance1->format('M') ?></span>
                            <span class="event-summary__day"><?= $the_occurrance1->format('d') ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?= the_permalink() ?>">
                                    <?= the_title() ?>
                                </a>
                            </h5>
                            <p><?= the_excerpt() ?>
                                <a href="<?= the_permalink() ?>" class="nu gray">Learn more</a>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <p>Sorry, no Past Events here</p>
            <?php
            endif;

            // ================ RESET POST DATA FOR THE NEXT QUERY ==================== 
            wp_reset_postdata();
            // ================ RESET POST DATA FOR THE NEXT QUERY ==================== 
            ?>
        </div>
    </div>
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <?php
            $args2 = [
                'post_type' => 'event',
                'meta_query' => [
                    [
                        'key' => 'occur',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                    ],
                    [
                        'key' => 'related_subject',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE',
                    ]
                ],
                'meta_key' => 'occur',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];

            $the_query2 = new WP_Query($args2);

            if ($the_query2->have_posts()) :
                while ($the_query2->have_posts()) :
                    $the_query2->the_post();

                    $the_occurrance2 = new DateTime(get_post_meta(get_the_ID(), 'occur', true));
            ?>
                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="#" style="background-color: red;">
                            <span class="event-summary__month"><?= $the_occurrance2->format('M') ?></span>
                            <span class="event-summary__day"><?= $the_occurrance2->format('d') ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?= the_permalink() ?>">
                                    <?= the_title() ?>
                                </a>
                            </h5>
                            <p><?= the_excerpt() ?>
                                <a href="<?= the_permalink() ?>" class="nu gray">Learn more</a>
                            </p>
                        </div>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <p>Sorry, no Upcoming Events here</p>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer() ?>