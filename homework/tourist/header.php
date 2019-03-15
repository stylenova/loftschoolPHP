<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tourist
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <header class="main-header">
            <div class="top-header">
                <div class="top-header__wrap">
                    <div class="logotype-block">
                        <div class="logo-wrap"><a href="/"><img src="<?= get_template_directory_uri()?>/stylenova/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
                    </div>
                    <nav class="main-navigation">
                        <?php
                        wp_nav_menu();
                        ?>
                    </nav>
                </div>
            </div>
            <div class="bottom-header">
                <div class="search-form-wrap">
                    <form class="search-form" method="post" action="/">
                        <input type="text" placeholder="Поиск..." class="search-form__input" name="s">
                        <button class="search-form__btn-search"><i class="icon icon-search"></i></button>
                    </form>
                </div>
            </div>
        </header>
