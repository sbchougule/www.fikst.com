# RPM Framework
Basic Theme for RPM Theme Framework: https://bitbucket.org/thomasnetrpm/rpm-understrap-framework

## Backend Credentials
https://rpmunderstrap.wpengine.com/wp-admin
Username: demo
Password: thomas

## Installation
1. Clone rpm-understrap-framework from bitbucket(https://bitbucket.org/thomasnetrpm/rpm-understrap-framework)
2. Upload the rpm-default theme folder to your wp-content/themes directory
3. Go into your WP admin backend 
4. Go to "Appearance -> Themes"
5. Activate the theme

## Editing
Add your own CSS styles to `/css/theme/_modules.scss`
or import you own files into `/css/theme.scss`

To overwrite Bootstrap's or RPM's base variables just add your own value to:
`/css/theme/_variables.scss`

For example, the "$primary" variable is used by both Bootstrap and RPM.

Add your own color like: `$primary: #ff6600;` in `/css/theme/_variables.scss` to overwrite it. This change will automatically apply to all elements that use the $primary variable.

It will be outputted into:
`/css/theme.min.css` and `/css/theme.css`

So you have one clean CSS file at the end and just one request.

##JS
Add your own JS script to `/js/main.js`
also your plugins files into `/js/plugins.js`

It will be outputted into:
`/js/production.min.js`

###Options page:
- Add your global data to default `dashboard->options` page
- Select header or footer designs form option page Header/Footer Styles
- To add content for footer style 2, use widgets and add it in `appearance->widgets->Footer Full` area.

###Other
- We have used built-in bootstrap, animations with WOW, woocommerce, widgets for sidebar, materials icon and fontawesome to create structure.
- To create header, footer, sidebar and flexible content structure use files from `/parts/shared/*`
- Pages templates are in page-template folder `/page-template/*`
- Add Images in `/img`


## Developing With NPM, Gulp, SASS

### Installing Dependencies
- Make sure you have installed Node.js, Gulp on your computer globally
- Open your terminal and browse to the location of your theme
- Run: `$ npm install` then: `$ gulp`

### Running
To work and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to work and compile your Sass and scripts files on the fly start:

- then run: `$ gulp`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:
```javascript
  "browserSyncOptions" : {
    "proxy": "localhost/wordpress/",
    "notify": false
  }
};
```
- then add `browser-sync` to watch-bs task
- then run: `$ gulp watch-bs`

[1] Visit [https://browsersync.io/](https://browsersync.io/) for more information on Browser Sync
