<article class="card" id="post-<?php the_ID(); ?>">

  <?php if ( is_single() ) : ?>
    <div>
  <?php else: ?>
    <a href="<?php the_permalink(); ?>"
      title="<?php the_title(); ?>"
      rel="bookmark"
      class="card_link"
    >
  <?php endif; ?>

      <?php if ( wd_is_latest_post( get_the_ID() ) ): ?>
        <span class="cart_tag">Latest</span>
      <?php endif; ?>

      <?php if ( is_single() ) : ?>
        <a href="<?php the_permalink(); ?>"
          title="<?php the_title(); ?>"
          rel="bookmark"
          class="card_link"
        >
      <?php endif; ?>
          <h2 class="text text_type-2 card_title">
            <?php the_title(); ?>
          </h2>
      <?php if ( is_single() ) : ?>
        </a>
      <?php endif; ?>

      <p class="text">
        <span class="text_type-4 card_info_item">
          <?php the_time('j. F Y'); ?>
        </span>

        <span class="text_type-4 card_info_item">
          <?php comments_number('Keine Kommentare', '1 Kommentar', '% Kommentare'); ?>
        </span>

        <span class="text_type-4 card_info_item">1:01:44h</span>
      </p>
  <?php if ( is_single() ) : ?>
    </div>
  <?php else: ?>
    </a>
  <?php endif; ?>

  <div class="card_audio audio" data-audio>
    <audio preload="auto" class="card_audio--320" data-audio-player>
      <source src="/wd-320.mp3" type="audio/mpeg">
    </audio>
  </div>

  <?php if ( !is_single() ) : ?>
    <a href="<?php the_permalink(); ?>" class="card_link">
      <div class="text text_type-3">
        <?php the_excerpt(); ?>
      </div>
    </a>

    <div class="card_action">
      <a href="<?php the_permalink() ?>"
        title="<?php the_title(); ?>"
        rel="bookmark"
        class="button"
      >
        Zu den Shownotes
      </a>
    </div>
  <?php else: ?>
    <div class="text--content">
      <?php the_content(); ?>
    </div>
  <?php endif; ?>
</article>
