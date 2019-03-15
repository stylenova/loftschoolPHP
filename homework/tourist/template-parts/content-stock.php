<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tourist
 */

?>

<div class="main-content">
    <div class="content-wrapper">
        <div class="content">
            <div class="article-title title-page">
                <?php the_title(); ?>
            </div>
            <div class="article-image"><img src="<?php echo catch_that_image() ?>" alt="Изображение поста" class="post-thumbnail__image"></div>
            <div class="article-info">
                <div class="post-date"><?php the_date(); ?></div>
            </div>
            <div class="article-text">
                <?php the_content(); ?>
            </div>

            <div class="article-pagination">
                <?php
                $previousPost = get_adjacent_post(true, "", true);
                $nextPost = get_adjacent_post(true);
                ?>

                <?php if($previousPost) : ?>
                    <div class="article-pagination__block pagination-prev-left">
                        <a href="<?php echo get_permalink($previousPost->ID)?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
                        <div class="wrap-pagination-preview pagination-prev-left">
                            <div class="preview-article__img"><?php echo get_the_post_thumbnail($prev->ID, array(125,125, true) ); ?></div>
                            <div class="preview-article__content">
                                <div class="preview-article__info"><a href="#" class="post-date"><?php echo $previousPost->post_date;?></a></div>
                                <div class="preview-article__text"><?php echo $previousPost->post_title;?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($nextPost) : ?>
                    <div class="article-pagination__block pagination-prev-left">
                        <a href="<?php echo get_permalink($nextPost->ID)?>" class="article-pagination__link">Следующая статья<i class="icon icon-angle-double-right"></i></a>
                        <div class="wrap-pagination-preview pagination-prev-right">
                            <div class="preview-article__img"><?php echo get_the_post_thumbnail($nextPost->ID, array(125,125, true) ); ?></div>
                            <div class="preview-article__content">
                                <div class="preview-article__info"><a href="#" class="post-date"><?php echo $nextPost->post_date;?></a></div>
                                <div class="preview-article__text"><?php echo $nextPost->post_title;?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- sidebar-->
        <div class="sidebar">
            <div class="sidebar__sidebar-item">
                <?php
                get_sidebar();

                if (function_exists('wp_tag_cloud')){
                echo '<h2 class="sidebar-item__title">Теги</h2>'; ?>
                <div class="sidebar-item__content">
                    <?php wp_tag_cloud('smallest=8&largest=22');
                    } ?>
                </div>

            </div>
        </div>
    </div>
</div>
