# Base WordPress theme

## Required plugins

Your WordPress site must have [Advanced Custom Field Pro](https://www.advancedcustomfields.com/pro/) installed before using this theme. Ask the lead developer for the activation key.

## Installing frontend requirements

```bash
npm install
```

## Development mode

In development mode Webpack will compile your SCSS (with autoprefixer) and JS (ES6) files and start a Browsersync server continually watching your changes. Files will also be written to `assets/dist`. The entry points are `assets/js/index.js` and `assets/scss/index.scss`.

Assuming your local WordPress installation is served at http://example.test, you can run the Browsersync server like this:

```bash
npm start -- --env.proxy example.test
```

Now the proxied site with auto-reload will be available at http://localhost:3000. The regular site without auto-reload will still be available at the original URL.

## Production mode

In production mode Webpack will compile your assets and create minified files in `assets/dist`. You can then transfer these files to the server by using FTP or `rsync`. To compile in production mode:

```bash
npm run build
```

The resulting files are generated with unique names by Webpack to get automatic cache-busting when enqueued in WordPress.

## Code style

Linting is configured in `assets/.eslintrc` (JS) and `assets/.stylelintrc` (CSS). Check the files for the configuration details.

Linters can be run with:

```bash
npm run lint:js
npm run lint:css
```
