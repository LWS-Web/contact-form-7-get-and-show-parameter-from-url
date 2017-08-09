=== Plugin Name ===
Contributors: chuntley, mo
Tags: contact form 7, get parameter, show parameter
Requires at least: 3.0.1
Tested up to: 4.8.1
Stable tag: 0.9.7a
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Get or show parameters from the URL directly within the Contact Form 7 plugin

== Description ==

There are times when using the Contact Form 7 WordPress plugin where you need to pass a parameter 
from the URL and into a hidden field or display it in the form. This plugin is great for passing things 
such as order numbers, selected packages, or even security information.

== Installation ==

1. Go to the "Plugins" section of your Wordpress admin panel
1. Click "Add New" at the top
1. Click "Upload" at the top
1. Upload the included zip file
1. Activate the plugin through the 'Plugins' menu in WordPress
1. For getting a parameter as a hidden text field, use [getparam value]
1. For getting a parameter to display as text, use [showparam value]

The above examples assume a URL such as http://mywebsite.com/contact?value=hello.
If you are using a different parameter such as order=hello, use [getparam order]

== Frequently Asked Questions ==

= How do I add a Hidden Field? =

When editing a form in Contact Form 7, enter the getparam shortcode. There is only one valid parameter 
which is the name of the $_GET value.

[getparam value]

For example, if the URL is http://mysite.com/contact?ordernum=12345, the shortcode will be:

[getparam ordernum]

Then when building the response email, you can pass the value with [ordernum]

= How do I show a $_GET value on the form? =

When editing a form in Contact Form 7, enter the showparam shortcode. There is only one valid parameter 
which is the name of the $_GET value.

[showparam value]

For example, if the URL is http://mysite.com/contact?ordernum=12345, the shortcode will be:

[showparam ordernum]

You cannot pass a value to the response email using this method, to do that, you will also have to add a hidden field.

== Changelog ==

= 0.9.7a =
* WPCF7_Shortcode Has Become Deprecated. Need to be replaced with WPCF7_FormTag.
* $tag is no longer an array, but is now an object. Thanks to PascalFuchs (https://wordpress.org/support/users/pascalfuchs/).

= 0.9.7 =
* Fixed XSS issue, thanks Ryan Hellyer (https://geek.hellyer.kiwi/) for the heads up!

= 0.9.6 =
* Update shortcode init for Contact Form 7 3.7.2

= 0.9.5 =
* Release Contact Form 7 module as a plugin
