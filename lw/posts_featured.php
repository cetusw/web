<div class="featured-post"
  style="background: url(<?= $post['image_url'] ?>) no-repeat;">
  <?php
  if ($post['adventure'] == 1) {
    echo '<div class="featured-post__type">ADVENTURE</div>';
  }
  ?>
  <h3 class="featured-post__title"><?= $post['title'] ?></h3>
  <a title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>' class="featured-post__subtitle">
    <?= $post['subtitle'] ?>
  </a>
  <div class="featured-post__bottom-bar">
    <img class="featured-post__avatar" src="<?= $post['author_url'] ?>" alt="Error">
    <span class="featured-post__name"><?= $post['author'] ?></span>
    <span class="featured-post__date"><?= date("F d, Y", $post['publish_date']) ?></span>
  </div>

</div>