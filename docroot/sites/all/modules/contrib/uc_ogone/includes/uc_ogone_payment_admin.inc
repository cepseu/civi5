<?php
/**
  * @file
 *  Ubercart Ogone payment settings
 */

/**
 * Callback for payment gateway settings.
 */
function uc_ogone_payment_settings_form($arg1) {
  $form['ogone_url'] = array(
    '#type' => 'radios',
    '#title' => t('Ogone mode'),
    '#options' => array(
      'https://secure.ogone.com/ncol/test/orderstandard_utf8.asp' => t('Test'),
      'https://secure.ogone.com/ncol/prod/orderstandard_utf8.asp' => t('Production'),
    ),
    '#default_value' => variable_get('ogone_url', 'https://secure.ogone.com/ncol/test/orderstandard_utf8.asp'),
    '#description' => t('Test mode allows you to test payments. With production mode enabled; payments happen for real.'),
  );
  $form['ogone_catalog_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Merchant catalog URL'),
    '#default_value' => variable_get('ogone_catalog_url', 'catalog'),
    '#description' => t('The relative path to your catalog page. For instance if your catalog page is www.yourdomain.com/catalog enter catalog'),
  );
  $form['ogone_mark_order_as_paid'] = array(
    '#type' => 'checkbox',
    '#title' => t('Mark order as paid after succesfull payment'),
    '#default_value' => variable_get('ogone_mark_order_as_paid)', 1),
    '#description' => t('If checked the order state will be set to `payment received` after succesfull payment.'),
  );
  $form['ogone_pspid_id'] = array(
    '#type' => 'textfield',
    '#title' => t('pspid'),
    '#default_value' => variable_get('ogone_pspid_id', ''),
    '#description' => t('The login username for the Ogone PSP service.'),
  );
  $form['ogone_currency'] = array(
    '#type' => 'textfield',
    '#title' => t('Currency'),
    '#default_value' => variable_get('ogone_currency', 'EUR'),
    '#description' => t('Use "EUR", "USD" or "GBP" for currency. See Ogone documentation for details.'),
  );
  $form['ogone_language'] = array(
    '#title' => t('Default language'),
    '#type' => 'select',
    '#multiple' => FALSE,
    '#options' => _uc_ogone_payment_language_codes(),
    '#default_value' => variable_get('ogone_language', 'en_US'),
    '#description' => t('The default value is used if the language can not be determined. Use "en_US" notation for language. See Ogone documentation for details.'),
  );
  $payment_method_list_types=array(
      0 => 'Hor. grouped logos with the group name on the left',
      1 => 'Hor. grouped logos with no group names',
      2 => 'Vert. list of logos with specific payment method',
  );
  $form['ogone_payment_methods_list_type'] = array(
    '#type' => 'select',
    '#title' => t('Payment methods layout'),
    '#options' => $payment_method_list_types,
    '#default_value' => variable_get('ogone_payment_methods_list_type', '0'),
    '#description' => t('Choose layout for payment selection, if this is done at Ogone page'),
  );
  //Layout
  $form['ogone_layout_title'] = array(
    '#type' => 'textfield',
    '#title' => t('Title'),
    '#default_value' => variable_get('ogone_layout_title', 'Secure Checkout'),
    '#description' => t('Shown in payment page.'),
  );
  $form['ogone_layout_template'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use template'),
    '#default_value' => variable_get('ogone_layout_template', TRUE),
    '#description' => t('Use template file (uc-ogone-secure-payment-form.tpl.php). If set to disabled: limited layout settings will be exposed below instead.'),
  );
  //Improve UI with dependent.js, if a providing module is enabled
  if (module_exists('views')) {
    module_load_include('inc', 'views', 'includes/form');
  }
  $form['ogone_layout'] = array(
    '#type' => 'fieldset',
    '#title' => t('Layout settings'),
    '#tree' => FALSE,
    //"dependency" settings
    '#input' => TRUE,
    '#id' => 'ogone-layout-settings-fieldset',
    '#prefix' => '<div id="ogone-layout-settings-fieldset-wrapper">',
    '#suffix' => '</div>',
  //  '#process' => array('views_process_dependency'),
    //Hide if the above checkbox is unchecked
    '#dependency' => array('edit-ogone-layout-template' => array(0)),
  );
    $form['ogone_layout']['ogone_layout_bgcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('BG Color'),
    '#default_value' => variable_get('ogone_layout_bgcolor', ''),
    '#description' => t('Background color payment page.(empty for default)'),
  );
    $form['ogone_layout']['ogone_layout_txtcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('text Color'),
    '#default_value' => variable_get('ogone_layout_txtcolor', ''),
    '#description' => t('Text color payment page.(empty for default)'),
  );
  $form['ogone_layout']['ogone_layout_tblbgcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('Table BG Color'),
    '#default_value' => variable_get('ogone_layout_tblbgcolor', ''),
    '#description' => t('Background color tables in payment page.(empty for default)'),
  );
  $form['ogone_layout']['ogone_layout_tbltxtcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('Table Text Color'),
    '#default_value' => variable_get('ogone_layout_tbltxtcolor', ''),
    '#description' => t('Text color tables in payment page.(empty for default)'),
  );
  $form['ogone_layout']['ogone_layout_buttonbgcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Color'),
    '#default_value' => variable_get('ogone_layout_buttonbgcolor', ''),
    '#description' => t('Button color in payment page.(empty for default)'),
  );
  $form['ogone_layout']['ogone_layout_buttontxtcolor'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Text Color'),
    '#default_value' => variable_get('ogone_layout_buttontxtcolor', ''),
    '#description' => t('Button text color in payment page.(empty for default)'),
  );
  $form['ogone_layout']['ogone_layout_logo'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo Path'),
    '#default_value' => variable_get('ogone_layout_logo', ''),
    '#description' => t('Logo to use on payment page.(empty for none)'),
  );
  $form['ogone_layout']['ogone_layout_fonttype'] = array(
    '#type' => 'textfield',
    '#title' => t('Fonttype'),
    '#default_value' => variable_get('ogone_layout_fonttype', ''),
  );
    $form['ogone_sha1_signature_pre'] = array(
    '#type' => 'textfield',
    '#title' => t('SHA-1 Signature pre'),
    '#default_value' => variable_get('ogone_sha1_signature_pre', ''),
    '#description' => t('SHA-1 signature for pre payment verification.'),
  );
  $form['ogone_sha1_signature_post'] = array(
    '#type' => 'textfield',
    '#title' => t('SHA-1 Signature post'),
    '#default_value' => variable_get('ogone_sha1_signature_post', ''),
    '#description' => t('SHA-1 signature for post payment verification.'),
  );
    $form['ogone_payment_brands_disabled'] = array(
    '#type' => 'checkbox',
    '#title' =>  t('Use standard Ogone payment selection'),
    '#description' => t('Disable this option if you want to control enabled payment methods (e.g. per language) or if you want customers to choose payment method at checkout page.'),
    '#default_value' => variable_get('ogone_payment_brands_disabled', TRUE),
  );
    $form['ogone_brands'] = array(
    '#type' => 'fieldset',
    '#title' => t('Payment methods & Payment method location'),
    '#tree' => FALSE,
    //"dependency" settings
    '#input' => TRUE,
    '#id' => 'ogone-brands-fieldset',
    '#prefix' => '<div id="ogone-brands-fieldset-wrapper">',
    '#suffix' => '</div>',
   // '#process' => array('views_process_dependency'),
    //Hide if the above checkbox is unchecked
    '#dependency' => array('edit-ogone-payment-brands-disabled' => array(0)),
  );
  //Where should the customer choose their payment method, at checkout or Ogone page?
  $form['ogone_brands']['ogone_select_at_checkout'] =array(
    '#title' => t('Customers choose payment method at checkout page'),
    '#description' => t('Enable this if customers should choose the payment method at the checkout page instead of an Ogone page'),
    '#type' => 'checkbox',
    '#default_value' => variable_get('ogone_select_at_checkout', TRUE),
  );
    
  $form['ogone_brands']['ogone_payment_brands'] = array(
    '#tree' => TRUE,
    '#theme' => 'uc_ogone_payment_form_brands',
    '#title' => t('Enabled payment methods'),
    '#prefix' => t('List of options copied from !source_url. <br>Please enable only payment methods which are also enabled in Ogone!', array('!source_url' => l('this Ogone documentation page', 'https://secure.ogone.com/ncol/PM_process_procedure.asp'))),
  );
  foreach (_uc_ogone_payment_brands() as $key => $value) {
    $form['ogone_brands']['ogone_payment_brands'][$key] = array(
      'list' => array(
        '#type' => 'checkbox',
        '#title' => $value,
        '#default_value' => _uc_ogone_payment_brand_enabled($key),
      ),
      'weight' => array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => _uc_ogone_payment_brand_weight($key),
        '#delta' => 50,
      ),
      '#weight' => _uc_ogone_payment_brand_weight($key),
    );
  }
  //sort all brand checkboxes by weight
  uasort($form['ogone_brands']['ogone_payment_brands'], 'element_sort');
 
  //Exclude payment method for specific countries
  $languages = language_list();
  if (count($languages)>1) {
    $language_method_exclusion_list=variable_get('exclude_country_methods', array());
    foreach ($languages as $langcode => $language) {      
      if (!in_array($langcode, $language_method_exclusion_list)) {
        $language_method_exclusion_list=$langcode;
      }
      $form['ogone_brands']['ogone_exclude_methods_country_' . $langcode] = array(
      '#type' => 'textfield',
      '#title' => t('Payment methods to exclude for ' . $language->name),
      '#default_value' => variable_get('ogone_exclude_methods_country_' . $langcode, ''),
      '#description' => t('Enter a comma seperated list of payment methods (case sensitive!) which should be <strong>excluded</strong> for !name visitors.', array('!name' => $language->name)),
      );
    }
    //Save the used languages, for properly removing all variables on uninstall.
    variable_set('exclude_country_methods', $language_method_exclusion_list);
  }
  return $form;
}