# Hereditary Theme for Wordpress

Demo site: http://hereditary.allankenneth.com

The Wordpress pages system supports parent/child relationships, which makes for a great way to easily categorize content into sections. As Wordpress does not support a taxonomy (categories) on the Page type by default, this is essentially the _only_ way to categorize pages without using a plugin. The thing is: the default Wordpress templates provide very limited means of displaying pages with this hierarchy; manual, hard-coded (through the menu system and/or child theme) links are required to expose these relations. And there appears to be no other themes (am I missing something?) offered by third parties where supporting this is a first class consideration.

Using the parent/child feature of pages allows people to easily create reference sites. Even when you enable a taxonomy for the Page type, the added UI complexity for the end-user creates too steep a learning curve, in my experience. For the theme developer, the extra templating required to implement taxonomy archives is a hassle, at best; a nightmare many times.

It would seem that if all you’re looking to do is put together a quick and simple reference website using the WP pages system, things could be much, much easier, especially for non-developers who aren’t comfortabtle making a child theme. Hereditary Theme is my attempt to remedy this situation. The style is based on Bootstrap 4 (alpha at present time), and contains several walkers for supporting correctly-Bootstrap-formatted wp_list_pages and menu_nav functions.

* When you’re on a page that has children, those children are automatically listed within the left sidebar; add a new page, it’s listed. 
* If you’re on a page that has a parent, that parent is listed within the breadcrumb, and any sibling pages are listed in the left sidebar.

I’m looking at integrating several other Bootstrap features into this theme, but as a start, just these two features enable you to create relatively well structured, simple reference sites without using a single plugin. Using Bootstrap as a base allows there to be an exceptional amount of variation upon the default look and feel. One big roadmap feature will be to create some sort of UI to some theme Bootstrap repository or another. At the same time, customization through the admin panel in Wordpress will be a thing too.

