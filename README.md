# BW CSS Crush Handler

**BW CSS Crush Handler** is a WordPress plugin that integrates the [CSSCrush](http://the-echoplex.net/csscrush) preprocessor for handling enqueued CSS files.

## Features

- Processes all enqueued CSS files using CSSCrush.
- Automatically minifies, caches, and applies versioning to CSS files.
- Outputs preprocessed `<link>` tags using `csscrush_tag()`.
- Non-administrator users receive cached CSS if caching is enabled.
- Fallback to cached CSS in case CSSCrush encounters errors.

## Requirements

- WordPress 5.0 or higher.
- PHP 7.4 or higher.
- CSSCrush library installed in the `lib/css-crush-master/` directory.

## Installation

1. Clone or download this repository.
2. Copy the folder `bw-css-crush-handler` into your WordPress `wp-content/plugins` directory.
3. Ensure the CSSCrush library is located in `lib/css-crush-master/` inside the plugin directory.
4. Activate the plugin in your WordPress admin area.

## Configuration

No additional configuration is needed. Once installed and activated, the plugin automatically processes all enqueued CSS files.

### Processing Options

The following options are passed to CSSCrush by default:

- `cache: true` — Enables caching for processed CSS.
- `debug: false` — Disables debug mode.
- `minify: true` — Minifies the output CSS.
- `versioning: true` — Appends version numbers to CSS file URLs.
- `output_dir: [uploads]/bw-css-crush-cache/` — Sets the output directory for processed CSS files.

You can customize these options by modifying the plugin code if needed.

## Troubleshooting

1. **CSSCrush Errors**:
   - If CSSCrush encounters errors, such as invalid CSS syntax, non-administrator users will receive the last cached CSS version (if caching is enabled).

2. **Caching Issues**:
   - Ensure the cache directory (`/wp-content/uploads/bw-css-crush-cache/`) is writable by your server.

3. **Debugging**:
   - Enable `debug: true` in the CSSCrush options to view detailed error logs.

## License

This plugin is open-source and released under the MIT License.
