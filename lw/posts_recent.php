<div class="recent-post">
  <img class="recent-post__image" src="<?= $post_recent['img_back']?>" alt="Error">
  <div class="recent-post__content">
    <h5 class="recent-post__title"><?= $post_recent['title']?></h5>
    <a title='<?= $post_recent['title'] ?>' href='/post?id=<?= $post_recent['id'] ?>' class="recent-post__subtitle">
      <?= $post_recent['subtitle'] ?>
    </a>
  </div>
  <div class="recent-post__divider"></div>
  <div class="recent-post__bottom-bar">
    <img class="recent-post__avatar" src="<?= $post_recent['img_author'] ?>" alt="Error">
    <span class="recent-post__name"><?= $post_recent['author'] ?></span>
    <span class="recent-post__date"><?= $post_recent['date'] ?></span>
  </div>
</div>

