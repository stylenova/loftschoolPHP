<?php
// my style css
function tourist_style() {
    wp_enqueue_style( 'top-tourist-style', get_stylesheet_uri() );
    wp_enqueue_style( 'style-normolaze', get_template_directory_uri() . '/stylenova/css/vendor/normalize.css');
    wp_enqueue_style( 'style-libs', get_template_directory_uri() . '/stylenova/css/libs.css');
    wp_enqueue_style( 'style-main', get_template_directory_uri() . '/stylenova/css/main.css');
    wp_enqueue_style( 'style-media', get_template_directory_uri() . '/stylenova/css/media.css');
}
add_action( 'wp_enqueue_scripts', 'tourist_style' );

//my scripts
function top_pictures_js() {
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/stylenova/js/main.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'top_pictures_js' );

//http://gnatkovsky.com.ua/vyvod-sluchajnyx-zapisej-wordpress-c-miniatyurami-bez-plagina.html

// Получение первой картинки с поста
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

// Если изображение отсутствует, то выводим изображение по умолчанию (указать путь к изображению)
    if(empty($first_img)){
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}

// Выводим ограниченное количество спмволов записи php the_truncated_post( 450 );
function the_truncated_post($symbol_amount) {
    $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
    echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}


// Register Custom Post Type
function custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Акция', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Stock', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Акции', 'text_domain' ),
        'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'Все акции', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Добавить акцию', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Stock', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'Stock', $args );

}
add_action( 'init', 'custom_post_type', 0 );