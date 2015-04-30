<?php
/**
 * @file
 * Handles Ogone status codes
 *
 */
function uc_ogone_payment_process_status_code($arguments, $user) {
  /* Definition of Ogone status codes  
   * Ogone Status codes: https://secure.ogone.com/ncol/param_cookbook.asp?CSRFSP=%2Fncol%2Fprod%2Fdownload_docs.asp&CSRFKEY=3EF8158F6FCF6791556E614075A2E52040DA20DC&CSRFTS=20111222125809
   * Ubercart order status codes: http://www.ubercart.org/docs/api/uc_order_status_list
   */
  $amount = $arguments['AMOUNT'];
  $order_id = $arguments['ORDERID'];
  $order = uc_order_load($order_id);
  $ncerrorplus = $arguments['NCERRORPLUS'];
  $new_status = NULL;
  $message_type = NULL;
  $enter_payment = FALSE;
  $complete_checkout = FALSE;

  switch ($arguments['STATUS']) {
    case 0:
      $new_status = 'ogone_invalid';
      $message_type = 'order';
      $message = 'Invalid Ogone payment';
      break;
    case 1:
      $new_status = uc_order_state_default('canceled');
      $message_type = 'order';
      $message = 'Payment canceled by client';
      break;
    case 2:
      $new_status = 'ogone_declined';
      $message_type = 'order';
      $message = 'Payment declined by acquirer';
      break;
    case 4:
      $complete_checkout = TRUE;
      $new_status = 'ogone_stored';
      $message_type = 'order';
      $message = 'Payment pending at Ogone with reference ' . $arguments['PAYID'];
      break;
    case 41:
      $complete_checkout = TRUE;
      $new_status = uc_order_state_default('post_checkout');
      $message_type = 'admin';
      $message = 'Waiting for client payment';
      break;
    case 5:
      $complete_checkout = TRUE;
      $new_status = 'ogone_authorized';
      $message_type = 'order';
      $message = 'Payment authorized by acquirer with reference ' . $arguments['PAYID'];
      break;
    case 51:
      $message_type = 'admin';
      $message = 'Waiting for authorization';
      break;
    case 52:
      $new_status = 'ogone_uncertain_auth';
      $message_type = 'order';
      $message = 'Authorization not known';
      break;
    case 55:
      $message_type = 'admin';
      $message = 'Stand-by';
      break;
    case 59:
      $message_type = 'admin';
      $message = 'Authorized to capture manually';
      break;
    case 6:
      $new_status = 'ogone_canceled';
      $message_type = 'order';
      $message = 'The payment was authorized, but canceled afterwards';
      break;
    case 61:
      $message_type = 'admin';
      $message = 'Waiting for authorization to delete the payment';
      break;
    case 62:
      $message_type = 'admin';
      $message = 'Authorization for deletion uncertain';
      break;
    case 63:
      $message_type = 'admin';
      $message = 'Authorization for deletion refused';
      break;
    case 64:
      $message_type = 'admin';
      $message = 'Authorization and canceled';
      break;
    case 7:
      $new_status = 'ogone_deleted';
      $message_type = 'order';
      $message = 'Payment deleted';
      break;
    case 71:
      $message_type = 'admin';
      $message = 'Payment pending for deletion';
      break;
    case 72:
      $message_type = 'admin';
      $message = 'Payment deletion uncertain';
      break;
    case 73:
      $message_type = 'admin';
      $message = 'Payment deletion refused';
      break;
    case 74:
      $message_type = 'admin';
      $message = 'Payment deleted';
      break;
    case 75:
      $message_type = 'admin';
      $message = 'Deletion processed by merchant';
      break;
    case 8:
      $new_status = 'ogone_refund';
      $message_type = 'order';
      $message = 'Refunded payment';
      break;
    case 81:
      $message_type = 'admin';
      $message = 'Refund pending';
      break;
    case 82:
      $message_type = 'admin';
      $message = 'Refund uncertain';
      break;
    case 83:
      $message_type = 'admin';
      $message = 'Refund refused';
      break;
    case 84:
      $message_type = 'admin';
      $message = 'Refund declined by acquirer';
      break;
    case 85:
      $message_type = 'admin';
      $message = 'Refund processed by merchant';
      break;
    case 9:
      $enter_payment = TRUE;
      $complete_checkout = TRUE;
      $new_status = uc_order_state_default('payment_received');
      $message_type = 'order';
      $message = $arguments['PM'] . ' payment received with reference ' . $arguments['PAYID'];
      break;
    case 91:
      $new_status = 'processing';
      $message_type = 'admin';
      $message = 'Payment processing';
      break;
    case 92:
      $new_status = (uc_order_status_data($order->order_status, 'state') == 'payment_received') ? 'ogoneuncertain_cap' : 'ogone_uncertain_pay';
      $message_type = 'order';
      $message = 'Payment uncertain';
      break;
    case 93:
      $message_type = 'admin';
      $message = 'Payment refused';
      break;
    case 94:
      $message_type = 'admin';
      $message = 'Payment declined by acquirer';
      break;
    case 95:
      $message_type = 'admin';
      $message = 'Payment processed by merchant';
      break;
    case 99:
      $message_type = 'admin';
      $message = 'Payment being processed';
      break;
    default:
      break;
  }

  if ($new_status && $new_status != $order->order_status) {
    if (uc_order_update_status($order_id, $new_status)) {
      $order->order_status = $new_status;
    }
  }

  if ($enter_payment) {
    uc_payment_enter($order_id, 'ogone_payment', $amount, $user->uid, array('payment_id' => $arguments['PAYID']), $message);
  }

  if ($ncerrorplus && !empty($ncerrorplus)) {
    uc_order_comment_save($order_id, $user->uid, $ncerrorplus, 'order', $new_status);
  }
  else {
    if ($message_type) {
      uc_order_comment_save($order_id, $user->uid, $message, $message_type, $new_status);
    } 
    else {
      watchdog('uc_ogone_payment', 'Incoming callback with invalid status %status_id for order %order_id', array('%status_id' => $arguments['STATUS'], '%order_id' => $order_id), WATCHDOG_ERROR);
    }
  }
  
  return $complete_checkout;
}