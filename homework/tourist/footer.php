<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tourist
 */

?>

    <footer class="main-footer">
        <div class="content-footer">
            <div class="bottom-menu">
                <?php
                wp_nav_menu();
                ?>
            </div>
            <div class="copyright-wrap">
                <div class="copyright-text">Туристик<a href="#" class="copyright-text__link"> loftschool 2016</a></div>
            </div>
        </div>
    </footer>
    </div>

<?php wp_footer(); ?>

</body>
</html>
