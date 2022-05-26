<?php 
get_header();

$banner_image = get_field('banner_image');
bannerImage(array(
    'title' => get_the_archive_title(),
    'intro' => get_the_archive_description(),
    'image' => $banner_image['url']
));
?>

<div class="container container--narrow page-section">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title">
                    <a href="<?php the_permalink() ?>">
                        <?php the_title() ?>
                    </a>
                </h2>

                <div class="metabox">
                    <p>Posted by <?php the_author_posts_link() ?> on <?php the_time('M d, Y') ?> in <?= get_the_category_list() ?></p>
                </div>

                <div class="generic-content">
                    <?php the_excerpt() ?>
                    <p>
                        <a href="<?php the_permalink() ?>">
                            Continue Reading
                        </a>
                    </p>
                </div>
            </div>

            <hr class="section-break" />
    <?php
        endwhile;
        echo paginate_links();
    else :
        _e('Sorry, no post here');
    endif;

    ?>
</div>

<?php get_footer() ?>