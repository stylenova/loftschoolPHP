<?php
/*
Template Name: Мой шаблон страницы
Template Post Type: post, page, product
*/

get_header();
?>

    <!-- header_end-->
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Последние новости и акции из мира туризма</h1>
                <?php
                $query = query_posts([
                    'post_type' => ['post', 'stock']
                ]);
                ?>

                <div class="posts-list">
                    <!-- post-mini-->
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                        the_post(); ?>

                        <div class="post-wrap">
                            <div class="post-thumbnail">
                                <img src="<?php echo catch_that_image() ?>" alt="Изображение поста"
                                     class="post-thumbnail__image">
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
                                        <?php the_truncated_post(450); ?>
                                    </p>
                                </div>
                                <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a>
                                </div>
                            </div>
                        </div>

                    <?php
                        endwhile;
                    endif;
                    ?>

                    <!-- post-mini_end-->
                </div>
                <div class="pagenavi-post-wrap">
                    <?php echo paginate_links(); ?>
                </div>
            </div>
            <?php
            wp_reset_postdata();
            wp_reset_query();
            ?>
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

<?php
//get_sidebar();
get_footer();
