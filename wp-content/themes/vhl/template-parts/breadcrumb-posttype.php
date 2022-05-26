<?php 
$post_type_ID = get_post_type();
?>

<div class="metabox metabox--position-up metabox--with-home-link">
    <p>
        <a class="metabox__blog-home-link" href="<?= get_post_type_archive_link($post_type_ID) ?>">
            <i class="fa fa-home" aria-hidden="true"></i> All Post of <?php echo strtoupper($post_type_ID) ?>
        </a>
        <span class="metabox__main"><?php the_title() ?></span>
    </p>
</div>