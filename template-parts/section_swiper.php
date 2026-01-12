<?php
$characters_query = $args['characters_query'] ?? null;

if ($characters_query && $characters_query->have_posts()) :
?>
  <section class="swiper mySwiper">
    <div class="swiper-wrapper">
      <?php while ($characters_query->have_posts()) : $characters_query->the_post(); ?>
        <div class="swiper-slide">
          <?php the_post_thumbnail('full'); ?>
          <figcaption><?php the_title(); ?></figcaption>
        </div>
      <?php endwhile; ?>
    </div>
    <!-- Pagination ou navigation ici si besoin -->
  </section>
<?php
  wp_reset_postdata();
endif;
?>