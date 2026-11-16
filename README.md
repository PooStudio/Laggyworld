# Laggy World website

The site is authored as PHP templates in `src/pages` and shared page components in `src/partials`.
GitHub Pages serves the generated static site, not PHP directly.

To build locally, use PHP 8.2 or newer and run:

```sh
php build.php
```

The generated site is written to `dist`. In the repository's GitHub Pages settings, set the build and deployment source to **GitHub Actions**. The workflow builds the PHP pages and deploys the static output.
