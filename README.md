# BW CSS Crush Handler

**BW CSS Crush Handler** integrates [CSSCrush](http://the-echoplex.net/csscrush) into WordPress and processes only specific CSS files based on naming conventions.

## Features

- Processes only files ending with `.ori_csscrush.css`.
- Generates processed files as `*.csscrush.css`.
- Automatically caches processed files and provides a fallback in case of errors.
- Ensures better performance by skipping unnecessary CSS processing.

## Requirements

- WordPress 5.0 or higher.
- PHP 7.4 or higher.
- CSSCrush library installed in `lib/css-crush-master/`.

## Installation

1. Download the plugin files.
2. Copy the `bw-css-crush-handler` folder to your WordPress `wp-content/plugins` directory.
3. Place the CSSCrush library in `lib/css-crush-master/`.
4. Activate the plugin in the WordPress admin area.

## Usage

1. Rename CSS files you want to process to end with `.ori_csscrush.css`.
   - Example: `foo.ori_csscrush.css`.
2. Enqueue these files in your theme or plugin.
3. The processed file will be saved as `foo.style.csscrush.css` in the cache.

## License

MIT License
