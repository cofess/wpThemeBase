<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Matthias Thom | http://upplex.de
 * @package upBootWP 1.1
 */

get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          <article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-uncategorized">
            <header class="entry-header">
              <h1 class="entry-title"><a href="" rel="bookmark">世界，您好！</a></h1>
              <div class="entry-meta"> <span class="posted-on">Posted on <a href="" title="下午1:11" rel="bookmark">
                <time class="entry-date published" datetime="2015-12-05T13:11:47+00:00">2015年12月5日</time>
                </a></span><span class="byline"> by <span class="author vcard"><a class="url fn n" href="" title="View all posts by webmaster">webmaster</a></span></span> </div>
              <!-- .entry-meta --> 
            </header>
            <!-- .entry-header -->
            
            <div class="entry-summary">
              <p>欢迎使用WordPress。这是您的第一篇文章。编辑或删除它，然后开始写作吧！</p>
            </div>
            <!-- .entry-summary -->
            
            <footer class="entry-meta"> <span class="comments-link"><a href="">1 Comment</a></span> </footer>
            <!-- .entry-meta --> 
          </article>
          <!-- #post-## --> 
          <article id="post-1" class="post-1 post type-post status-publish format-standard hentry category-uncategorized">
            <header class="entry-header">
              <h1 class="entry-title"><a href="" rel="bookmark">世界，您好！</a></h1>
              <div class="entry-meta"> <span class="posted-on">Posted on <a href="" title="下午1:11" rel="bookmark">
                <time class="entry-date published" datetime="2015-12-05T13:11:47+00:00">2015年12月5日</time>
                </a></span><span class="byline"> by <span class="author vcard"><a class="url fn n" href="" title="View all posts by webmaster">webmaster</a></span></span> </div>
              <!-- .entry-meta --> 
            </header>
            <!-- .entry-header -->
            
            <div class="entry-summary">
              <p>欢迎使用WordPress。这是您的第一篇文章。编辑或删除它，然后开始写作吧！</p>
            </div>
            <!-- .entry-summary -->
            
            <footer class="entry-meta"> <span class="comments-link"><a href="">1 Comment</a></span> </footer>
            <!-- .entry-meta --> 
          </article>
          <!-- #post-## --> 		  
          
        </main>
        <!-- #main --> 
      </div>
      <!-- #primary --> 
    </div>
    <!-- .col-md-8 -->
    
    <div class="col-md-4">
      <div id="secondary" class="widget-area well well-sm" role="complementary">
        <aside id="search-2" class="widget widget_search">
          <form role="search" method="get" class="search-form form-inline" action="">
            <div class="form-group">
              <input type="search" class="search-field form-control" placeholder="Search &hellip;" value="" name="s" title="Search for:">
            </div>
            <input type="submit" class="search-submit btn btn-default" value="Search">
          </form>
        </aside>
        <aside id="recent-posts-2" class="widget widget_recent_entries">
          <h4 class="widget-title">近期文章</h4>
          <ul>
            <li> <a href="">世界，您好！</a> </li>
          </ul>
        </aside>
        <aside id="recent-comments-2" class="widget widget_recent_comments">
          <h4 class="widget-title">近期评论</h4>
          <ul id="recentcomments">
            <li class="recentcomments"><span class="comment-author-link"><a href='' rel='external nofollow' class='url'>WordPress先生</a></span>发表在《<a href="">世界，您好！</a>》</li>
          </ul>
        </aside>
        <aside id="archives-2" class="widget widget_archive">
          <h4 class="widget-title">文章归档</h4>
          <ul>
            <li><a href=''>2015年十二月</a></li>
          </ul>
        </aside>
        <aside id="categories-2" class="widget widget_categories">
          <h4 class="widget-title">分类目录</h4>
          <ul>
            <li class="cat-item cat-item-1"><a href="" >未分类</a> </li>
          </ul>
        </aside>
        <aside id="meta-2" class="widget widget_meta">
          <h4 class="widget-title">功能</h4>
          <ul>
            <li><a href="">管理站点</a></li>
            <li><a href="">登出</a></li>
            <li><a href="">文章<abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="">评论<abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="" title="基于WordPress，一个优美、先进的个人信息发布平台。">WordPress.org</a></li>
          </ul>
        </aside>
      </div>
      <!-- #secondary --> 
    </div>
    <!-- .col-md-4 --> 
  </div>
  <!-- .row --> 
</div>
<!-- .container -->
<?php get_footer(); ?>
