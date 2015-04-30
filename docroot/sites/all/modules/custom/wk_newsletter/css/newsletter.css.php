/**
 *  colors
 */
<?php
  $oasis_green =           "#55816c";
  $oasis_green_light =     "#b9c9c2";
  $polka_red =             "#df272f";
  $ink_blue =              "#2b4796";
  $concentrate_yellow =    "#f1962a";
  $dreft_green =           "#19964d";
  $sticky_pink =           "#df2a8a";
  $british_grey =          "#5f5f61";
  $sailing_blue =          "#2fa4d4";
  $traffic_orange =        "#ec6035";
  $fog_grey =              "#f7f7f7";
  $cloudy_grey =           "#d3d2d2";
  $windy_grey =            "#b1b1b1";
  $rainy_grey =            "#999999";
  $stormy_grey =           "#868686";
  $funeral_grey =          "#666666";
  $base_text_color = "#030303";
  $extra_text_color = $rainy_grey;
  $base_link_hover_color = $base_text_color;
  // messages
  $message_green = "#c2f75f";
  $message_yellow = "#fff05d";
  $message_red = "#f7765f";
  $themePath = url('<front>', array('absolute' => TRUE)) . drupal_get_path('theme', 'wundertheme');
  $fontStack = 'helvetica, arial, sans-serif';
  $altFont = "'Flama Basic', " . $fontStack;
?>

@font-face {
    font-family: 'Flama Basic';
    src: url("<?php print $themePath; ?>/fonts/Flama-Basic.eot");
    src: url("<?php print $themePath; ?>/fonts/Flama-Basic.eot?#iefix") format("embedded-opentype"),url("<?php print $themePath; ?>/fonts/Flama-Basic.woff") format("woff"),url("<?php print $themePath; ?>/fonts/Flama-Basic.svg#svgFontName") format("svg")
}

/**
 * general
 */

 * {
 box-sizing: border-box;
}

body {
  background: white;
  font-family: <?php print $fontStack; ?>;
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  padding: 0;
}

h1, h2, h3, h4, h5, h6 {
  font-family: <?php print $altFont; ?>;
}

a {
  color: <?php print $base_text_color; ?>;
}

table {
  border-spacing: 0;
  table-layout: fixed;
}
table td {
  vertical-align: top;
  padding-top: 15px;
}

/**
 * structure
 */
.header {
  padding-bottom: 35px;
  padding-top: 0;
}

.container {
  min-width: 320px;
  max-width: 600px;
  padding-left: 1em;
  padding-right: 1em;
}

@media screen and (min-width: 600px) {
  .container {
    width: 600px;
    padding-left: 0;
    padding-right: 0;
    margin-left: auto;
    margin-right: auto;
  }
}

.header .first,
.ds-2col-table .group-left {
  padding-right: 24px;
  width: 118px;
}
.ds-2col-table .group-left > div {
  width: 118px;
}
.header .second,
.ds-2col-table .group-right {
  width: 480px;
}

/**
 * header
 */
.site-name {
  display: none;
}
.slogan {
  color: <?php print $stormy_grey; ?>;
  font-family: Georgia, serif;
  font-style: italic;
  font-size: 22px;
  margin-bottom: 0;
  padding-top: 5px;
}
.page-title {
  font-size: 1em;
  font-weight: bold;
  font-family: 'Flama Basic', helvetica, arial, sans-serif ;
  margin-top: 0px;
}

.element-box {
  height: 118px;
}

.element-box-name {
  padding-top: 20px;
  color: #868686;
  font-size: 10px;
}

.element-box-abbr {
  font-size: 37px;
  padding: 10px 0;
}

.group-right .field-name-title h2,
.field-name-field-section-title .field-items .field-item,
.field-name-field-html-nl-article .field-label td {
  font-size: 24px;
  color: #868686;
  font-weight: normal;
  text-transform: uppercase;
}

@media screen and (min-width: 600px) {
  .group-right .field-name-title h2,
  .field-name-field-section-title .field-items .field-item,
  .field-name-field-html-nl-article .field-label td, 
  .field-name-field-conferences .field-label td, 
  .field-name-field-newsletter-events .field-label td,
  .field-name-field-mentions-in-the-news .field-label td {
    font-size: 32px;
  }
  .slogan {
    font-size: 30px;
  }
  .page-title {
    font-size: 1.5em;
  }
}

.view-mode-full {
  min-width: 320px;
}
.field-collection-view.view-mode-full {
  min-width: 0;
}

/**
 * Newsletter Fields
 */
.field-name-field-editorial,
.field-name-field-newsletter-html-articles,
.field-name-field-newsletter-events,
.field-name-field-newsletter-publications,
.field-name-field-rights,
.field-name-field-regulation,
.field-name-field-europe-in-the-world,
.field-name-field-institutions,
.field-name-field-energy-an-climate-change,
.field-name-publications-weekly-events,
.field-name-field-mentions-in-the-news,
.field-name-newsletter-weekly-events,
.field-name-field-task-force-news,
.field-name-field-event-report-article-,
.field-name-field-article,
.field-name-field-conferences {
  padding-top: 40px;
  padding-bottom: 20px;
}

.field-name-field-editorial,
.field-name-field-task-force-news,
.field-name-field-newsletter-events.grey,
.field-name-field-conferences,
.node-newsletter-weekly table.field-name-body {
  background: <?php print $fog_grey; ?>;
  border-top: 1px solid <?php print $cloudy_grey; ?>;
  color: #666666;
}

.field-name-field-mentions-in-the-news {
  background: #ecebe9;
  border-top: 1px solid #c9c8c6;
}

.field-name-field-newsletter-events,
.field-name-events-link,
.field-name-contact-info,
.field-name-social-links,
.group-center-table {
  background: <?php print $oasis_green; ?>;
  color: white;
}
.field-name-events-link {
  padding-bottom: 2em;
}
.group-td1 {
  width: 120px;
  padding-right: 15px;
}
.group-td2 {
  vertical-align: bottom;
}
.profile-title {
  font-weight: bold;
}
.group-center-table p {
  margin: 0;
}
.field-name-social-links {
  padding-bottom: 40px;
}
.field-name-social-links .social {
  text-align: right;
}
.field-name-social-links .social a {
  padding: 0 .5em;
}
.field-name-field-newsletter-events a,
.field-name-events-link a,
.field-name-contact-info a,
.field-name-social-links a {
  color: white;
}
.field-name-field-newsletter-events.grey a {
  color: black;
}

.field-name-field-newsletter-events a.link-all,
.field-name-field-conferences a.link-all {
  color: #648b78;
  font-size: 12px;
  text-align: right;
  text-decoration: none;
  padding-left: 20px;
}

.field-name-explore-more-link,
.field-name-research-areas-link,
.field-name-all-topics-link {
  background: <?php print $oasis_green; ?>;
}
.field-name-explore-more-link {
  border-top: 1px solid <?php print $base_text_color; ?>;
}
.field-name-explore-more-link a {
  color: white;
}
.field-name-explore-more-link .field-contents {
  color: white;
  font-size: 16px;
  padding: 1em 0;
  text-align: center;
  text-transform: uppercase;
}

@media screen and (min-width: 600px) {
  .field-name-explore-more-link .field-contents {
    font-size: 26px;
  }
}

.field-name-research-areas-link .field-contents,
.field-name-all-topics-link .field-contents {
  padding: 20px 0;
}
.field-name-topics-link .field-contents a,
.field-name-events-link .field-contents a {
  display: block;
  font-weight: normal;
  padding: 6px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
}
.field-name-research-areas-link .field-contents a,
.field-name-all-topics-link .field-contents a {
  display: block;
  font-weight: normal;
  padding: 6px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
}
.field-name-topics-link .field-contents a {
  color: <?php print $base_text_color; ?>;
}

.field-name-registration-link .field-item a {
  background: #5b836e;
  color: white;
  display: block;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
  line-height: 2.5;
  margin: 10px 0;
}

.field-name-field-task-force-news .field-name-title h2 a {
  color: <?php print $funeral_grey; ?>;
}

.field-name-events-link .field-contents a:hover,
.field-name-topics-link .field-contents a:hover {
  text-decoration: underline;
}
.field-name-research-areas-link .field-contents a,
.field-name-all-topics-link .field-contents a,
.field-name-events-link .field-contents a {
  border: 2px solid #496E5C;
  color: <?php print $funeral_grey; ?>;
  background-color: <?php print $fog_grey ?>;
}
.field-name-research-areas-link .field-contents a:hover,
.field-name-all-topics-link .field-contents a:hover {
  text-decoration: underline;
}
.entity-field-collection-item > .field-name-field-section-title {
  margin-bottom: 0;
  color: #868686;
  text-align: center;
}
.field-name-field-newsletter-publications tr.field-label,
.field-name-field-regulation tr.field-label,
.field-name-field-rights tr.field-label,
.field-name-field-europe-in-the-world tr.field-label,
.field-name-field-energy-an-climate-change tr.field-label,
.field-name-field-institutions tr.field-label,
.field-name-field-mentions-in-the-news tr.field-label,
.field-name-field-newsletter-events tr.field-label,
.field-name-field-conferences tr.field-label,
.field-name-newsletter-weekly-events .views-row-group h3,
.field-name-publications-weekly-events .views-row-group h3,
.field-name-field-task-force-news tr.field-label,
.field-name-field-html-nl-article tr-field-label {
  font-weight: normal;
  font-size: 16px;
  text-transform: uppercase;
}
.field-name-field-conferences tr.field-label,
.field-name-field-newsletter-events tr.field-label,
.field-name-field-mentions-in-the-news tr.field-label {
  font-size: 24px;
}
@media screen and (min-width: 600px) {
  .field-name-field-newsletter-publications tr.field-label,
  .field-name-field-regulation tr.field-label,
  .field-name-field-rights tr.field-label,
  .field-name-field-europe-in-the-world tr.field-label,
  .field-name-field-energy-an-climate-change tr.field-label,
  .field-name-field-institutions tr.field-label,
  .field-name-field-mentions-in-the-news tr.field-label,
  .field-name-field-newsletter-events tr.field-label,
  .field-name-newsletter-weekly-events .views-row-group h3,
  .field-name-publications-weekly-events .views-row-group h3,
  .field-name-field-task-force-news tr.field-label,
  .field-name-field-html-nl-article tr.field-label {
    font-size: 30px;
  }
}
.field-label-inline td.field-label,
.field-label-above  .field-label,
dt {
  font-weight: bold;
}
.field-label-above  .field-label {
  margin-bottom: .5em;
}
dd {
  margin: 0;
}
dl {
  margin: 0;
}
.field-type-text,
.field-type-text-long {
  margin-bottom: 1em;
}
.field-label-inline p {
  margin: 0;
}
.field-label-inline {
  margin: 10px 0;
}
.field-name-field-task-force-news .field-name-title {
  color: <?php print $funeral_grey; ?>;
}
.field-name-field-newsletter-publications tr.field-label td,
.field-name-field-regulation tr.field-label td,
.field-name-field-rights tr.field-label td,
.field-name-field-europe-in-the-world tr.field-label td,
.field-name-field-energy-an-climate-change tr.field-label td,
.field-name-field-institutions tr.field-label td,
.field-name-field-mentions-in-the-news tr.field-label td,
.field-name-field-newsletter-events tr.field-label td,
.field-name-field-conferences tr.field-label td,
 .field-name-field-task-force-news tr.field-label td{
  height: 100px;
  padding-left: 142px;
  vertical-align: middle;
}
.field-name-field-newsletter-events tr.field-label td,
.field-name-field-conferences tr.field-label td {
  padding: 0;
}

.field-name-field-conferences tr.field-label td,
.field-name-field-newsletter-events tr.field-label td,
.field-name-field-mentions-in-the-news tr.field-label td,
.field-name-field-html-nl-article tr.field-label td {
  text-align: center;
  padding: 0;
}
.field-name-field-newsletter-events tr.field-label td img,
.field-name-field-conferences tr.field-label td img {
  vertical-align: middle;
  margin-right: 30px;
  margin-left: 15px;
}
.field-name-newsletter-weekly-events .views-row-group h3,
.field-name-publications-weekly-events .views-row-group h3 {
  height: 100px;
  line-height: 100px;
  padding-left: 141px;
}

.field-name-publications-weekly-events,
.field-name-newsletter-weekly-events {
  background: <?php print $fog_grey; ?>;
  border-top: 1px solid <?php print $windy_grey; ?>;
}

.field-name-newsletter-weekly-events .views-row-group + .views-row-group,
.field-name-publications-weekly-events .views-row-group + .views-row-group {
  border-top: 1px solid <?php print $windy_grey; ?>;
}
.field-type-image {
  text-align: center;
}

.field-type-image img {
  max-width: 100%;
  height: auto;
}
.field-type-node-reference tr.field-item > td {
  border-bottom: 1px solid #d3d2d2;
  padding-bottom: 15px;
  padding-top: 0;
}
.field-type-node-reference tr.field-item:last-child > td,
.field-name-field-newsletter-events tr.field-item > td,
.field-name-field-mentions-in-the-news tr.field-item > td {
  border-bottom: none;
}
.field-name-field-mentions-in-the-news tr.field-item > td {
  padding-bottom: 0;
}
.field-name-field-mentions-in-the-news tr.field-item > td > .view-mode-newsletter_article {
  padding-bottom: 0;
  padding-top: 20px;
}
img.desktop {
  display: none;
}


/**
 * Articles
 */
.view-mode-newsletter_article .field-name-field-ceps-profile-id {
  padding-bottom: 20px;
  color: <?php print $funeral_grey; ?>;
}
.view-mode-newsletter_article .field-name-field-ceps-profile-id .field-name-profile-function-organisation {
  font-size: 12px;
}
.view-mode-newsletter_article {
  padding-bottom: 20px;
}
.view-mode-newsletter_article .field-name-formatted-event-date,
.view-mode-newsletter_article .field-name-title {
  padding-top: 20px;
}
.node-profile.view-mode-newsletter_mini .field-name-title {
  padding:0px;
}

.view-mode-newsletter_article .field-name-formatted-event-date {
  border-top: 1px solid #497360;
}
.field-name-field-newsletter-events .field-label + .field-item .field-name-formatted-event-date {
  border-top: 0;
}
.view-mode-teaser.node-html-article {
  padding-bottom: 40px;
}

.field-name-field-newsletter-m-sections .view-mode-newsletter_article .field-name-title h2,
.field-name-field-newsletter-m-sections .view-mode-teaser.node-html-article .field-name-title h2 {
  font-size: 18px;
}
 
.field-name-field-newsletter-m-sections tr.odd .view-mode-newsletter_article .field-name-title h2 a,
.field-name-field-newsletter-m-sections tr.odd .view-mode-teaser.node-html-article .field-name-title h2 a {
  color: <?php print $stormy_grey; ?>;
  font-weight: normal;
}

.view-mode-newsletter_article .field-name-title h2,
.view-mode-teaser.node-html-article .field-name-title h2 {
  margin-top: 0;
  line-height: 1.5em;
  font-size: 24px;
}
.view-mode-newsletter_article .field-name-title h2 a,
.view-mode-teaser.node-html-article .field-name-title h2 a {
  text-decoration: none;
  /*color: <?php print $funeral_grey;  ?>;*/
}
.view-mode-newsletter_article .field-name-title h2 a:hover,
.view-mode-teaser.node-html-article .field-name-title h2 a:hover {
  text-decoration: underline;
}

.field-name-field-newsletter-m-sections .view-mode-newsletter_article .field-name-body,
.field-name-field-newsletter-m-sections .view-mode-teaser.node-html-article .field-name-body {
  color: <?php print $funeral_grey; ?>;
}
.field-name-node-link a,
.view-mode-teaser.node-html-article .field-name-node-link a {
  color: <?php print $oasis_green; ?>;
  font-size: 13px;
  font-weight: bold;
  text-decoration: none;
}
.view-mode-newsletter_article .field-name-node-link a:hover,
.view-mode-teaser.node-html-article .field-name-node-link a:hover {
  text-decoration: underline;
}

.field-name-field-newsletter-events .view-mode-newsletter_article h2,
.field-name-field-newsletter-events .view-mode-newsletter_article .field-name-body,
.field-name-field-newsletter-events .view-mode-newsletter_article .field-name-node-link a {
  color: white;
}

.field-name-field-event1-date {
  margin-top: 20px;
  text-align: center;
}
.field-name-contact-info p,
.field-name-social-links .social {
  text-align: center;
}
.formatted-date-number {
  font-size: 50px;
  line-height: 66px;
  white-space: nowrap;
}
.formatted-date-rest {
  padding-left: 65px;
}
@media screen and (min-width: 600px) {
  .formatted-date-number {
    font-size: 64px;
    line-height: 66px;
  }
  .formatted-date-rest {
    padding-left: 80px;
  }
}
.formatted-date-month-year {
  font-weight: bold;
}

.ds-2col-table-stacked td.group-left,
.ds-2col-table-stacked td.group-right,
.formatted-date-wrapper td {
  vertical-align: middle;
}

/**
 * footer
 */
.field-name-newsletter-footer,
.field-name-copyright-footer {
  color: <?php print $funeral_grey; ?>;
  /*text-align: center;*/
}
.field-name-newsletter-footer table,
.field-name-copyright-footer table {
  color: <?php print $funeral_grey; ?>;
  text-align: center;
}
.field-name-newsletter-footer a,
.field-name-copyright-footer a {
  color: <?php print $oasis_green; ?>;
}

/**
 * research area block
 */
.view-mode-minimal {
  position: relative;
}
.view-mode-minimal.vocabulary-vocabulary-3 {
  height: 118px;
  margin-bottom: 15px;
  text-align: center;
  width: 118px;
}
.view-mode-minimal.vocabulary-vocabulary-3 .field-name-title h2 {
  font-size: 11px;
  margin-bottom: 0;
}
.view-mode-minimal.vocabulary-vocabulary-3 .field-name-title h2 a {
  color: <?php print $rainy_grey; ?>;
  display: block;
  font-weight: bold;
  line-height: 1.25em;
  padding: 12px 5px;
  position: relative;
  text-decoration: none;
  width: 108px;
  z-index: 8;
}
.view-mode-minimal.vocabulary-vocabulary-3 .field-name-field-research-area-abbreviation .field-item {
  font-size: 40px;
}

a {
  text-decoration: none;
}

.field-name-title h2 {
  margin-top: 0;
  font-weight: normal;
  font-size: 24px;
}

.block-system > .view-mode-full > table {
  max-width: 720px;
  margin-left: auto;
  margin-right: auto;
}

p,
.wysiwyg .field-item {
  text-align: justify;
}

.field-type-field-collection .field-collection-view {
  border-top: 1px solid #d3d2d2;
  padding-top: 1em;
}

.field-type-field-collection > tr > td,
.field-type-field-collection > tbody > tr > td {
  padding-top: 0;
}

.node-newsletter-weekly.view-mode-full > div:first-child > .field-name-field-publication-section > tbody > tr > td > div > table > tbody > tr:first-child > td > .field-collection-view,
.node-newsletter-weekly.view-mode-full > div:first-child > .field-name-field-publication-section > tr > td > div > table > tr:first-child > td > .field-collection-view,
.field-name-field-newsletter-m-sections > tbody > tr > td > .fields-contents-wrap > table > tbody > tr:first-child .field-collection-view,
.field-name-field-newsletter-m-sections > tr > td > .fields-contents-wrap > table > tr:first-child .field-collection-view {
  border-top: none;
}

.field-name-field-newsletter-m-sections > tbody > tr > td > .fields-contents-wrap > table > tbody > tr:first-child,
.field-name-field-newsletter-m-sections > tr > td > .fields-contents-wrap > table > tr:first-child,
.field-name-field-newsletter-m-sections .container .field-collection-view {
  border-top: none;
}

.field-name-field-newsletter-m-sections .container {
  max-width: 720px;
  min-width: 320px;
  width: auto;
  padding: 0;
}

.field-name-field-newsletter-m-sections .container .field-collection-view > .entity {
  min-width: 320px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}

.field-name-field-newsletter-m-sections > tbody > tr > td > .fields-contents-wrap > table > tbody > tr.odd > td,
.field-name-field-newsletter-m-sections > tr > td > .fields-contents-wrap > table > tr.odd > td {
  background: <?php print $fog_grey; ?>;
  border-top: 1px solid #d3d2d2;
}

.field-name-field-event1-speakers .speaker {
  font-weight: bold;
}

.author {
 color: <?php print $stormy_grey; ?>;
 margin: 1em 0;
}

.node-quote .field-name-body {
  color: <?php print $funeral_grey; ?>;
}

.node-quote .field-name-field-quote-link2 {
  font-weight: bold;
}

