<?php
/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 1.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

/**
 * Get the mywords categories
 */
if (!function_exists('get_mywords_categories')) {
    function get_mywords_categories()
    {
        static $mw_categos;
        xoops_load('mwfunctions', 'mywords');

        if (!empty($mw_categos)) {
            return $mw_categos;
        }

        $categos = [];

        MWFunctions::categos_list($categos);

        $mw_categos[0] = __('Select category...', 'inception');
        foreach ($categos as $cat) {
            $mw_categos[$cat['id_cat']] = $cat['name'];
        }

        return $mw_categos;
    }
}

$sections = [
    'appearance' => __('General Appearance', 'inception'),
    'colors' => __('Theme Colors', 'inception'),
    'home' => __('Home Page', 'inception'),
    'footer' => __('Footer', 'inception'),
];

global $xoopsConfig;

/*----------------------------------------
       1. GENERAL APPEARANCE SECTION
  ----------------------------------------*/

$options['sitename'] = [
    'section' => 'appearance',
    'caption' => __('Site name:', 'inception'),
    'description' => __('This value will replace to site name configuration in general preferences.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '7',
    'default' => $xoopsConfig['sitename'],
];

$options['sitename_font'] = [
    'section' => 'appearance',
    'caption' => __('Font for site name', 'inception'),
    'description' => __('Please select the font that will be used in the site name.', 'inception'),
    'type' => 'webfonts',
    'content' => 'text',
    'length' => '7',
    'default' => 'http://fonts.googleapis.com/css?family=Oswald',
];

$options['sitename_font_family'] = [
    'section' => 'appearance',
    'caption' => __('CSS ont family string for site name', 'inception'),
    'description' => __('Indicate the css font-family string that will be used in the site name.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '50',
    'default' => 'Oswald, Impact, arial, sans-serif',
];

/* TITLE FONT */
$options['titles_font'] = [
    'section' => 'appearance',
    'caption' => __('Font for titles and buttons', 'inception'),
    'description' => __('Please select the font that will be used in titles and buttons.', 'inception'),
    'type' => 'webfonts',
    'content' => 'text',
    'length' => '7',
    'default' => 'http://fonts.googleapis.com/css?family=Oswald',
];

$options['titles_font_family'] = [
    'section' => 'appearance',
    'caption' => __('CSS font family string for titles and buttons', 'inception'),
    'description' => __('Indicate the css font-family string for titles and buttons.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '50',
    'default' => 'Oswald, Impact, arial, sans-serif',
];

/* General FONT */
$options['body_font'] = [
    'section' => 'appearance',
    'caption' => __('Font to use in theme body', 'inception'),
    'description' => __('Please select the font that will be used in body.', 'inception'),
    'type' => 'webfonts',
    'content' => 'text',
    'length' => '7',
    'default' => 'http://fonts.googleapis.com/css?family=Roboto',
];

$options['body_font_family'] = [
    'section' => 'appearance',
    'caption' => __('Font family string for body', 'inception'),
    'description' => __('Indicate the css font-family string that will be used for body.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '50',
    'default' => 'Roboto',
];

$options['body_font_size'] = [
    'section' => 'appearance',
    'caption' => __('Default font size', 'inception'),
    'description' => __('This size will be used in general body texts.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '50',
    'default' => '14px',
];

$options['bgimage'] = [
    'section' => 'appearance',
    'caption' => __('Background image for website', 'inception'),
    'description' => __('The image size must be large enough to be adjusted to the size of the screen.', 'inception'),
    'type' => 'imageurl',
    'content' => 'text',
    'length' => '50',
    'default' => '',
];

$options['bgmode'] = [
    'section' => 'appearance',
    'caption' => __('Mode of background', 'inception'),
    'description' => '',
    'type' => 'radio',
    'content' => 'text',
    'length' => '50',
    'default' => 'no-repeat',
    'options' => [ 'repeat' => __('Tiled', 'inception'), 'no-repeat' => __('Fit Screen', 'inception')],
];

$options['bgfixed'] = [
    'section' => 'appearance',
    'caption' => __('Fixed background', 'inception'),
    'description' => '',
    'type' => 'yesno',
    'content' => 'int',
    'length' => '50',
    'default' => '1',
];

$options['bgorientation'] = [
    'section' => 'appearance',
    'caption' => __('Background orientation', 'inception'),
    'description' => '',
    'type' => 'radio',
    'content' => 'int',
    'length' => '50',
    'default' => '1',
    'options' => [0 => __('Portrait', 'inception'), 1 => __('Landscape', 'inception')],
];

$options['container_shadow'] = [
    'section' => 'appearance',
    'caption' => __('Show shadow for theme container', 'inception'),
    'description' => '',
    'type' => 'yesno',
    'content' => 'int',
    'default' => '1',
];

$options['container_shadow_size'] = [
    'section' => 'appearance',
    'caption' => __('Size of the container shadow', 'inception'),
    'description' => '',
    'type' => 'textbox',
    'content' => 'int',
    'default' => '4',
];

$options['container_shadow_opacity'] = [
    'section' => 'appearance',
    'caption' => __('Opacity of the container shadow', 'inception'),
    'description' => __('Values from 0 to 1 (e.g. 0.1)', 'inception'),
    'type' => 'textbox',
    'content' => 'int',
    'default' => '0.1',
];

/*----------------------------------------
             2. COLORS SECTION
  ----------------------------------------*/
$options['bgcolor'] = [
    'section' => 'colors',
    'caption' => __('Page background color:', 'inception'),
    'description' => __('Specify the color that will be used as background in all pages.', 'inception'),
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#0C1116',
];

$options['top_bgcolor'] = [
    'section' => 'colors',
    'caption' => __('Top navigation bar background color:', 'inception'),
    'description' => __('Specify the color that will be used as background in top navigation bar.', 'inception'),
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#0C1116',
];

$options['linktop'] = [
    'section' => 'colors',
    'caption' => __('Color for top navigation links:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFF',
];

$options['topshadow'] = [
    'section' => 'colors',
    'caption' => __('Display shadow for top navigation links:', 'inception'),
    'description' => '',
    'type' => 'yesno',
    'content' => 'int',
    'default' => 0,
];

$options['headcolor'] = [
    'section' => 'colors',
    'caption' => __('Background color for header:', 'inception'),
    'description' => __('Specify the background color for header. This color affects to submenus and buttons background.', 'inception'),
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#45484d',
];

$options['header_gradient'] = [
    'section' => 'colors',
    'caption' => __('Background style for header:', 'inception'),
    'description' => '',
    'type' => 'radio',
    'content' => 'integer',
    'default' => '1',
    'options' => [ 0 => __('Solid', 'inception'), 1 => __('Gradient', 'inception')],
];

$options['headtext'] = [
    'section' => 'colors',
    'caption' => __('Text color for main navigation:', 'inception'),
    'description' => __('This color will be used for color text in main navigation links.', 'inception'),
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#676767',
];

$options['logocolor'] = [
    'section' => 'colors',
    'caption' => __('Color for site name text:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFFFFF',
];

$options['featured_bg'] = [
    'section' => 'colors',
    'caption' => __('Background color for featured content:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#040404',
];

$options['featured_gradient'] = [
    'section' => 'colors',
    'caption' => __('Background style for featured content:', 'inception'),
    'description' => '',
    'type' => 'radio',
    'content' => 'integer',
    'default' => '1',
    'options' => [ 0 => __('Solid', 'inception'), 1 => __('Gradient', 'inception')],
];

$options['asidecolor'] = [
    'section' => 'colors',
    'caption' => __('Color for left side content:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#040404',
];

$options['asideTextColor'] = [
    'section' => 'colors',
    'caption' => __('Color for left side text:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#444444',
];

/*----------------------------------------
              3. HOME SECTION
  ----------------------------------------*/

$options['slider'] = [
    'section' => 'home',
    'caption' => __('Slider content:', 'inception'),
    'description' => __('Select content for home page slider', 'inception'),
    'type' => 'slider',
    'content' => 'array',
    'length' => '7',
    'default' => '',
    'options' => [
        'image' => [
            'caption' => __('Select image for slider', 'inception'),
            'description' => __('The image must have a size of 960 x 400 pixels.', 'xthemes'),
            'type' => 'imageurl',
        ],
        'link' => [
            'caption' => __('Specify the link for this slider', 'inception'),
            'description' => '',
            'type' => 'textbox',
        ],
        'content' => [
            'caption' => __('Text content', 'inception'),
            'description' => '',
            'type' => 'textarea',
        ],
    ],
];

$options['sbtcolor'] = [
    'section' => 'home',
    'caption' => __('Background color for slider titles:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FE5C28',
];

$options['stcolor'] = [
    'section' => 'home',
    'caption' => __('Text color for slider titles:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFFFFF',
];

$options['caption_bg'] = [
    'section' => 'home',
    'caption' => __('Background color for slider captions:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#000000',
];

$options['caption_color'] = [
    'section' => 'home',
    'caption' => __('Text color for slider captions:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFFFFF',
];

$options['featured'] = [
    'section' => 'home',
    'caption' => __('MyWords featured category:', 'inception'),
    'description' => __('Select the category where featured posts will be published. Inception will format this information automatically.', 'inception'),
    'type' => 'select',
    'content' => 'int',
    'length' => '7',
    'default' => '0',
    'options' => get_mywords_categories(),
];

$options['blog'] = [
    'section' => 'home',
    'caption' => __('MyWords blog category:', 'inception'),
    'description' => __('Select the category where blog posts will be published. Inception will format this information automatically.', 'inception'),
    'type' => 'select',
    'content' => 'int',
    'length' => '7',
    'default' => '0',
    'options' => get_mywords_categories(),
];

$options['blog_limit'] = [
    'section' => 'home',
    'caption' => __('Number of posts to show in blog column:', 'inception'),
    'description' => '',
    'type' => 'textbox',
    'content' => 'int',
    'default' => '5',
];

$options['blog_link'] = [
    'section' => 'home',
    'caption' => __('Blog link', 'inception'),
    'description' => __('This link will be used in home page, at bottom of "From The Blog" list.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'default' => XOOPS_URL . '/modules/mywords/',
];

$options['recent_limit'] = [
    'section' => 'home',
    'caption' => __('Number of recent posts to show in home:', 'inception'),
    'description' => '',
    'type' => 'textbox',
    'content' => 'int',
    'default' => '4',
];

$options['posts_link'] = [
    'section' => 'home',
    'caption' => __('"View all posts" link', 'inception'),
    'description' => __('This link will be used in home page, at bottom of "Recent Posts" list.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'default' => XOOPS_URL . '/modules/mywords/',
];

/*----------------------------------------
             4. FOOTER SECTION
  ----------------------------------------*/
$options['footer_bg'] = [
    'section' => 'footer',
    'caption' => __('Footer background color:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#000000',
];

$options['ftColor'] = [
    'section' => 'footer',
    'caption' => __('Footer titles color:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFFFFF',
];

$options['fColor'] = [
    'section' => 'footer',
    'caption' => __('Footer text color:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#000000',
];

$options['fLinks'] = [
    'section' => 'footer',
    'caption' => __('Footer links color:', 'inception'),
    'description' => '',
    'type' => 'color',
    'content' => 'text',
    'length' => '7',
    'default' => '#FFFFFF',
];

$options['block-one-title'] = [
    'section' => 'footer',
    'caption' => __('First block title:', 'inception'),
    'description' => __('Title for first block of footer.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '150',
    'default' => __('About Us', 'inception'),
];

$options['block-one-content'] = [
    'section' => 'footer',
    'caption' => __('First block content:', 'inception'),
    'description' => __('Content for first block of footer.', 'inception'),
    'type' => 'textarea',
    'content' => 'text',
    'length' => '',
    'default' => '',
];

$options['block-two-title'] = [
    'section' => 'footer',
    'caption' => __('Second block title:', 'inception'),
    'description' => __('Title for second block of footer.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '150',
    'default' => __('Contact Us', 'inception'),
];

$options['block-two-content'] = [
    'section' => 'footer',
    'caption' => __('Second block content:', 'inception'),
    'description' => __('Content for second block of footer.', 'inception'),
    'type' => 'textarea',
    'content' => 'text',
    'length' => '',
    'default' => '',
];

$options['block-three-title'] = [
    'section' => 'footer',
    'caption' => __('Third block title:', 'inception'),
    'description' => __('Title for three block of footer.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '150',
    'default' => __('Recent Tweets', 'inception'),
];

$options['block-three-content'] = [
    'section' => 'footer',
    'caption' => __('Third block content:', 'inception'),
    'description' => __('Content for three block of footer.', 'inception'),
    'type' => 'textarea',
    'content' => 'text',
    'length' => '',
    'default' => '{RECENT-TWEETS}',
];

$options['block-four-title'] = [
    'section' => 'footer',
    'caption' => __('Fourth block title:', 'inception'),
    'description' => __('Title for four block of footer.', 'inception'),
    'type' => 'textbox',
    'content' => 'text',
    'length' => '150',
    'default' => __('What whe do', 'inception'),
];

$options['block-four-content'] = [
    'section' => 'footer',
    'caption' => __('Fourth block content:', 'inception'),
    'description' => __('Content for four block of footer.', 'inception'),
    'type' => 'textarea',
    'content' => 'text',
    'length' => '',
    'default' => '',
];

$settings = [
    'sections' => $sections,
    'options' => $options,
];

return $settings;
