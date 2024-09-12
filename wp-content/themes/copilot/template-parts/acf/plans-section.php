<?php
$section_classes = 'plans-section';
$main_title = get_field('main_title');
$title = get_field('title');
$subtitle = get_field('subtitle');
$section_number = get_field('section_number');
?>


<?php if ($title || $main_title || $subtitle || $section_number || have_rows('tabs')) : ?>
  <section class="<?php echo $section_classes; ?>" id="<?php echo $section_classes; ?>">
    <?php if ($main_title) : ?>
      <div class="divider">
        <h2 class="section-title">
          <span><?php echo esc_html($main_title); ?></span>
          <span><?php echo esc_html($main_title); ?></span>
          <span><?php echo esc_html($main_title); ?></span>
        </h2>
      </div>
    <?php endif; ?>
    <div class="inner">
      <div class="content">
        <div class="plans-top">
          <?php if ($section_number) : ?>
            <div class="section-number"><?php echo esc_html($section_number); ?></div>
          <?php endif; ?>

          <?php if ($title) : ?>
            <h3 class="title"><?php echo wp_kses_post($title); ?> </h3>
          <?php endif; ?>

          <?php if ($subtitle) : ?>
            <h4 class="subtitle"><?php echo esc_html($subtitle); ?></h4>
          <?php endif; ?>
        </div>
        <?php if (have_rows('tabs')) : ?>
          <?php
          $i = 0;
          $tabs_nav = '';
          $tabs_content = '';
          ?>
          <?php while (have_rows('tabs')) : the_row(); ?>
            <?php
            $i++;
            $nav_item = get_sub_field('nav_item');
            $nav_discount = get_sub_field('nav_discount');
            $additional_box_title = get_sub_field('additional_box_title');
            $additional_box_text = get_sub_field('additional_box_text');
            $additional_box_link = get_sub_field('additional_box_link');
            $tab_active_class = (1 == $i) ? ' active' : '';
            ?>

            <?php ob_start(); ?>

            <?php if ($nav_item || $nav_discount) : ?>
              <li class="nav-item<?php echo esc_attr($tab_active_class); ?>" data-tab="<?php echo esc_attr($i); ?>">
                <?php echo esc_html($nav_item); ?>

                <?php if ($nav_discount) : ?>
                  <span><?php echo esc_html($nav_discount); ?></span>
                <?php endif; ?>
              </li>
            <?php endif; ?>

            <?php
            $tabs_nav .= ob_get_clean();
            ob_start();
            ?>

            <?php if (have_rows('price_box') || $additional_box_title || $additional_box_text || $additional_box_link) : ?>
              <div class="tab-item <?php echo esc_attr($tab_active_class); ?>"
                   data-tab="<?php echo esc_attr($i); ?>">
                <?php if (have_rows('price_box')) : ?>
                  <div class="swiper plans-swiper">
                    <div class="swiper-wrapper">
                      <?php while (have_rows('price_box')): the_row();
                        $box_title = get_sub_field('box_title');
                        $box_label = get_sub_field('box_label');
                        $box_price = get_sub_field('box_price');
                        $box_period = get_sub_field('box_period');
                        $box_text = get_sub_field('box_text');
                        $box_link = get_sub_field('box_link');
                        $box_list = get_sub_field('box_list');
                        ?>
                        <div class="swiper-slide plans-slide">
                          <div class="box">
                            <?php if ($box_label) : ?>
                              <div class="box-label">
                                <?php echo esc_html($box_label); ?>
                              </div>
                            <?php endif; ?>

                            <?php if ($box_title) : ?>
                              <h5 class="box-title">
                                <?php echo esc_html($box_title); ?>
                              </h5>
                            <?php endif; ?>

                            <?php if ($box_price) : ?>
                              <div class="box-price-holder">
                                <span class="box-currency">$</span>
                                <span class="box-price"><?php echo esc_html($box_price); ?></span>
                                <?php if ($box_period) : ?>
                                  <span class="box-period">/<?php echo esc_html($box_period); ?></span>
                                <?php endif; ?>
                              </div>
                            <?php endif; ?>

                            <?php if ($box_text) : ?>
                              <div class="box-text-holder">
                                <?php echo wp_kses_post($box_text); ?>
                              </div>
                            <?php endif; ?>

                            <?php if ($box_link):
                              $link_url = $box_link['url'];
                              $link_title = $box_link['title'];
                              $link_target = $box_link['target'] ? $box_link['target'] : '_self';
                              ?>
                              <a class="btn btn-orange" href="<?php echo esc_url($link_url); ?>"
                                 target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>

                            <?php if ($box_list) : ?>
                              <div class="box-list">
                                <?php echo wp_kses_post($box_list); ?>
                              </div>
                            <?php endif; ?>

                          </div>
                        </div>
                      <?php endwhile; ?>
                    </div>
                  </div>
                <?php endif; ?>


                <?php if ($additional_box_title || $additional_box_text || $additional_box_link) : ?>
                  <div class="box additional-box">

                    <?php if ($additional_box_title) : ?>
                      <h5 class="box-title">
                        <?php echo esc_html($additional_box_title); ?>
                      </h5>
                    <?php endif; ?>

                    <?php if ($additional_box_text) : ?>
                      <div class="box-text-holder">
                        <?php echo wp_kses_post($additional_box_text); ?>
                      </div>
                    <?php endif; ?>

                    <?php if ($additional_box_link):
                      $link_url = $additional_box_link['url'];
                      $link_title = $additional_box_link['title'];
                      $link_target = $additional_box_link['target'] ? $additional_box_link['target'] : '_self';
                      ?>
                      <a class="btn btn-orange" href="<?php echo esc_url($link_url); ?>"
                         target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php $tabs_content .= ob_get_clean(); ?>
          <?php endwhile; ?>

          <div class="tabs">
            <ul class="tabs-nav"><?php echo $tabs_nav; ?></ul>

            <div class="tabs-content">
              <?php echo $tabs_content; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>