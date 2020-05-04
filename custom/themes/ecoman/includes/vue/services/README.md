# HASTE - Hypenotic Adaptable Simple Template

Because speed.

## Intro

HASTE is a hybrid environment using WordPress to manage content, and Vue to serve content.

WordPress comes with a familiar backend that many non-developer, non-rocket-scientist clients are comfortable with using.
Vue speeds up the delivery of content by retrieving data without requesting to load or reload a whole page.

The two are bridged with REST via [axios](https://github.com/axios/axios).

![HASTE](https://i.imgur.com/STHEmwE.png)

## Ingredients

- [WordPress](https://github.com/WordPress/WordPress)
- [Meta Box](https://metabox.io/)
    - [MB Rest API](https://metabox.io/plugins/mb-rest-api/)
- [Vue](https://vuejs.org/)
    - [Vuex]()
    - [axios](https://github.com/axios/axios)

## Quick Start

Assuming that a flatfile prototype is already built:

### 1. CMS Configuration

The CMS is configured _solely_ for the purpose of managing content, no PHP templating is done. Therefore, the HASTE theme folder does not actually have any content.

#### Wordpress

1. Place WordPress repo contents into the `cms/wordpress` folder however you wish.

2. Fill out necessary information, paths, and credentials in `cms/wp-config.php` according to your setup.

3. Install WordPress via web interface. (Navigate to your install on the web browser)

4. Within the `HASTE` theme folder, determine which template files (`page.php`, `single.php`, etc.) are needed and add as seen fit - https://developer.wordpress.org/themes/basics/template-hierarchy/
    - Make sure `wp_head()` is called eventually in the template files. This call can be put straight within the template, but is more useful inside `header.php`, which is included into the template with `get_header()`
    - _Optional:_ Rename the `HASTE` theme folder to whatever the project name is.
    
5. Go to the WordPress settings page. In order to be able to access `wp-json`, permalink style has to be changed from the default option (you just have to)

6. Grab necessary plugins:
    - Meta Box
    - MB Rest API

#### Meta box

1. Construct the necessary meta boxes in the `HASTE/include/metaboxes` folder.

2. Within `HASTE/functions.php`:
    - Include all meta box templates and function files with require_once().
    - If a pure Vue frontend is being made, extending/modularizing this part is probably unnecessary.
    
3. Write all the content into a new WordPress page.

### 2. Development/Building

Keep in mind these two files: `/src/main.js` and `/dist/build.js`.

`main.js` is the root source file, `build.js` is what `index.html` will source. `npm run dev` will automatically do the real-time changey magic as long as `build.js` is sourced.

#### npm Configuration

1. Necessary files for `npm run dev`
    - `package.json`
    - `webpack.config.js`
    - `.babelrc` is necessary for ES6 stuff in the Vue files

#### Vue

1. Store
    - Vuex is already included in the project files.
        - Store files are in the `src/store` folder.
    - If splitting into per-context files, import them into `index.js`
    - Change the url for the axios call to point to your WP install's wp-json (eg. haste.com/cms/wp-json)

2. Template files
    - Translate flat site file(s) into Vue template file(s).
        - If single paged site, use App.vue for the single page template.
        - If multiple pages, make subtemplates to include into the main App.vue template.