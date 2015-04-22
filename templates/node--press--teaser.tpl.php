<?php //dpm($variables);

 $nodo= $node->nid;
 ?>

<article id="node-<?php print $nodo?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
	  hide($content['field_image']);
	  hide($content['field_title']);
	  hide($content['field_semana_id']);
      //print render($content);
      //hide($content[]);
      print render($content['field_image']); 

    $titulo = field_get_items('node', $node, 'title_field');
  //  print strlen(strip_tags($titulo[0]['value']));
    if (strlen(strip_tags($titulo[0]['value'])) > 77):    
       $titulo_truncado = truncate_utf8(strip_tags($titulo[0]['value']), 77, False, TRUE,1);
//       $path = drupal_lookup_path('alias', 'node/'.$node->nid, $language); 
       //print render($node->path['pathauto']);
//       print ('<div class="field field-name-title-field field-type-text field-label-hidden"><div class="field-items"><div class="field-item even"><h3><a href="/' . $path . '">' . $titulo_truncado . '</a></h3></div></div></div>');
         print ('<div class="field field-name-title-field field-type-text field-label-hidden"><div class="field-items"><div class="field-item even"><h3><a href="/node/' . $node->nid . '">' . render($titulo_truncado) . '</a></h3></div></div></div>');
    else:
         print render($content['title_field']);  
    endif;

    // if ($display_submitted):    ?>
    <!--span class="glyphicon glyphicon-calendar" ></span--> 
      <div class="fecha">
        <?php // print $user_picture; ?>
        
        <?php
    		   print format_date($node->created, 'dia'); 
         ?>
      </div>
<?php 
     $body = field_get_items('node', $node, 'body');
    $cuerpo_truncado = truncate_utf8(strip_tags($body[0]['value']), 300, FALSE, TRUE,1);      
      
      print ('<div class="field field-name-body field-type-text-with-summary field-label-hidden">' .  render($cuerpo_truncado) . '</div>');  
     
    ?>
  </div>

  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
    <?php print render($content['field_tags']); ?>
    <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

</article>
