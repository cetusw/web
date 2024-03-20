<?php
if ($post_featured['title'] == 'From Top Down') {
    $featured_post = 'featured-post-mark';
} else {
    $featured_post = 'featured-post';
}
?>

<div class="<?php echo $featured_post; ?>"
  style="background: url(<?= $post_featured['img_back']?>) no-repeat;
  background-size: cover;
  width: 420px;
  border-radius: 3px;">
  <?php
  if ($post_featured['title'] == 'From Top Down') {
    echo '<div class="featured-post__type">ADVENTURE</div>';
  }
  ?>
  <h3 class="featured-post__title"><?= $post_featured['title']?></h3>
  <h4 class="featured-post__subtitle"><?= $post_featured['subtitle']?></h4>
  <div class="featured-post__bottom-bar">
    <img class="featured-post__avatar" src="<?= $post_featured['img_author']?>" alt="Error">
    <span class="featured-post__name"><?= $post_featured['author']?></span>
    <span class="featured-post__date"><?= $post_featured['date']?></span>
  </div>
</div>