<?php

// Kommentar-Output
function theme_comment($comment, $args, $depth){
  $GLOBALS['comment'] = $comment;
  ?>
  <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <h4><?php comment_author_link() ?> <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">#</a></h4>
    <p class="meta">
      Geschrieben am <?php comment_date() ?> um <?php comment_time() ?>
    </p>
    <?php if ($comment->comment_approved == '0'){ echo '<p><em>Der Kommentar muss noch freigeschaltet werden.</em></p>'; } ?>
    <div class="commentcontent"><?php comment_text(); ?></div>
    <p class="reply">
      <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
    </p>
  </div>
  <?php
}

function wd_is_latest_post( $post_id, $query_args = array() ) {
  static $latest_post_id = false;

  if ( !$latest_post_id ) {
    $query_args['numberposts'] = 1;
    $query_args['post_status'] = 'publish';
    $last = wp_get_recent_posts( $query_args );
    $latest_post_id = $last['0']['ID'];
  }

  return $latest_post_id == $post_id;
}
