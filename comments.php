<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die(); ?>
<?php if(post_password_required()){ echo '<p>Dieser Beitrag ist passwortgeschützt.</p>'; return; } ?>

<div id="comments">
  <h3 class="text text_type-2 comments_headline">Kommentare</h3>

  <div class="card">
    <?php if ($comments) : ?>
      <?php wp_list_comments(array('callback' => 'theme_comment')); ?>
    <?php else : ?>
        <p>Noch keine Kommentare oder Backlinks.</p>
    <?php endif; ?>
  </div>

  <div class="card">
    <?php comments_rss_link('RSS-Feed zu diesem Beitrag'); ?>
  </div>

  <?php if (comments_open()) : ?>
    <section class="card">
      <fieldset id="kommentarformular">
        <?php comment_form(); ?>
      </fieldset>
    </section>
  <?php endif; ?>

  <?php if (!comments_open()) : ?>
    <div class="card">
      <p>Kommentare sind für diesen Beitrag geschlossen.</p>
    </div>
  <?php endif; ?>
</div>
