<?php
/**
  * @file
 *  Handles ogones payment processing in Ubercart
 */
function _uc_ogone_payment_brands($creditcards_only = FALSE) {
  $creditcards = array(
    'AIRPLUS' => t('AIRPLUS'),
    'American Express' => t('American Express'),
    'Aurora' => t('Aurora'),
    'Aurore' => t('Aurore'),
    'Billy' => t('Billy'),
    'BCMC' => t('Bancontact/Mister Cash'),
    'CB' => t('CB'),
    'Cofinoga' => t('Cofinoga'),
    'Dankort' => t('Dankort'),
    'Diners Club' => t('Diners Club'),
    'JCB' => t('JCB'),
    'Maestro' => t('Maestro'),
    'MaestroUK' => t('MaestroUK'),
    'MasterCard' => t('MasterCard'),
    'NetReserve' => t('NetReserve'),
    'PRIVILEGE' => t('PRIVILEGE'),
    'Solo' => t('Solo'),
    'UATP' => t('UATP'),
    'VISA' => t('VISA'),
  );
  $other = array(
    'Acceptgiro' => t('Acceptgiro'),
    'Amazon Checkout' => t('Amazon Checkout'),      
    'Bank transfer' => t('Bank transfer'),
    'Bank transfer BE' => t('Bank transfer BE'),  
    'Bank transfer DE' => t('Bank transfer DE'),
    'Bank transfer FR' => t('Bank transfer FR'),  
    'Bank transfer NL' => t('Bank transfer NL'),       
    'cashU' => t('cashU'),
    'CBC Online' => t('CBC Online'),
    'CENTEA Online' => t('CENTEA Online'),
    'Dexia Direct Net' => t('Dexia'),
    'DirectEbanking' => t('Sofort Uberweisung'),
    'Direct Debits AT' => t('Direct Debits AT'),
    'Direct Debits DE' => t('Direct Debits DE'),
    'Direct Debits NL' => t('Direct Debits NL'),
    'eDankort' => t('eDankort'),
    'EPS' => t('EPS'),
    'Fortis Pay Button' => t('Fortis Pay Button'),
    'giropay' => t('giropay'),
    'iDEAL' => t('iDEAL'),
    'ING HomePay' => t('ING'),
    'InterSolve' => t('InterSolve'),
    'KBC Online' => t('KBC Online'),
    'MiniTix' => t('MiniTix'),
    'MPASS' => t('MPASS'),
    'Payment on Delivery' => t('Payment on Delivery'),
    'PAYPAL' => t('PayPal'),
    'paysafecard' => t('paysafecard'),
    'PingPing' => t('PingPing'),
    'PostFinance Card' => t('PostFinance + card'),
    'PostFinance e-finance' => t('PostFinance e-finance'),
    'UNEUROCOM' => t('UNEUROCOM'),
    'TUNZ' => t('TUNZ'),
    'Wallie' => t('Wallie'),
  );

  if ($creditcards_only) {
    return $creditcards;
  } 
  else {
    $all_brands = array_merge($creditcards, $other);
    natcasesort($all_brands);
    return $all_brands;
  }
}

/**
 * Get a list of all defined language codes.
 */
function _uc_ogone_payment_language_codes() {
  // Map the drupal language codes with the supported Ogone codes.
  // Available Ogone languages: https://secure.ogone.com/ncol/param_cookbook.asp?CSRFSP=%2Fncol%2Fprod%2Fdownload_docs.asp&CSRFKEY=3EF8158F6FCF6791556E614075A2E52040DA20DC&CSRFTS=20111222125809
  //Drupal languages: http://api.drupal.org/api/drupal/includes--locale.inc/function/_locale_get_predefined_list/6    
  
  return array(
    'ar' => 'ar_AR',// Arabic
    'cs' => 'cs_CZ',// Czech
    'da' => 'dk_DK',// Danish
    'de' => 'de_DE',// German
    'el' => 'el_GR',// Greek
    'en' => 'en_US', //English
    'es' => 'es_ES',// Spanish     
    'fr' => 'fr_FR',// French
    'hu' => 'hu_HU',// hungarian
    'it' => 'it_IT',// Italian
    'ja' => 'ja_JP',// Japanese    
    'nl' => 'nl_NL',// Dutch
    'no' => 'no_NO',// Norwegian
    'pl' => 'pl_PL',// Polish
    'pt-pt' => 'pt_PT',// Portugese (Portugal)
    'pt-br' => 'pt_PT',// Portugese (Brazil)
    'ru' => 'ru_RU',// Russian
    'sv' => 'se_SE',// Swedish
    'sk' => 'sk_SK',// Slovak
    'tr' => 'tr_TR',// Turkish
    'zh-hans' => 'zh_CN',// Simplified Chinese
  );
}

/**
 * Form to build the submission to Ogone.
 */
function uc_ogone_payment_form($form_state, $order) {
  $ogone_url = filter_xss(variable_get('ogone_url', 'https://secure.ogone.com/ncol/test/orderstandard_utf8.asp'));
 
  $pspid = filter_xss(variable_get('ogone_pspid_id', TRUE));
  $orderid = $order->order_id;
  $amount = round($order->order_total * 100);   //amount *100

  $currency = filter_xss(variable_get('uc_currency_code', 'USD'));

  $layout_title = filter_xss(t(variable_get('ogone_layout_title', TRUE)));
  $layout_bgcolor = filter_xss(variable_get('ogone_layout_bgcolor', TRUE));
  $layout_txtcolor = filter_xss(variable_get('ogone_layout_txtcolor', TRUE));
  $layout_tblbgcolor = filter_xss(variable_get('ogone_layout_tblbgcolor', TRUE));
  $layout_tbltxtcolor = filter_xss(variable_get('ogone_layout_tbltxtcolor', TRUE));
  $layout_buttonbgcolor = filter_xss(variable_get('ogone_layout_buttonbgcolor', TRUE));
  $layout_buttontxtcolor = filter_xss(variable_get('ogone_layout_buttontxtcolor', TRUE));
  $layout_logo = filter_xss(variable_get('ogone_layout_logo', TRUE));
  $layout_fonttype = filter_xss(variable_get('ogone_layout_fonttype', TRUE));
    
  $order_description = variable_get('uc_store_name', 'Webshop') . ' order: ' . $order->order_id;
  $customer_name = $order->delivery_first_name . ' ' . $order->delivery_last_name;
  $customer_name = substr($customer_name, 0, 35); //Make sure this is < 35 char, else Ogone freaks out
  $customer_email = $order->primary_email;
  $brand = '';
  $pm = '';
  $pm_list='';
  $pm_list_type='';
  
  //Use only enabled payments, as configured in the Ubercart Ogone settings page
  if (!variable_get('ogone_payment_brands_disabled', TRUE)) { 
    //Customers choose an payment method at checkoutpage
    if (variable_get('ogone_select_at_checkout', TRUE)) {
      $selected_brand = filter_xss($order->payment_details['payment_brand']);
      $only_creditcards = TRUE;
      $creditcards = _uc_ogone_payment_brands($only_creditcards);
      //credit cards need a brand value, others use brand as pm
      if (array_key_exists($selected_brand, $creditcards)) {
        $brand = $selected_brand;
        $pm = 'CreditCard';
      } 
      elseif (!empty($selected_brand)) {
        $pm = $selected_brand;
      }      
    }
    else{ //Use Ogone checkout page, but use only enabled poayments (from Ubercart Ogone settings page)
      $pm_list = implode(';', _uc_ogone_payment_brands_enabled());
      $pm_list_type = filter_xss(variable_get('ogone_payment_methods_list_type', '0'));
    }
  }
  
  $customer_zip = $order->delivery_postal_code;
  $customer_address = $order->delivery_street1 . ' ' . $order->delivery_street2 . ' ' . $order->delivery_street2 . ' ' . $order->delivery_city;

  $sha_suffix = variable_get('ogone_sha1_signature_pre', TRUE);

  //Make SHA1 string for pre payment verification
  $arguments = array(
    'ACCEPTURL' => url('cart/ogone_return_ok', array('absolute' => TRUE)),
    'AMOUNT' => $amount,
    'BACKURL' => url('cart/checkout', array('absolute' => TRUE)),
    'BGCOLOR' => $layout_bgcolor,
    'BRAND' => $brand,
    'BUTTONBGCOLOR' => $layout_buttonbgcolor,
    'BUTTONTXTCOLOR' => $layout_buttontxtcolor,
    'CANCELURL' => url('cart/checkout/ogone_cancel', array('absolute' => TRUE)),
    'CATALOGURL' => url(variable_get('uc_continue_shopping_url', ''), array('absolute' => TRUE)),
    'CN' => $customer_name,
    'COM' => $order_description,
    'CURRENCY' => $currency,
    'DECLINEURL' => url('cart/checkout', array('absolute' => TRUE)),
    'EMAIL' => $customer_email,
    'EXCEPTIONURL' => url('cart/uc_ogone_update_status', array('absolute' => TRUE)),
    'FONTTYPE' => $layout_fonttype,
    'HOMEURL' => url('', array('absolute' => TRUE)),
    'LANGUAGE' => _uc_ogone_payment_language(),
    'LOGO' => $layout_logo,
    'ORDERID' => $orderid,
    'OWNERADDRESS' => $customer_address,
    'OWNERZIP' => $customer_zip,
    'PM' => $pm,
    'PMLIST' => $pm_list,
    'PMLISTTYPE' => $pm_list_type,
    'PSPID' => $pspid,
    'TBLBGCOLOR' => $layout_tblbgcolor,
    'TBLTXTCOLOR' => $layout_tbltxtcolor,
    'TITLE' => $layout_title,
    'TXTCOLOR' => $layout_tbltxtcolor
  );
  if (variable_get('ogone_layout_template', TRUE)) {
    $arguments['TP'] = url('ogone_template_call', array('absolute' => TRUE));
  }

  $sha1_signature = '';

  $form['#action'] = $ogone_url;

  //all arguments need to be put alphabetically
  ksort($arguments);
  foreach ($arguments as $param_name => $param_value) {
    //$param_value = trim($param_value);
    $param_name = strtoupper($param_name);
    if (strlen($param_value) > 0) {
      $sha1_signature .= $param_name . '=' . $param_value . $sha_suffix;
      $form[$param_name] = array('#type' => 'hidden', '#value' => $param_value);
    }
  }

  $form['SHASign'] = array('#type' => 'hidden', '#value' => sha1($sha1_signature));

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit order'),
  );
  //Free orders should bypass ogone validation
  //  uc_ogone_free_order_confirmed($orderid,$amount);
  return $form; 
}

function uc_ogone_payment_callback($auto = FALSE) {
  $sha_suffix = variable_get('ogone_sha1_signature_post', TRUE);
  $arguments = array(
    'AAVCHECK' => $_GET['AAVCheck'],
    'ACCEPTANCE' => $_GET['ACCEPTANCE'],
    'AMOUNT' => $_GET['amount'],
    'BRAND' => $_GET['BRAND'],
    'CARDNO' => $_GET['CARDNO'],
    'CCCTY' => $_GET['CCCTY'],
    'CN' => $_GET['CN'],
    'CURRENCY' => $_GET['currency'],
    'CVCCHECK' => $_GET['CVCCheck'],
    'ECI' => $_GET['ECI'],
    'ED' => $_GET['ED'],
    'IP' => $_GET['IP'],
    'IPCTY' => $_GET['IPCTY'],
    'NCERROR' => $_GET['NCERROR'],
    'ORDERID' => $_GET['orderID'],
    'PAYID' => $_GET['PAYID'],
    'PM' => $_GET['PM'],
    'STATUS' => $_GET['STATUS'],
    'TRXDATE' => $_GET['TRXDATE'],
    'VC' => $_GET['VC'],
  );

  $sha1_return_key = strtoupper($_GET['SHASIGN']);

  $sha1_key = '';
  foreach ($arguments as $param_name => $param_value) {
    $param_name = strtoupper($param_name);
    if (strlen($param_value) > 0) {
      $sha1_key .= $param_name . '=' . $param_value . $sha_suffix;
    }
  }

  $sha1_key = strtoupper(sha1($sha1_key));
  
  //invalid SHA keys
  if ($sha1_key != $sha1_return_key) {
    watchdog('uc_ogone_payment', ' SHA keys don\'t match. Sha1_key=' . $sha1_key . ' and return sha key=' . $sha1_return_key . ' received params:' . print_r($_GET, TRUE), NULL, WATCHDOG_ERROR);  
    return;
  }
  global $user;
  
  $arguments['NCERRORPLUS'] = trim($_GET['NCERRORPLUS']);
  if (!function_exists('uc_ogone_payment_process_status_code')) {
     module_load_include('inc', 'uc_ogone_payment', 'includes/ogone_status_codes');
  }
   
  $complete_checkout = uc_ogone_payment_process_status_code($arguments, $user);

  $payment = (object) array(
    'order_id' => $arguments['ORDERID'],
    'timestamp' => date('c'),
    'pay_id' => $arguments['PAYID'],
    'payment_date' => date('c', strtotime($arguments['TRXDATE'])),
    'payment_acceptance' => $arguments['ACCEPTANCE'],
    'payment_method' => $arguments['PM'],
    'card_no' => $arguments['CARDNO'],
    'car_brand' => $arguments['BRAND'],
    'error_code' => $arguments['NCERROR'],
    'error_message' => $arguments['NCERRORPLUS'],
    'order_status' => $arguments['STATUS'],
    'sha1_test_succes' => 'OK',
  );

  // Insert/update payment details
  $update = array();
  if (db_query("SELECT order_id FROM {uc_payment_ogone} WHERE order_id = :d", array(':id' => $payment->order_id) )->fetchField()) {
    $update = array('order_id');
  }
  $result = drupal_write_record('uc_payment_ogone', $payment, $update);

  if ($complete_checkout) {
    // This lets us know it's a legitimate access of the complete page.
    $_SESSION['cart_order'] = $payment->order_id;
    $_SESSION['do_complete'] = TRUE;
    // The actions that need to be done here are executed when the user is redirected from Ogone back to the shop
    // This will empty the cart and create a user if the order was completed by an anonymous user
    if (!$auto) {
      drupal_goto('cart/checkout/complete');
    }
  } 
  else {
    $message = t('Your order could not be completed because Ogone returned an exception. Please try again or contact the service desk.'); 
    drupal_set_message($message, 'error');
    if (!$auto) {
      drupal_goto('cart/checkout');
    }
  }  
}

function uc_ogone_payment_brand_selection_form($form_state, $order) {
  $form['payment_brand_selection'] = array(
    '#type' => 'radios',
    '#title' => t('Select payment method'),
    '#default_value' => $order->payment_details['payment_brand'],
    '#options' => _uc_ogone_payment_brands_enabled()
  );

  return $form;
}

function uc_ogone_payment_method_form($order) {
  $form['pm_ogone_description'] = array(
    '#type' => 'textfield',
    '#size' => 32,
    '#maxlength' => 64,
    '#default_value' => $order->payment_details['description'],
  );

  return $form;
}

function _uc_ogone_payment_brand_enabled($brand) {
  return array_key_exists($brand, _uc_ogone_payment_brands_enabled());
}

function _uc_ogone_payment_brand_weight($brand) {
  $ogone_payment_brands = variable_get('ogone_payment_brands', array());
  if (is_array($ogone_payment_brands) && isset($ogone_payment_brands[$brand]) && isset($ogone_payment_brands[$brand]['weight'] )) {
    return $ogone_payment_brands[$brand]['weight'];
  }
  return 0;
}

function _uc_ogone_payment_brands_enabled() {
  $ogone_payment_brands_enabled = array();

  $ogone_payment_brands_saved = variable_get('ogone_payment_brands', array());
  //remove all payment methods which are unchecked; value == 0
  $ogone_payment_brands_listed = array_filter($ogone_payment_brands_saved, '_uc_ogone_payment_brand_listed');
  
  //remove all payment methods which are disabled for the current language
  global $language;  
  $excludestr=variable_get('ogone_exclude_methods_country_' . $language->language, '');
  $exclude_array=explode(',', $excludestr);
  if (is_array($ogone_payment_brands_listed) && count($ogone_payment_brands_listed)>0) {
    foreach ($exclude_array as $paymentmethod) {
      $paymentmethod = trim($paymentmethod);
      if (isset($ogone_payment_brands_listed[$paymentmethod])) {
        unset($ogone_payment_brands_listed[$paymentmethod]);
      }
    }
  }
  //sort using weight set by admin
  uasort($ogone_payment_brands_listed, 'drupal_sort_weight');
  $all_brands = _uc_ogone_payment_brands();
  foreach ($ogone_payment_brands_listed as $brand => $data) {
    //return key and title
    $ogone_payment_brands_enabled[$brand] = $all_brands[$brand];
  }

  return $ogone_payment_brands_enabled;
}

function _uc_ogone_payment_brand_listed($var) {
  return (bool) $var['list'];
}

/**
 * Dynamicaly set the language variable for the call to Ogone.
 *
 * @param string $lang The languagecode of the language used in drupal that should be used on the Ogone page.
 */
function _uc_ogone_payment_language($lang = NULL) {
  // If no language code is given, get the language code from global.
  if (!isset($lang)) {
    global $language;
    $lang = $language->language;
  }
  $code = _uc_ogone_payment_language_codes();
  // If no language is mapped, use the default value.
  if (!($lang = $code[$lang])) {
    $lang = filter_xss(variable_get('ogone_language', 'en_US'));
  }
  return $lang;
}