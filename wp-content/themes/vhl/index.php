<?php get_header() ?>

<div style="background-color: black; height: 10vh; width: 100%"></div>

<div class="full-width-split group">
    <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">All Posts</h2>

        <?php
        $args = [
            'post_type' => 'post'
        ];

        $post_query = new WP_Query($args);

        if ($post_query->have_posts()) :
            while ($post_query->have_posts()) :
                $post_query->the_post();
        ?>
                <div class="event-summary">
                    <a class="event-summary__date t-center" href="">
                        <span class="event-summary__month">
                            <?= get_the_date('M') ?>
                        </span>
                        <span class="event-summary__day">
                            <?= get_the_date('d') ?>
                        </span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny">
                            <a href="<?= the_permalink() ?>"><?= the_title() ?></a>
                        </h5>
                        <p><?= the_excerpt() ?></p>
                    </div>
                </div>

        <?php
            endwhile;
        else :
            _e('Sorry, no post here');
        endif;

        ?>
    </div>
</div>
    <?php get_footer() ?>