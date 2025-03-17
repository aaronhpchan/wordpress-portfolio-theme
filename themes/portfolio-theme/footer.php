<footer class="footer">
  <div class="footer__container">
    <div class="footer__item">
      <p><?php echo get_bloginfo('name'); ?></p>
      <p><?php echo get_bloginfo('description'); ?></p>
    </div>
    <div class="footer__item">
      <p>Social</p>
      <ul class="footer__icon-list">
        <?php 
          $socials = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'social',
            'meta_key' => 'social_order', 
            'orderby' => 'meta_value_num',
            'order' => 'ASC'
          ));

          while($socials->have_posts()) {
            $socials->the_post(); ?>
            <li>
              <a href="<?php the_field('social_link') ?>" target="_blank">
                <i class="<?php the_field('social_class') ?>" aria-hidden="true"></i>
              </a>
            </li>
          <?php }
        ?>
      </ul>
    </div>
  </div>
  <div class="footer__copyright">
    <small>&copy; Copyright <?php echo date("Y"); ?>. Developed by <?php echo get_bloginfo('name'); ?></small>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>