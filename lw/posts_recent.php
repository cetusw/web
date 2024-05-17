<div class="recent-post">
  <img class="recent-post__image" src="<?= $post['image_url_small']?>" alt="Error">
  <div class="recent-post__content">
    <h5 class="recent-post__title"><?= $post['title']?></h5>
    <a title='<?= $post['title'] ?>' href='/post?id=<?= $post['id'] ?>' class="recent-post__subtitle">
      <?= $post['subtitle'] ?>
    </a>
  </div>
  <div class="recent-post__divider"></div>
  <div class="recent-post__bottom-bar">
    <img class="recent-post__avatar" src="<?= $post['author_url'] ?>" alt="Error">
    <span class="recent-post__name"><?= $post['author'] ?></span>
    <span class="recent-post__date"><?= date("n/j/Y", $post['publish_date']) ?></span>
  </div>
</div>

