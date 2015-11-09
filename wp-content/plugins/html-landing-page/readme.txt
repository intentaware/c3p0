=== HTML Landing Page ===
Contributors: fatkitty
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HLWGK3GCS3EW8
Tags: Landing Page,Affiliate Marketing,ClickBank,CJ,Commisison Junction,HTML,Marketing,SEO
Requires at least: 3.3
Tested up to: 3.4
Stable tag: 3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows you to upload customized HTML files to display as a landing page. Ideal for internet marketers promoting multiple products from the same site. Ideal for landing pages from themeforest, etc.

== Description ==

Allows you to upload customized HTML files to display as a landing page. Ideal for internet marketers promoting multiple products from the same site. Ideal for landing pages from themeforest, etc.

== Installation ==

1. Upload the 'landing-page' directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the new 'Landing Pages' menu in Wordpress
4. Upload a new template using the 'Upload' button
5. Select what page you wish to use as a landing page and set the desired template and options
6. Click Save
7. Rinse and repeat steps 5 and 6 to add as many landing pages as you like.

== Frequently asked questions ==

= What is the 302 redirect for =
The 302 redirect is used if you want to redirect the desired page directly to the template files. If you don't 302 redirect, the plugin will read the template to a buffer and output it directly to the user.

= The rewrites aren't working. =
Rewrites require PHP Dom which is part of libxml. Most servers will have this but some may now.

= What do the rewrites do? =
The rewrites will replace any source links in Javascript and Image tags with the correct path to the template. It will do the same for CSS and Hyperlink hrefs. If you do not use rewrites or 302 redirect then your landing page will not show correctly.

= What is only rewrite local paths? =
This will only rewrite css, javascript, images and links that are relative links, i.e. do not being with 'http(s)://'.

= Can I use WordPress functions in my template? =
You can if you use php in your template and load wp-load.

== Screenshots ==

1. Working example
2. Admin page

== Changelog ==



== Upgrade notice ==


