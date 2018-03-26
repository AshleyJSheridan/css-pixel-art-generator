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

This is the original (resized) image:

![Original Mona Lisa Image at 345x515px](https://raw.githubusercontent.com/AshleyJSheridan/css-pixel-art-generator/master/docs/original.jpg)

Using a 20:1 pixel ratio by setting image and pixel box size to 20, using a total of 468 box shadows:

![Original Mona Lisa Image at 345x515px](https://raw.githubusercontent.com/AshleyJSheridan/css-pixel-art-generator/master/docs/20to1.jpg)

More box shadows using a 10:1 ratio. Total box shadows is 1,820!

![Original Mona Lisa Image at 345x515px](https://raw.githubusercontent.com/AshleyJSheridan/css-pixel-art-generator/master/docs/10to1.jpg)

Finally, a 1:1 pixel ratio, resulting in a whopping 177,675 box shadows!:

![Original Mona Lisa Image at 345x515px](https://raw.githubusercontent.com/AshleyJSheridan/css-pixel-art-generator/master/docs/1to1.jpg)

*Note, the examples here are screen shots taken from the resulting HTML page, as that kind of CSS isn't possible here.*


## Caveats

Due to some browsers not handling too many box shadows on a single element, be careful when using either very large images, or very small pixel settings as your browser may not cope well.

## Future Improvements

This is only a very simple script with no error handling or any other nice things that you would expect. Things I'll be adding are:

* Error checking for the various things that could go wrong
* Support for image types other than JPEG
* Make available through a web server and not just a CLI script
    * Possibly add some level of caching here to prevent abuse of any public endpoint
* Return/echo the HTML and CSS code rather than always save to file