<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dolphincargo
 */

get_header();
?>

  <section class="error-404 not-found">
    <?php get_template_part('template-parts/decor-lines');?>
    <div class="light top-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="404"></div>
    <div class="light bottom-pic"><img src="<?php echo THEME_PATH;?>/assets/img/faq-block-light.png" alt="404"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="content col-12 text-center">
          <div class="pic-wrapper">
            <img
               src="<?php echo THEME_PATH;?>/assets/img/pic-404.png"
               alt="404"
            >
          </div>
          <h2><?php echo esc_html( pll__( 'Сторінки не знайдено' ) ); ?></h2>
          <p><?php echo esc_html( pll__( 'Вибачте, сторінка, яку ви шукаєте, не існує або була переміщена.' ) ); ?></p>
          <a href="<?php echo get_home_url('/');?>" class="button blue-btn"><?php echo esc_html( pll__( 'Повернутись на головну' ) ); ?></a>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
