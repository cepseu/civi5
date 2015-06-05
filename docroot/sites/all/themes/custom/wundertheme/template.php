<?php
/**
 * @file
 * Provides overrides and additions to aid the theme.
 */
/**
 * Implements hook_form_FORM_ID_alter().
 *
 * Adds a placeholder to the search block.
 */
function wundertheme_form_search_block_form_alter(&$form, &$form_state, $form_id) {
  $form['search_block_form']['#attributes']['placeholder'] = t('Search…');
}
function wundertheme_form_views_exposed_form_alter(&$form, &$form_state){
  if (isset($form['keywords'])) {
    if (!isset($form['keywords']['#attributes'])) {
      $form['keywords']['#attributes'] = array();
      $form['keywords']['#attributes']['placeholder'] = t('Search…');
      $form['keywords']['#attributes']['type'] = 'search';
      $form['submit']['#value'] = t('Search');
    }
  }
}
/**
 * Implements hook_css_alter().
 */
function wundertheme_css_alter(&$css) {
  /* Remove some default Drupal css */
  $exclude = array(
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/field/theme/field.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
  );
  $css = array_diff_key($css, $exclude);
  /* Get rid of some default panel css */
  foreach ($css as $path => $meta) {
    if (strpos($path, 'threecol_33_34_33_stacked') !== FALSE || strpos($path, 'threecol_25_50_25_stacked') !== FALSE) {
      unset($css[$path]);
    }
  }
}
/**
 * Override or insert variables into the html template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered. This is usually "html", but can
 *   also be "maintenance_page" since zen_preprocess_maintenance_page() calls
 *   this function to have consistent variables.
 */
function wundertheme_preprocess_html(&$variables, $hook) {
  $theme_path = drupal_get_path('theme', 'wundertheme');
  drupal_add_css( $theme_path . '/stylesheets/ie.css',
    array(
      'group' => CSS_THEME,
      'browsers' => array(
        'IE' => 'lt IE 9',
        '!IE' => FALSE,
      ),
      'weight' => 999,
      'every_page' => TRUE,
      'media' => 'screen, projection'
    )
  );
  drupal_add_css( $theme_path . '/stylesheets/style.css',
    array(
      'group' => CSS_THEME,
      'browsers' => array(
        'IE' => 'gt IE 8',
        '!IE' => TRUE,
      ),
      'weight' => 999,
      'every_page' => TRUE,
      'media' => 'screen, projection'
    )
  );
  drupal_add_css( $theme_path . '/stylesheets/print.css',
    array(
      'group' => CSS_THEME,
      'weight' => 999,
      'every_page' => TRUE,
      'media' => 'print'
    )
  );
  $variables['favicon'] = url($theme_path . '/favicon.ico');
}
/**
 * Implements theme_breadcrumb()
 *
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function wundertheme_breadcrumb($variables) {
  $item = menu_get_item();
  $variables['breadcrumb'][] = drupal_get_title();
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb">' . implode(' > ', $breadcrumb) . '</div>';
    return $output;
  }
}
/**
 * Implements template_preprocess_button().
 *
 * @param $variables
 * An array of variables to pass to the theme function.
 *
 */
function wundertheme_preprocess_button(&$variables) {
  // Rewrite the drupal classes for buttons so we can consistently theme them.
  $variables['element']['#attributes']['class'][] = 'button';
  if (isset($variables['element']['#value'])) {
    $classes = array(
      //specifics
      t('Save and add') => '',
      t('Add another item') => '',
      t('Add effect') => '',
      t('Add and configure') => '',
      t('Update style') => '',
      t('Download feature') => '',
      //generals
      t('Save') => '',
      t('Apply') => '',
      t('Create') => '',
      t('Confirm') => '',
      t('Submit') => '',
      t('Export') => '',
      t('Import') => '',
      t('Restore') => '',
      t('Rebuild') => '',
      t('Search') => '',
      t('Add') => '',
      t('Update') => '',
      t('Delete') => 'alert',
      t('Remove') => 'alert',
    );
    foreach ($classes as $search => $class) {
      if (strpos($variables['element']['#value'], $search) !== FALSE) {
        $variables['element']['#attributes']['class'][] = $class;
        break;
      }
    }
  }
}
/**
 * Implements theme_status_messages.
 *
 * add class to ul
 */
function wundertheme_status_messages($variables) {
  $display = $variables['display'];
  $output = '';
  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages $type\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul class='message-list'>\n";
      foreach ($messages as $message) {
        $output .= '  <li class="message wysiwyg">' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= '<div class="message wysiwyg">' . $messages[0] . '</div>';
    }
    $output .= "</div>\n";
  }
  return $output;
}
/**
 * Changes the search form to use the HTML5 "search" input attribute
 *
 * adds a button to the search block
 */
function wundertheme_preprocess_search_block_form(&$vars) {
  $search_form = $vars['search_form'];
  $search_form = str_replace('type="text"', 'type="search"', $vars['search_form']);
  $button = '<button class="open-search">' . t('Open search') . '</button>';
  $search_form = $button . '<div class="search-wrap">' . $search_form . '</div>';
  $vars['search_form'] = $search_form;
}
/**
 * implements template_preprocess_block
 */
function wundertheme_preprocess_block(&$variables) {
  if ($variables['block']->module === 'menu_block') {
    $variables['title_attributes_array']['class'] = 'menu-title';
  }
}
/**
  * Implements theme_panels_default_style_render_region()
  *
  * Remove panels separator
  */
function wundertheme_panels_default_style_render_region($vars) {
  $output = '';
  $output .= implode('', $vars['panes']);
  return $output;
}
/**
 * Implements theme_preprocess_taxonomy_term().
 */
function wundertheme_preprocess_taxonomy_term(&$vars) {
  //adding attributes for research area tax terms in 'minimal' view mode
  if(
    $vars['vid'] == '3'
    && isset($vars['field_research_area_color'])
    && !empty($vars['field_research_area_color'])
    && $vars['view_mode'] == 'minimal'
  ){
    $color = $vars['field_research_area_color'][LANGUAGE_NONE][0]['rgb'];
    //$vars['attributes_array']['style'] = 'background-color: ' . $color . ';color:' . $color ;
    $vars['attributes_array']['style'] = 'border-width: 3px;border-style:solid; border-color: ' . $color . '; color:' . $color ;
  }
  else if (
    $vars['vid'] == '17'
    && $vars['view_mode'] == 'minimal'
    && !drupal_is_front_page()
  ) {
    if (isset($vars['field_research_area']) && !empty($vars['field_research_area'])) {
      $term = taxonomy_term_load($vars['field_research_area'][LANGUAGE_NONE][0]['tid']);
      $color = $term->field_research_area_color[LANGUAGE_NONE][0]['rgb'];
    }
    else {
      $color = '#000000';
    }
    $vars['attributes_array']['style'] = 'border-width: 3px;border-style:solid; border-color:' . $color ;
  }
}
/**
 * Implements hook_preprocess_views_view_fields().
 */
function wundertheme_preprocess_views_view_fields(&$vars) {
  $view = $vars['view'];
  // Loop through the fields for this view.
  $previous_inline = FALSE;
  $vars['fields'] = array(); // ensure it's at least an empty array.
  foreach ($view->field as $id => $field) {
    // render this even if set to exclude so it can be used elsewhere.
    $field_output = $view->style_plugin->get_field($view->row_index, $id);
    $empty = $field->is_value_empty($field_output, $field->options['empty_zero']);
    if (empty($field->options['exclude']) && (!$empty || (empty($field->options['hide_empty']) && empty($vars['options']['hide_empty'])))) {
      $object = new stdClass();
      $object->handler = & $view->field[$id];
      $object->inline = !empty($vars['options']['inline'][$id]);
      $object->element_type = $object->handler->element_type(TRUE, !$vars['options']['default_field_elements'], $object->inline);
      if ($object->element_type) {
        $class = '';
        if ($object->handler->options['element_default_classes']) {
          $class = 'field-content';
        }
        if ($classes = $object->handler->element_classes($view->row_index)) {
          if ($class) {
            $class .= ' ';
          }
          $class .= $classes;
        }
        $class_array = explode(' ', $class);
        foreach ($class_array as $cid => $candidate) {
          // Find the color hex code.
          if (preg_match('/([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/', $candidate)) {
            $style = 'color:#' . $candidate . ';';
            unset($class_array[$cid]);
          }
        }
        $pre = '<' . $object->element_type;
        if (!empty($class)) {
          $pre .= ' class="' . implode(' ', $class_array) . '"';
        }
        if (!empty($style)) {
          $pre .= ' style="' . $style . '"';
        }
        $field_output = $pre . '>' . $field_output . '</' . $object->element_type . '>';
      }
      // Protect ourself somewhat for backward compatibility. This will prevent
      // old templates from producing invalid HTML when no element type is selected.
      if (empty($object->element_type)) {
        $object->element_type = 'span';
      }
      $object->content = $field_output;
      if (isset($view->field[$id]->field_alias) && isset($vars['row']->{$view->field[$id]->field_alias})) {
        $object->raw = $vars['row']->{$view->field[$id]->field_alias};
      }
      else {
        $object->raw = NULL; // make sure it exists to reduce NOTICE
      }
      if (!empty($vars['options']['separator']) && $previous_inline && $object->inline && $object->content) {
        $object->separator = filter_xss_admin($vars['options']['separator']);
      }
      $object->class = drupal_clean_css_identifier($id);
      $previous_inline = $object->inline;
      $object->inline_html = $object->handler->element_wrapper_type(TRUE, TRUE);
      if ($object->inline_html === '' && $vars['options']['default_field_elements']) {
        $object->inline_html = $object->inline ? 'span' : 'div';
      }
      // Set up the wrapper HTML.
      $object->wrapper_prefix = '';
      $object->wrapper_suffix = '';
      if ($object->inline_html) {
        $class = '';
        if ($object->handler->options['element_default_classes']) {
          $class = "views-field views-field-" . $object->class;
        }
        if ($classes = $object->handler->element_wrapper_classes($view->row_index)) {
          if ($class) {
            $class .= ' ';
          }
          $class .= $classes;
        }
        $object->wrapper_prefix = '<' . $object->inline_html;
        if ($class) {
          $object->wrapper_prefix .= ' class="' . $class . '"';
        }
        $object->wrapper_prefix .= '>';
        $object->wrapper_suffix = '</' . $object->inline_html . '>';
      }
      // Set up the label for the value and the HTML to make it easier
      // on the template.
      $object->label = check_plain($view->field[$id]->label());
      $object->label_html = '';
      if ($object->label) {
        $object->label_html .= $object->label;
        if ($object->handler->options['element_label_colon']) {
          $object->label_html .= ': ';
        }
        $object->element_label_type = $object->handler->element_label_type(TRUE, !$vars['options']['default_field_elements']);
        if ($object->element_label_type) {
          $class = '';
          if ($object->handler->options['element_default_classes']) {
            $class = 'views-label views-label-' . $object->class;
          }
          $element_label_class = $object->handler->element_label_classes($view->row_index);
          if ($element_label_class) {
            if ($class) {
              $class .= ' ';
            }
            $class .= $element_label_class;
          }
          $pre = '<' . $object->element_label_type;
          if ($class) {
            $pre .= ' class="' . $class . '"';
          }
          $pre .= '>';
          $object->label_html = $pre . $object->label_html . '</' . $object->element_label_type . '>';
        }
      }
      $vars['fields'][$id] = $object;
    }
  }
}
/**
 * implements template_preprocess_field()
 *
 * add an extra class if it is a wysiwyg field
 */
function wundertheme_preprocess_field(&$variables, $hook) {
  if ($variables['element']['#field_type'] == 'text_long' || $variables['element']['#field_type'] == 'text_with_summary') {
    if (!empty($variables['element']['#items'][0]['format']) && $variables['element']['#items'][0]['format'] != 'plain_text') {
      $variables['classes_array'][] = 'wysiwyg';
    }
  }
}
/**
 * implements template_preprocess_block()
 */
function wundertheme_contextual_links_view_alter(&$element, &$items) {
  $views = array('events_weekly_newsletter-block', 'publications_weekly_newsletter-block');
  if ( isset($element['#element']['#block']) && in_array($element['#element']['#block']->delta, $views)) {
    unset($element['#links']);
  }
}
function wundertheme_textfield($variables) {
  $element = $variables['element'];
//  if ($element['#attributes']['type'] !== 'search') {
//    $element['#attributes']['type'] = 'text';
//  }
//  else {
//    $element['#size'] = 15;
//  }
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('form-text'));
  $extra = '';
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';
    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }
  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';
  return $output . $extra;
}
/**
 * Implements hook_preprocess_field().
 */
function wundertheme_process_field(&$vars) {
  $element = $vars['element'];
  if ($element['#label_display'] === 'inline' && $element['#view_mode'] === 'newsletter_mini') {
    $vars['theme_hook_suggestions'][] = 'field__email__inline_label';
    $html = DOMDocument::loadHTML('<?xml encoding="UTF-8">' . $vars['items'][0]['#markup']);
    $dls = $html->getElementsByTagName('dl');
    $max = $dls->length;
    if ($max) {
      $output = '';
      for ($i = 0; $i < $max; $i++) {
        $dl = $dls->item($i);
        $dts = $dl->getElementsByTagName('dt');
        $dds = $dl->getElementsByTagName('dd');
        $innerMax = $dts->length;
        for ($j = 0; $j < $innerMax; $j++) {
          $dt = $dts->item($j);
          $dd = $dds->item($j);
          $output .= '<p><strong>';
          $output .= $dt->nodeValue;
          $output .= '</strong>, ';
          $output .= $dd->nodeValue;
          $output .= '</p>';
        }
      }
      $vars['items'][0]['#markup'] = $output;
    }
  }
  if ($element['#field_name'] === 'field_newsletter_events' || $element['#field_name'] === 'field_conferences') {
    $path = drupal_get_path('theme', 'wundertheme');
    if ($element['#bundle'] === 'newsletter_weekly') {
      $vars['label'] = theme('image', array('path' => $path . '/images/icon-screen-grey.png', 'alt' => '', 'width' => 97, 'height' => 117, 'attributes' => array('class' => 'desktop'))) . theme('image', array('path' => $path . '/images/icon-screen-grey-small.png', 'alt' => '', 'width' => 48, 'height' => 58, 'attributes' => array('class' => 'mobile'))) . $vars['label'];
      $vars['classes'] .= ' grey';
    }
    else {
      $vars['label'] = theme('image', array('path' => $path . '/images/icon-screen.png', 'alt' => '', 'width' => 97, 'height' => 117, 'attributes' => array('class' => 'desktop'))) . theme('image', array('path' => $path . '/images/icon-screen-small.png', 'alt' => '', 'width' => 48, 'height' => 58, 'attributes' => array('class' => 'mobile'))) . $vars['label'];
    }
  }
  if ($element['#field_name'] === 'field_book_authors' && $element['#view_mode'] === 'newsletter_mini') {
    $vars['theme_hook_suggestions'][] = 'field__email__inline_list';
  }
}
/**
 * Returns HTML for a date element formatted as a range.
 */
function wundertheme_date_display_range($variables) {
  $date1 = $variables['date1'];
  $date2 = $variables['date2'];
  $timezone = $variables['timezone'];
  $attributes_start = $variables['attributes_start'];
  $attributes_end = $variables['attributes_end'];
  $start_date = '<span class="date-display-start"' . drupal_attributes($attributes_start) . '>' . $date1 . '</span>';
  $end_date = '<span class="date-display-end"' . drupal_attributes($attributes_end) . '>' . $date2 . $timezone . '</span>';
  // If microdata attributes for the start date property have been passed in,
  // add the microdata in meta tags.
  if (!empty($variables['add_microdata'])) {
    $start_date .= '<meta' . drupal_attributes($variables['microdata']['value']['#attributes']) . '/>';
    $end_date .= '<meta' . drupal_attributes($variables['microdata']['value2']['#attributes']) . '/>';
  }
  // Wrap the result with the attributes.
  return t('!start-date - !end-date', array(
    '!start-date' => $start_date,
    '!end-date' => $end_date,
  ));
}
/**
 * Overrides theme_link().
 */
function wundertheme_link($vars) {
  if ($vars['path'] === '<front>' && isset($vars['options']['fragment'])) {
  //  if ($vars['options']['attributes']['class'][0] === 'active') {
  //    array_shift($vars['options']['attributes']['class']);
  //  }
  }
  $link = '<a href="' . check_plain(url($vars['path'], $vars['options'])) . '"' . drupal_attributes($vars['options']['attributes']) . '>';
  $link .= ($vars['options']['html'] ? $vars['text'] : check_plain($vars['text']));
  $link .= '</a>';
  return $link;
}
function wundertheme_image($variables) {
  $attributes = $variables['attributes'];
  $attributes['src'] = file_create_url($variables['path']);
  foreach (array('width', 'height', 'alt', 'title') as $key) {
    if (isset($variables[$key])) {
      $attributes[$key] = $variables[$key];
    }
  }
  $object = menu_get_object();
  if ($object && strpos($object->type, 'newsletter') !== FALSE && isset($attributes['height'])) {
    unset($attributes['height']);
  }
  return '<img' . drupal_attributes($attributes) . ' />';
}
