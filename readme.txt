=== Peruse ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/peruse-feminine-wordpress-theme/
Author URI: https://www.templatesell.com/
Tags: grid-layout, one-column, two-columns, three-columns, four-columns, left-sidebar, right-sidebar, block-patterns, block-styles, custom-background, custom-logo, custom-menu, featured-images, featured-image-header, flexible-header, full-width-template, translation-ready, footer-widgets, custom-colors, custom-header, editor-style, rtl-language-support, sticky-post, theme-options, threaded-comments, wide-blocks, blog, news, photography
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.0.8
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for author information, featured posts, social icons, etc. It comes with primary color option to change the whole site color with a single click.

== Description ==

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.
== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Peruse includes support for Infinite Scroll in Jetpack.

== Notes ==
* Custom pagination for numeric is made.

== Changelog ==
= 1.0.8 - August 24 2026 =

Fixed
* Changing the Primary Color left more than half the theme behind. The stylesheet paints 138 selectors with the default accent and the dynamic CSS named 60 of them, so blockquote marks, every comment link hover and focus, checked radio buttons and checkboxes, pagination hovers, the 404 page's links, widget titles and the whole text-widget form stayed #0017ff whatever the user picked. The selector list is generated from the stylesheet now and covers all 138
* One of the selectors in that list was written "aarticle.format-status", which is not a valid selector, so that post format's badge was never recoloured either
* The Primary Color is run through sanitize_hex_color() rather than esc_attr(). esc_attr() escapes for an HTML attribute, and this value goes into a stylesheet - a stored value of "red; }" would have closed the rule and kept going
* The stylesheet names five font families and the theme loaded three. Lora, used for the search field and pullquotes, and Playfair Display, used for every blockquote and its opening mark, were never requested at all, so those elements rendered in a generic serif rather than the faces they were designed in
* The body font was requested from Google as "Muli", the name retired when the family became Mulish
* The main stylesheet was enqueued with no version argument, so WordPress fell back to its own version number: style.css was cache-busted by WordPress releases rather than by theme releases
* Four scripts call jQuery and declared no dependency on it. They worked only because the slider happens to pull jQuery in on every page
* The widget script was registered with true as its fourth argument. That argument is the version, not the in-footer flag, so the version became "1" and the script loaded in the header
* Post dates, the read-more link, category lines and both post navigations were #989ea6 - 2.70:1 against white, well under the readable minimum. The slider dots measured 2.95:1 and the slider arrows 1.67:1
* Keyboard focus had no styling of its own
* The text domain was loaded without being told where the language files are
* A find-and-replace had turned the word "Public" into "Peruse" in three license notices, including the License header in style.css and readme.txt - which read "GNU General Peruse License v2 or later" - and inside the GPL notice of a bundled third-party library

Performance
* Fonts are served from the theme instead of Google. Three requests went out on every page view, over protocol-relative URLs with no version
* wp_enqueue_media() ran on every screen in the admin. The callback took no hook argument and checked nothing, so the whole media library bundle loaded whether or not a widget form was on the page
* Removed 132 KB of bundled files nothing referenced: both copies of iScroll, the minified twins of the off-canvas menu's CSS and JS, and an unused grid stylesheet
* Every stylesheet and script is versioned from the theme version or the library's own. Font Awesome was labelled 4.5.0 and is 4.7.0; Bootstrap was labelled 4.5.0 and is 4.0.0; Slick, Canvi and Theia Sticky Sidebar were given "4.5.0", "4.6.0" and "20200412", none of which are versions of them

Editor
* Added editor styles. css/editor-styles.css was 47 bytes - one rule setting a maximum width, with no typography, no colours and no block styling - and it was loaded through enqueue_block_editor_assets, which no longer reaches the content now that the editor renders it in an iframe. So writing a post looked nothing like reading one
* Added three block styles - Lead paragraph, Boxed and Plain - and three block patterns. The tag list has advertised block-patterns and block-styles since the theme shipped and neither was implemented
* Declared support for a custom background and for wide alignment, both of which the tags have also advertised since the theme shipped

Other
* Corrected the readme: the stable tag said 1.0.0 where the theme was on 1.0.7, the PHP requirement said 5.2, and a missing comma had run "full-width-template" and "threaded-comments" together into one invalid tag
* Added languages/peruse.pot
* Tested up to WordPress 7.1

= 1.0.7 - February 24 2022 =
* Checked with WP 5.9
* Fixed widget screen
* Changed copyright text

= 1.0.6 - August 13 2021 =
* Checked with WP 5.8
* Disable new widget screen

= 1.0.5 - April 06 2021 =
* Fixed Social share issue

= 1.0.4 - March 27 2021 =
* Breadcrumb support for Rank Math plugin added

= 1.0.3 - March 26 2021 =
* Upgrade to pro added
* Pro notice added
* About page added

= 1.0.2 - March 25 2021 =
* Fixed some minor CSS things

= 1.0.1 - March 22 2021 =
* Fixed keyboard navigation

= 1.0.0 - March 05 2021 =
* Initial release

== Credits ==

Peruse is free WordPress theme by, Template Sell.
Peruse is distributed under the terms of the GNU GPL v2 or later.

* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* BreadcrumbTrail, Copyright (c) 2008 - 2015, Justin Tadlock http://themehybrid.com/plugins/breadcrumb-trail
* Theia Sticky Sidebar https://github.com/WeCodePixels/theia-sticky-sidebar [MIT license]
* Slick Slider https://github.com/kenwheeler/slick/blob/master/LICENSE [The MIT License (MIT)]
* Font-Awesome https://github.com/FortAwesome/Font-Awesome FontAwesome 4.6.3 Copyright 2012 Dave Gandy Font License: SIL OFL 1.1 Code License: MIT License http://fontawesome.io/license/
* imagesLoaded MIT License https://imagesloaded.desandro.com/#mit-license
* Canvi The MIT License (MIT) https://github.com/thepinecode/canvi/blob/master/LICENSE.txt

== Screenshot Images [CCO License] ==
Image for theme screenshot, Copyright Candace McDaniel
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/teenager-girl-XM66YUQ8TE

Image for theme screenshot, Copyright Christian Mackie
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/hands-camera-49GJJ9QOHM

Image for theme screenshot, Copyright Matt Bango
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-hat-BFNYMZK4VP

Image for theme screenshot, Copyright Bruce Mars
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-hat-BFNYMZK4VP

Image for theme screenshot, Copyright Burst
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-looking-GMAVOEQH7V

* Sidbear icons for the customizer are self created and license under GPL.