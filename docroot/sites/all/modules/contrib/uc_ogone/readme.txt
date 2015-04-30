Ogone PSP payment module for Ubercart

PREREQUISITES

- Drupal 6.X

INSTALLATION

Drupal:
Install and activate this module like every other Drupal
module.

Ogone backend:
-Global transaction parameters tab:
  -Default ECI value : 7 - e-commerce with SSL encryption
-Data and origin verification  tab:
  -SHA-IN Pass phrase: must be the same as "SHA-1 Signature pre"*
  -IP address...: Whell, you guess..
-Transaction feedback tab:
  -Please do NOT fill in any redirect URLS, they are passed to Ogone by Drupal. This makes a multi shop scenario possible.
  -I want to receive transaction feedback parameters...: TRUE
  -I want Ogone to display a short text to the customer...: TRUE
  -Timing of the request: Always online...
  -Post payment URL: absolute path to /cart/uc_ogone_update_status
   BEWARE i18N sites: The above URL will throw a 301 redirect and kill the post payment process by Ogone
   Prepend the url with the language code. E.g. en/cart/uc_ogone_update_status
  -Request method: GET
  -SHA-OUT Pass phrase: "SHA-1 Signature post"*
  -Timing of the request: for all offline status changes
  -URL: absolute path to /cart/uc_ogone_update_status
  -Transaction e-mails tab:
    -To customer not necessary, because Ubercart takes care of that by default

*You have to use SHA-1 signatures, or else your merchant-feedback might be messed with.
 This module will NOT work without them. See SHA-1 signatures as pre-shared passwords if you do not know what it is.
 (you can use the same key for both if you like)



  FEATURES

- Payment method choice after redirection to Ogone
- Handles (offline) status changes
- Select payment methods to show on the ogone page
- Bypasses Ogone when total order amount is zero or below (free orders)
- Based on 'basic' integration handbook with some tweaks from the 'advanced' integration
- All settings adjustable in admin form (see payment methods in your store configuration)


INFORMATION
Need a test account?
Get it here:
http://www.ogone.com/ncol/web_new_testaccount8.asp
(Choose e-commerce)
Ogone will review your data and send you an email with confirmation and a password.
You can login here: https://secure.ogone.com/ncol/test/frame_ogone.asp

New to Ogone? Check Ogone_e-Com-BAS_v#-#_EN.pdf, available to you after making a test account.

TIPS
-You could change the 'submit order' button text to something more meaningful like 'Go to Payment Screen'.
-It's tricky to test from localhost. You have to open up port 80 to that machine, and configure the right URL to it under 4.1.

PROBLEMS
-If you get an error like 'Unknown order/1/s' its most likely the SHA-keys don't match. See also Drupal logs. Otherwise the encoding might be wrong, try changing the encoding in the 'Global security parameters' tab.

THANKS
Thanks to the helpful Ubercart team and forum users for tips and answers.

DEVELOPMENT
This module is developed, maintained and distributed bij Qrios. We can be contracted for Drupal/Ubercart projects or (payment) module building. Mail us: info {at} qrios {dot} nl.

www.qrios.nl
