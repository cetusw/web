<div class="featured-post"
  style="background: url(<?= $post_featured['img_back']?>) no-repeat;">
  <?php
  if ($post_featured['title'] == 'From Top Down') {
    echo '<div class="featured-post__type">ADVENTURE</div>';
  }
  ?>
  <h3 class="featured-post__title"><?= $post_featured['title'] ?></h3>
  <a title='<?= $post_featured['title'] ?>' href='/post?id=<?= $post_featured['id'] ?>' class="featured-post__subtitle">
    <?= $post_featured['subtitle'] ?>
  </a>
  <div class="featured-post__bottom-bar">
    <img class="featured-post__avatar" src="<?= $post_featured['img_author'] ?>" alt="Error">
    <span class="featured-post__name"><?= $post_featured['author'] ?></span>
    <span class="featured-post__date"><?= $post_featured['date'] ?></span>
  </div>

</div>