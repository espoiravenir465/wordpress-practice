<!DOCTYPE html>
<html lang="ja">
<head prefix="og:http://ogp.me/ns# article: http://ogp.me/ns/article#">
<meta charset="UTF-8">
<title>
<?php wp_title('|',true,'right');?>
<?php bloginfo( 'name' ); ?>
</title>

<meta name="viewport"
content="width=device-width",initial-scale=1.0">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

<?php if(is_single()): //記事の個別ページ用のメタデータ ?>
  <meta name="description" content="<?php echo wp_trim_words( $post->post_content,100,'...'); ?>">

  <?php if( has_tag()): ?>
    <?php $tags=get_the_tags();
    $kwds=array();
    foreach ($tags as $tag) {
    $kwds[]=$tag->name;
  }?>
  <meta name="keywords" content="<?php echo implode( ',' , $kwds); ?>">
<?php endif; ?>

  <meta property="og:type" content="article">
  <meta property="og:title" content="<?php the_title();?>">
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:description" content="<?php echo wp_trim_words( $post->post_content,100,'...');?>">

  <?php if(has_post_thumbnail()):?>
    <?php $postthumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'large'); ?>
    <meta property="og:image" content="<?php echo $postthumb[0]; ?>">
  <?php elseif(preg_match('/wp-image-(\d+)/s',$post->post_content,$thumbid)): ?>
    <?php $postthumb =wp_get_attachment_image_src($thumbid[1],'large');?>
    <meta property="og:image" content="<?php echo $postthumb[0]; ?>">
  <?php else:?>
    <meta property="og:image" content="<?php echo get_template_directory_uri();?>/picnic.jpg">
  <?php endif;?>

<meta property="article:publisher" content="https://www.facebook.com/ebisucom">
<?php endif;//記事の個別ページ用のメタデータ【ここまで】?>

<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<meta property="og:locale" content="ja_JP">

<meta name="twitter:site" content="@ebisucom">
<meta name="twitter:card" content="summary_large_image">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header>
  <div class="header-inner">
  <div class="site">
    <h1><a href="<?php echo home_url(); ?>">
    <img src="<?php echo get_template_directory_uri();?>/picnic-4x.png"
    alt="<?php bloginfo( 'name' ); ?>" width="112" height="25">
  </a></h1>
</div>
</div>

  </header>
