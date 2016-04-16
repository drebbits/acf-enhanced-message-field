=== ACF Enhanced Message Field ===
Contributors: drebbits.web
Tags: acf, custom fields, message field, message, php, add on
Requires at least: 4.0
Tested up to: 4.5.0
License: GPLv2 or later

Adds an enhanced version of the default Message field to accept PHP and certainly no wpauto().

== Description ==

This field will provide you more options and flexibility on how you would like to present an instruction or message to your client's (or site in general) admin interface.

Features:

* Support PHP.
* Option to hide label when field is displayed.


Compatible with Advanced Custom Fields:

* 4 (tested up to 4.4.6)
* 5 (PRO, tested up to 5.3.7)


PS: You need [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) installed to use this.

PPS: Even more awesome if you have [Advanced Custom Fields PRO](http://www.advancedcustomfields.com/pro/) installed.

__Important note:__ Use this with utmost care.

== Installation ==

1. Check and make sure you have installed [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/).
2. Upload 'acf-enhanced-message' to your '/wp-content/plugins/' folder.
3. Go ahead and activate the plugin in the 'Plugins' admin page in WordPress.
4. Create a field group and check 'Enhanced Message' (under Layout) that is now available.

== Frequently Asked Questions ==

= You: Should I include PHP tags =
Me: Yes.

= You: I have more questions or found an issue =
Me: Reach out on [WordPress support and discussion forums](https://wordpress.org/support/) or Github [issues](https://github.com/drebbits/acf-enhanced-message-field/issues)

== Changelog ==

= 1.1.0 =
* Compatible with ACF 4.4.6 and ACF Pro 5.3.7
* Prevent class conflict if this plugin is already added directly in your plugin/theme.
* __Fix__: Prevent style being printed in json export

= 1.0.1 =
* __Fix__: Updated the prefix of group fields to hide again fields that are not necessary/required.

= 1.0 =
* First release, fresh and innocent but will get you there.
