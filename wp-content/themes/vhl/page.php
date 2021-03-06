<?php

get_header();
$post_parent_id = wp_get_post_parent_id();

$wp_list_pages_args = [
    'child_of' => $post_parent_id,
    'depth' => 1,
    'exclude' => get_page_by_path('home')->ID,
    'title_li' => '',
];

?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/ocean.jpg)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title() ?></h1>
        <div class="page-banner__intro">
            <p>Learn how the school of your dreams got started.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <?php
            if ($post_parent_id) :
            ?>
                <a class="metabox__blog-home-link" href="<?= get_permalink($post_parent_id) ?>">
                    <?= get_the_title($post_parent_id) ?>
                </a>
            <?php
            else :
            ?>
                <a class="metabox__blog-home-link" href="<?= get_home_url() ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>

            <?php
            endif
            ?>
            <span class="metabox__main"><?php the_title() ?></span>
        </p>
    </div>

    <div class="page-links">
        <h2 class="page-links__title">
            <?php
            if ($post_parent_id) :
            ?>
                <a href="<?= get_permalink($post_parent_id) ?>"><?= get_the_title($post_parent_id) ?></a>
            <?php
            else :
            ?>
                <a href="<?= get_home_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <?php
            endif
            ?>
        </h2>
        <ul class="min-list">
            <!-- <li class="current_page_item"><a href="#"></?= the_title() ?></a></li> -->
            <?php
            wp_list_pages($wp_list_pages_args);
            ?>
            <!-- <li><a href="#">Our Goals</a></li> -->
        </ul>
    </div>

    <div class="generic-content">
        <?php the_content() ?>
    </div>
</div>

<!-- <div class="page-section page-section--beige">
    <div class="container container--narrow generic-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
    </div>
</div>

<div class="page-section page-section--white">
    <div class="container container--narrow">
        <h2 class="headline headline--medium">Biology Professors:</h2>

        <ul class="professor-cards">
            <li class="professor-card__list-item">
                <a href="#" class="professor-card">
                    <img class="professor-card__image" src="</?php echo get_template_directory_uri() ?>/assets/images/barksalot.jpg" />
                    <span class="professor-card__name">Dr. Barksalot</span>
                </a>
            </li>
            <li class="professor-card__list-item">
                <a href="#" class="professor-card">
                    <img class="professor-card__image" src="</?php echo get_template_directory_uri() ?>/assets/images/meowsalot.jpg" />
                    <span class="professor-card__name">Dr. Meowsalot</span>
                </a>
            </li>
        </ul>
        <hr class="section-break" />

        <div class="row group generic-content">
            <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div>

            <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div>

            <div class="one-third">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
            </div>
        </div>
    </div>
</div> -->

<?php get_footer() ?>