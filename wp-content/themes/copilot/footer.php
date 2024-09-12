</main>
<?php
$footer_logo = get_theme_mod('footer_logo');
$footer_mobile_logo = get_theme_mod('footer_mobile_logo');
$form_shortcode = get_field('form_shortcode', 'option');
$title = get_field('title', 'option');
?>

<?php if ($title || $footer_logo || $footer_mobile_logo || $form_shortcode || have_rows('social_links')) : ?>
  <footer class="footer">
    <div class="container">
      <?php if ($title) : ?>
        <h2 class="footer-title">  <?php echo wp_kses_post($title); ?></h2>
      <?php endif; ?>
      <div class="footer-top">
        <div class="col-left">
          <div class="form-holder">
            <?php echo do_shortcode($form_shortcode); ?>
          </div>
        </div>
        <div class="col-right">
          <?php if (have_rows('social_links', 'option')): ?>
            <ul class="social-links">
              <?php while (have_rows('social_links', 'option')): the_row();

                $social_image_id = get_sub_field('social_image_id');
                $social_link = get_sub_field('social_link');

                if ($social_image_id && $social_link):
                  $link_url = $social_link['url'];
                  $link_target = $social_link['target'] ?: '_self';
                  ?>
                  <li class="item">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"
                       rel="noopener noreferrer">
                      <?php echo wp_get_attachment_image($social_image_id, 'full'); ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          <div class="footer-menu-holder">
            <div class="col">
              <?php if (has_nav_menu('footer-navigation')) : ?>
                <?php wp_nav_menu(array(
                  'container' => false,
                  'theme_location' => 'footer-navigation',
                  'menu_id' => 'footer-navigation',
                  'menu_class' => 'footer-navigation',
                  'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                )); ?>
              <?php endif; ?>
            </div>
            <div class="col">
              <?php if ($footer_logo) : ?>
                <div class="footer-logo">
                  <a
                    href="<?php echo home_url('/'); ?>"><?php echo wp_get_attachment_image($footer_logo, 'full'); ?></a>
                </div>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
      <div class="footer-bottom">
        <div class="col-left">
          <?php if (has_nav_menu('additional-navigation')) : ?>
            <?php wp_nav_menu(array(
              'container' => false,
              'theme_location' => 'additional-navigation',
              'menu_id' => 'additional-navigation',
              'menu_class' => 'additional-navigation',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            )); ?>
          <?php endif; ?>
        </div>
        <div class="col-right">
          <?php if ($footer_mobile_logo) : ?>
            <div class="footer-mobile-logo">
              <a
                href="<?php echo home_url('/'); ?>"><?php echo wp_get_attachment_image($footer_mobile_logo, 'full'); ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </footer>
<?php endif; ?>
<?php wp_footer(); ?>
</div>
</body>

</html>