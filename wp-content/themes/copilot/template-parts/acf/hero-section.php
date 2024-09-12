<?php
$section_classes = 'hero-section';
$title = get_field('title');
$text = get_field('text');
$button_link = get_field('button_link');
$link = get_field('link');
?>

<?php if ($title || $text || $button_link || $link) : ?>
  <section class="<?php echo $section_classes; ?>">
    <div class="content container">
      <?php if ($title) : ?>
        <h1 class="main-title"><?php echo wp_kses_post($title); ?></h1>
      <?php endif; ?>

      <?php if ($text) : ?>
        <div class="text-holder">
          <?php echo esc_html($text); ?>
        </div>
      <?php endif; ?>

      <?php if ($button_link || $link) : ?>
        <div class="hero-buttons">
          <?php if ($button_link):
            $link_url = $button_link['url'];
            $link_title = $button_link['title'];
            $link_target = $button_link['target'] ? $button_link['target'] : '_self';
            ?>
            <a class="btn btn-orange" href="<?php echo esc_url($link_url); ?>"
               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          <?php endif; ?>

          <?php if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="link" href="<?php echo esc_url($link_url); ?>"
               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
          <?php endif; ?>


        </div>
      <?php endif; ?>

    </div>
  </section>
<?php endif; ?>