# CSS Pixel Art Generator

Simple PHP CLI script to turn a JPEG image into a single div masterpiece using `box-shadow` to generate pixels.

## Requirements

* PHP CLI
* Composer
* GD

## Installation

* Clone repo locally
* Run `composer install` within the project root directory
* Make the `pixel_art` file executable

## Using

To use, run the following in the command line:

```sh
./pixel_art path_to_jpeg_file.jpg
```

An HTML file with the same name but an `.html` extension will be generated within the `dist` directory. Open in any modern browser.

You can change the size of the CSS pixel blocks by changing the `$css_block_size` value. The script will read every `$image_block_size`*th* pixel from the image. Lowering this number will result in slower generation times and more box shadows.

## Examples

![Original Mona Lisa Image at 345x515px](/AshleyJSheridan/css-pixel-art-generator/master/docs/original.jpg)

## Caveats

Due to some browsers not handling too many box shadows on a single element, be careful when using either very large images, or very small pixel settings as your browser may not cope well.