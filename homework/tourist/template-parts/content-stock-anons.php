<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tourist
 */

?>

<div class="post-wrap">
    <div class="post-thumbnail">
        <img src="<?php echo catch_that_image() ?>" alt="Изображение поста" class="post-thumbnail__image">
    </div>
    <div class="post-content">
        <div class="post-content__post-info">
            <div class="post-date"><?php the_date(); ?></div>
        </div>
        <div class="post-content__post-text">
            <div class="post-title">
                <?php the_title(); ?>
            </div>
            <p>
                <?php the_truncated_post( 450 );?>
            </p>
        </div>
        <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
    </div>
</div>
