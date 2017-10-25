<article id="node-<?php print $node->nid; ?>"
         class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($title_prefix || $title_suffix || $display_submitted || !$page): ?>
      <header>
          <div class="top-image">
            <?php print render($content['field_type']) ?>
          </div>
        <?php print render($title_prefix); ?>
        <?php if (!$page): ?>
            <h2<?php print $title_attributes; ?>><a
                        href="<?php print $node_url; ?>"><?php print $title; ?></a>
            </h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      </header>
  <?php endif; ?>

    <div class="content"<?php print $content_attributes; ?>>
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']); ?>
        <div class="field info-wrapper">
            <div class="contact-info-wrapper col-md-4">
              <?php print render($content['field_phone']);
              print render($content['field_email']);
              print render($content['field_address']);
              print render($content['field_date']);
              print render($content['field_cost']);
              print render($content['field_social_links']);
              print $comment_button;
              print $media_button;
              ?>
            </div>
            <div class="main-info-wrapper col-md-8">
                <div class="title-wrapper">
                  <?php print render($title_prefix); ?>
                    <h2<?php print $title_attributes; ?>><a
                                href="<?php print $node_url; ?>"><?php print $title; ?></a>
                    </h2>
                  <?php print render($title_suffix);
                  print render($used_by_form); ?>
                    <div class="rating-wrapper">
                      <?php
                      print render($content['field_used_by']);
                      print render($content['field_rating']);
                      print render($content['field_count_views']); ?>
                    </div>
                </div>
              <?php print render($content['field_logo']); ?>
                <div class="body-wrapper">
                  <?php print render($content['body']);
                  ?>
                </div>
            </div>
        </div>
      <?php print render($content['field_faq']);
      print render($content['comments']);
//      print render($content['field_geofield']);
      print $field_map; ?>
        <div id="media">
          <?php print render($content['field_photos']);
//          print render($content['field_videos']);
          ?>
        </div>
    </div>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
      <footer>
        <?php print render($content['field_tags']); ?>
        <?php print render($content['links']); ?>
      </footer>
  <?php endif; ?>

</article>