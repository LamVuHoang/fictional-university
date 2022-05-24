<?php get_header() ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/ocean.jpg)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">The Subject Archive</h1>
        <div class="page-banner__intro">
            <p>I'll fill it later</p>
        </div>
    </div>
</div>

<div class="full-width-split group">
    <div class="full-width-split__two">
        <div class="full-width-split__inner">
            <h2 class="headline headline--small-plus t-center">All Subjects</h2>

            <?php
            $args = [
                'post_type' => 'subject'
            ];

            $post_query = new WP_Query($args);

            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) :
                    $post_query->the_post();
            ?>
                    <div class="event-summary">
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny">
                                <a href="<?= the_permalink() ?>"><?= the_title() ?></a>
                            </h5>
                        </div>
                    </div>

            <?php
                endwhile;
            else :
                _e('Sorry, no subject here');
            endif;

            ?>
        </div>
    </div>
</div>
<?php get_footer() ?>