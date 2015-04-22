<?php //dpm($node);
/**drupal_add_js("jQuery(document).ready(function () 
{
 // var original_html = JQuery('.field.field-name-body.field-type-text-with-summary.field-label-hidden').text();
 // var length = 380;
 // var truncated_text = JQuery.trim(original_html).substring(0, length).split(" ").slice(0, -1).join(" ") + " ";
  

});", array(
  'type' => 'inline',
  'scope' => 'footer',
  'group' => JS_THEME,
  'weight' => 5,
));
****/

 ?>

<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || !$page): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page): ?>
      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

  </header>
  <?php endif; ?>

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
//      print render($content['title_field']);      


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
    
    
    if ($display_submitted):    ?>
    <!--span class="glyphicon glyphicon-calendar" ></span--> 
      <div class="fecha">
        <?php // print $user_picture; ?>
        
        <?php
        


            switch ($categoria) {
				case '18':  // daily
				   print format_date($node->created, 'dia'); 
				   break;
				case '3':  // weekly
				   print render($content['field_semana_id'] );
				   print t(' of ') . t(format_date($node->created, 'mes')); 
				   break;
				case '4':  // monthly
				   print format_date($node->created, 'mes'); 
				   break;
				case '19': // quartly
				   print render($content['field_trimestre']);
				   print format_date($node->created, 'custom', t('Y')); 
				   break;
				case '20':  // special
				   print format_date($node->created, 'dia'); 
				   break;
				default:
				   print format_date($node->created, 'dia'); 
				   break;
				}
      
           
         ?>
      </div>
<?php endif;
  
      //$cuerpo_truncado = truncate_utf8(strip_tags($node->body[$node->language]['0']['value']), 380, False, TRUE,1);
    
    $body = field_get_items('node', $node, 'body');
//   $teaser = field_view_value('node', $node, 'body', $body[0],'Teaser');

//$object = entity_metadata_wrapper('node', $node);
//$field = $object->body->value();

   $body_sin_formato = strip_tags($body[0]['value']);
   $cuerpo_truncado = truncate_utf8($body_sin_formato, 320, FALSE, TRUE,1);
    //  print_r($body);
      
   
    //$cuerpo_truncado = field_extract_values('node', $node, 'body', array('formatter' => 'teaser'));
   
  //  $cuerpo_truncado = field_view_field('node', $node, 'body', 'Teaser');
    
     print ('<div class="cuerpo_reportes">' .  $cuerpo_truncado . '</div>');  
 
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

