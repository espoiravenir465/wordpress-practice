<?php get_header(); ?>

<div class="sub-header">
  <div class="bread">
    <?php if(has_category()): ?>
      <?php $postcats=get_the_category(); ?>
      <?php foreach($postcats as $postcat): ?>
    <ol>
      <li><a href="<?php echo home_url(); ?>">
        <i class="fa fa-home"></i><span>TOP</span></a></li>

        <li>
            <?php echo get_category_parents( $postcat,true,'</li><li>'); ?>
            <a><?php the_title(); ?></a>
          </li>
      </ol>
    <?php endforeach;?>
  <?php endif;?>
    </div>
</div>

<div class="container">
<div class="contents">
  <?php if(have_posts()): while(have_posts()):the_post(); ?>
    <article <?php post_class('kiji'); ?>>

      <div class="kiji-tag">
        <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
      </div>

      <h1><?php the_title(); ?></h1>

<div class="kiji-date">
  <i class="fa fa-pencil"></i>
      <time datetime="<?php echo get_the_date( 'Y年m月d日'); ?>">
        投稿:<?php echo get_the_date(); ?>
      </time>

      <?php if(get_the_modified_date( 'Ymd' )> get_the_date( 'Ymd' )): ?>

      <time datetime="<php echo get_the_modified_date( 'Y年m月d日'); ?>">
        更新:<?php echo get_the_modified_date(); ?>
      </time>
    <?php endif; ?>
    </div>


      <?php if(has_post_thumbnail()):?>
        <div class="catch">
          <?php the_post_thumbnail('large');?>
          <p class="wp-caption-text">
            <?php echo get_post(get_post_thumbnail_id())->post_excerpt;?>
          </p>
        </div>
      <?php endif;?>

<div class="kiji-body">
      <?php the_content(); ?>
</div>
      <div class="share">
        <ul>
          <li><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() . ' - ' . get_bloginfo('name'));?>
            &amp;url=<?php echo urlencode( get_permalink()); ?>
             &amp;via=ebisucom" onclick="window.open(this.href,'SNS','width=500,height=300,menubar=no,toolbar=no,scrollbars=yes'); return false;" class="share-tw">
            <i class="fa fa-twitter"></i>
            <span>Twitter</span>でシェア
          </a></li>
          <li><a href="http://www.facebook.com/share.php?u=<?php echo urlencode( get_permalink()); ?>"
            onclick="window.open(this.href,'SNS','width=500,height=500,menubar=no,toolbar=no,scrollbar=yes');return false;" class="share-fb">
            <i class="fa fa-facebook"></i>
              <span>Facebook</span>でシェア
            </a></li>
            <li><a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink());?>"
              onclick="window.open(this.href,'SNS','width=500,height=500,menubar=no,toolbar=no,scrollbar=yes');return false;" class="share-gp">
              <i class="fa fa-google-plus"></i>
              <span>Google+</span>でシェア
            </a></li>
          </ul>
        </div>

    </article>
  <?php endwhile;endif; ?>
</div>

<div class="sub">
  <?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
