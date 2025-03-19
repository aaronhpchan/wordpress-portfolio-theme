<?php get_header(); ?>

<div class="banner" id="banner">
  <div class="banner-container fade-in">
    <div>
      <div class="banner-container__text">
        <h1><span class="banner-intro">Hello, I am</span><?php echo get_bloginfo('name'); ?></h1>
        <p class="banner-role"><span class="banner-role__text"></span></p>
      </div>
      <div class="banner-links__wrapper">
        <a href="#contact">
          <button>Contact</button>
        </a>
      </div>
    </div>
  </div>
  <div class="banner-container fade-in">
    <img src="<?php echo get_theme_file_uri('/images/header_img.png'); ?>">
  </div>
</div>

<div class="skills">
  <div class="skills-container">
    <?php 
      $skills = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'skill',
        'meta_key' => 'skill_order', 
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
      ));

      while($skills->have_posts()) {
        $skills->the_post(); ?>
        <div class="skills-item">
          <i class="<?php the_field('skill_class') ?>" aria-hidden="true"></i>
          <p><?php the_title(); ?></p>
        </div>
      <?php }
    ?>
  </div>
</div>

<div class="about" id="about">
  <?php 
    $about = new WP_Query(array(
      'posts_per_page' => 1,
      'post_type' => 'about'
    ));

    while($about->have_posts()) {
      $about->the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <div class="about-container">
        <div class="about-img fade-in">
          <img src="<?php echo the_post_thumbnail_url(); ?>">
        </div>
        <div class="about-info fade-in">
          <div class="about-info__text"><?php the_content(); ?></div>
          <div class="about-info__container">
            <div>
              <p class="about-info__field">Location</p>
              <p><?php the_field('about_location'); ?></p>
            </div>
            <div>
              <p class="about-info__field">Education</p>
              <p><?php the_field('about_education'); ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php }
  ?>
</div>

<div class="projects" id="projects">
  <h2>Projects</h2>
  <?php 
    $projects = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'project',
      'meta_key' => 'project_order', 
      'orderby' => 'meta_value_num',
      'order' => 'ASC'
    ));

    $projectNum = $projects->found_posts;
    if ($projectNum) {
      for ($i = 0; $i < $projectNum; $i++) {
        $projects->the_post(); ?>
        <div class="projects-container">
          <div class="projects-item fade-in slide-in <?php if ($i % 2 == 0) echo 'projects-item__right animation-right'; if ($i % 2 !== 0) echo 'animation-left'; ?>">
            <a href="<?php the_field('project_link'); ?>" target="_blank">
              <img src="<?php echo the_post_thumbnail_url(); ?>">
            </a>
          </div>
          <div class="projects-item fade-in slide-in <?php if ($i % 2 == 0) echo 'animation-left'; if ($i % 2 !== 0) echo 'animation-right'; ?>">
            <div class="projects-item__info">
              <h3><a href="<?php the_field('project_link'); ?>" target="_blank"><?php the_title(); ?></a></h3>
              <div>
                <?php 
                  $projectSkills = get_field('project_skills');
                  if($projectSkills) {
                    foreach($projectSkills as $skill) { ?>
                      <span><?php echo get_the_title($skill); ?></span>
                    <?php }
                  }
                ?>
              </div>
              <p><?php echo wp_trim_words(get_the_content(), 100); ?></p>
              <div class="projects-item__links">
                <a href="<?php the_field('project_link'); ?>" target="_blank">View Live</a>
                <a href="<?php the_field('project_code'); ?>" target="_blank">Source Code</a>
              </div>           
            </div>
          </div>
        </div>
      <?php }
    }
  ?>
</div>

<div class="contact" id="contact">
  <h2>Contact Me</h2>
  <div class="contact-container">
    <div class="contact-map fade-in">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d92025.38686629602!2d-79.3819386976085!3d43.88083323127541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d4d5efa0324ca9%3A0xf73d52812cb23d63!2sMarkham%2C%20ON!5e0!3m2!1sen!2sca!4v1742154520650!5m2!1sen!2sca" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contact-form fade-in">
      <?php echo do_shortcode('[wpforms id="77"]'); ?>
    </div>  
  </div>
</div>

<?php get_footer(); ?>