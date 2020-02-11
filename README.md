# Custom WordPress Theme

> This needs to be updated to include better documentation on the production builds (hashed filename option vs cachebuster in manifest.json).

> The wp-config.php is extremely handy but doesn't work well with WP Engine

> SASS files include a set up custom utility classes based on [https://github.com/nikrowell/css-starter](https://github.com/nikrowell/css-starter). Needs better documentation!

```bash
npm install
# start webpack in watch mode with Browsersync and live reloading
npm start
# create production builds of JS and CSS into ./build
npm run build
# clean build and cache folders generally not needed
# as it's used before each command above
npm run clean
```

<hr>

## Installation

1. Download this repo, or clone it and run `rm -fr .git`

2. Temporarily move the theme to the root directory `mv wp-content/themes/custom ./`

3. Download the latest version of WordPress `curl -O https://wordpress.org/latest.zip` and unzip it `unzip latest.zip`

4. Copy the unzipped files into the parent directory `cp -r wordpress/ ./` on OSX or `cp -RT wordpress/ ./` on Linux

5. Move the theme back `mv custom/ wp-content/themes/`

6. Remove the zip `rm latest.zip` and the unzipped folder `rm -fr wordpress/`

7. Edit **wp-config.php** including [security salts](https://api.wordpress.org/secret-key/1.1/salt/) and default DB credentials. For added security, new installs should set `$table_prefix` to something other than `wp_`

8. Optionally, give the theme a project-specific name and update _custom_ references in the following files:
- .gitignore
- style.css
- images/favicons/manifest.json

## WordPress Settings

### General
### Writting
### Reading
### Discussion
### Media
### Permalink

## Configuration

This theme uses a modified wp-config.php file that allows for setting environment-specific core and theme constants. If a **wp-config-local.php** file exists, it will be imported after the default settings have loaded. All core and theme constants are set using an associate array, where keys become PHP constants:

```
$env['WP_DEBUG'] = true;
$env['DB_HOST'] = 'localhost';
$env['MY_CONSTANT'] = 808;
```

Production settings sould be set in wp-config.php and overriden as needed in wp-config-local.php, which is part of the default gitignore. If sensitive information needs to be kept out of repositories (API keys etc), a wp-config-local.php file can be used in production environments as well.

### Theme Constants

**TODO** write more about each of these

Setting                     | Description
--------------------------- | -------------------------------------------------
**`PAGE_{IDENTIFIER}`**     |
**`PAGE_TEMPLATES`**        | Array of custom page templates where key is the page id and value is the relative file path: `PAGE_ABOUT => 'pages/about'`. Useful for automating one-off templates that shouldn't be exposed in the WP Dashboard.
**`ADMIN_BLOCK_TYPES`**     | Array of allowed Gutenberg block types.
**`ADMIN_DOCS_URL`**        |
**`ADMIN_HIDE_MENUS`**      |
**`ADMIN_HIDE_EDITORS`**    |
**`ADMIN_HIDE_TAXONOMIES`** |
**`CACHE_DIR`**             |
**`CACHE_EXPIRES`**         |
**`CACHE_ENCRYPT`**         |
**`ROUTER_PATTERN`**        |
**`ROUTER_DELIMITER`**      |

## Plugins

Plugins are ignored from the repository unless explicitly whitelisted via gitignore. A list of plugins (and versions) should be kept as up-to-date as possible. Using [WP-CLI](https://wp-cli.org/), `wp plugin list` will output a list of all installed plugins, which can be included as a comment in the wp-config.php file:

```
+----------------------------+----------+-----------+---------+
| name                       | status   | update    | version |
+----------------------------+----------+-----------+---------+
| advanced-custom-fields-pro | active   | none      | 5.3.7   |
| contact-form-7             | active   | none      | 4.4.1   |
| wordpress-seo              | inactive | available | 3.1.2   |
+----------------------------+----------+-----------+---------+
```

## Code Conventions

### HTML

The outline below shows a suggested HTML structure. All elements are divs unless otherwise noted and most sections will typically wrap children inside a `container` div. Unused elements in any given project should be removed from templates and stylesheets to avoid code bloat.

```
.site
    header.site-header (#header)
        .logo (#logo)
            a
        nav.nav (#nav)
            ul.nav__list
                li.nav__item
                li.nav__item.current
                li.nav__item.parent
                    .submenu
                        ul
                            li.submenu__item
                            li.submenu__item.current
        nav.nav-secondary
            ul.nav-secondary__list
                li.nav-secondary__item
                li.nav-secondary__item
                li.nav-secondary__item
        .social.social--header
            ul.social__list
                a.social__link.social__link--facebook
                a.social__link.social__link--twitter
                a.social__link.social__link--linkedin
        button.nav-toggle
    .site-content (#content)
        .page-header
            h1.page-headline
            p.page-intro
            ul.breadcrumb
                li.breadcrumb__item
                li.breadcrumb__item.current
        main.main
            article
                header.article-header
                    h1.article-header__title
                    ul.article-meta
                        li.article-meta__date
                        li.article-meta__author
                .content (**WYSIWYG**)
                    h2
                    h3
                    h4
                    p.lead
                    p.callout
                    a.cta-link
                    a.button
                    p.footnote
            nav.pagination
                .pagination__item.pagination__item--prev
                .pagination__item
                ...
                .pagination__item
                .pagination__item.pagination__item--next
            ul.nav-posts
                .nav-posts__item.nav-posts__item--prev
                .nav-posts__item.nav-posts__item--next
        aside.sidebar
            .sidebox.sidebox--lorem
            .sidebox.sidebox--ipsum
            ul.nav-categories
                (wp generated items)
    section.contact-cta
        div.contact-cta__heading
        p.contact-cta__text
        a.contact-cta__btn
    footer.site-footer (#footer)
        .footer-primary
            ul.nav-footer
                li.nav-footer__item
                li.nav-footer__item
            .social.social--footer
                ul.social__list
                    a.social__link.social__link--facebook
                    a.social__link.social__link--twitter
                    a.social__link.social__link--linkedin
        .footer-secondary
            .footer-links
            .footer-info
            .footer-copyright
```

### CSS

CSS classnames use the [BEM methodology](https://css-tricks.com/bem-101/), with the exception of common state modifiers like `current` or `parent`. These classes should almost always be scoped, as the specificity is desireable and it avoids obnoxious BEM class names.

Element ID's should never be used for styling an element. Use ID's for JavaScript functionality, and use underscores to separate multiple words in an id (#contact_form). This isn't necessary, but helps as an extra step in differentiating id and class selectors in JavaScript.

### JS

If a classname is intended to be used only as a JavaScript selector, it should be prefixed with `js-`. JavaScript hook classes should _never_ be styled; only use non-prefixed versions or other classes for styling.

```html
<div class="some-component js-clickable">Click Me</div>
```

**TODO:** using the window.site.data object for passing dynamic data to scripts

### SVG

Always optimize SVG files usings [SVGO](https://jakearchibald.github.io/svgomg/) or similar optimization tools. This not only reduces overall file size, it makes the SVG code much easier to modify for use with JavaScript or CSS.
