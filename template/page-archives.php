<?php 
/**
 * Template Name: 文章归档
 *
**/
get_header(); ?>
<!-- main -->
<main class="main" id="main" role="main">
  <section class="page-content" id="page">
    <div class="container">
      <?php the_content(); ?>
    </div>    
    <div id="pageHeader">
      <div class="container"> <button class="icon icon-list-alt" id="allTogger"></button>
        <h2>News Archives</h2>
      </div>
    </div> 
    <?php zww_archives_list(); ?>   
  </section>
</main>
<?php get_footer(); ?>