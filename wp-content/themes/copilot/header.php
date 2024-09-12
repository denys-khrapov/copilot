<!doctype html>
<html>

<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <?php wp_head(); ?>
</head>

<?php
$header_button = get_field('header_button', 'option');
$header_link = get_field('header_link', 'option');
?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper" id="wrapper">
<header class="header" id="header">
  <div class="container">
    <?php if (has_custom_logo()) : ?>
      <div class="logo" itemscope itemtype="http://schema.org/Brand">
        <?php the_custom_logo(); ?>
      </div>
    <?php endif; ?>

    <?php if (has_nav_menu('header-navigation') || $header_button || $header_link) : ?>
      <div class="header-menu">
        <?php if (has_nav_menu('header-navigation')) : ?>
          <?php wp_nav_menu(array(
            'container' => false,
            'theme_location' => 'header-navigation',
            'menu_id' => 'header-navigation',
            'menu_class' => 'header-navigation',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'walker' => new Custom_Walker_Nav_Menu
          )); ?>

        <?php endif; ?>

        <?php if ($header_button || $header_link) : ?>
          <div class="header-buttons">
            <?php if ($header_button):
              $link_url = $header_button['url'];
              $link_title = $header_button['title'];
              $link_target = $header_button['target'] ? $header_button['target'] : '_self';
              ?>
              <a class="btn btn-dark" href="<?php echo esc_url($link_url); ?>"
                 target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            <?php if ($header_link):
              $link_url = $header_link['url'];
              $link_title = $header_link['title'];
              $link_target = $header_link['target'] ? $header_link['target'] : '_self';
              ?>
              <a class="link" href="<?php echo esc_url($link_url); ?>"
                 target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (has_nav_menu('header-navigation')) : ?>
      <div class="menu-burger"><span></span></div>
    <?php endif; ?>
  </div>
</header>

<main class="main" id="main">