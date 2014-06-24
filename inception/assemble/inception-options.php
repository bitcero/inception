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
if(!function_exists("get_mywords_categories")){
    function get_mywords_categories(){
        static $mw_categos;
        xoops_load('mwfunctions', 'mywords');
        
        if(!empty($mw_categos)) return $mw_categos;
        
        $categos = array();

        MWFunctions::categos_list($categos);
        
        $mw_categos[0] = __('Select category...','inception');
        foreach($categos as $cat){
            $mw_categos[$cat['id_cat']] = $cat['name'];
        }
        
        return $mw_categos;
        
    }
}

$sections = array(
    'appearance' => __('General Appearance','inception'),
    'colors' => __('Theme Colors','inception'),
    'home'  => __('Home Page','inception'),
    'footer'  => __('Footer','inception'),
    'twitter'  => __('Twitter','inception')
);

global $xoopsConfig;

$options['sitename'] = array(
    'section'       => 'appearance',
    'caption'       => __('Site name:','inception'),
    'description'   => __('This value will replace to site name configuration in general preferences.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '7',
    'default'       => $xoopsConfig['sitename']
);

$options['sitename_font'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font for special text','inception'),
    'description'   => __('Please select the font that will be used in special texts.','inception'),
    'type'          => 'webfonts',
    'content'       => 'text',
    'length'        => '7',
    'default'       => 'http://fonts.googleapis.com/css?family=Oswald'
);

$options['sitename_font_family'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font family string for special text','inception'),
    'description'   => __('Indicate the css font-family string for special text.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '50',
    'default'       => 'Oswald, Impact, arial, sans-serif'
);

/* TITLE FONT */
$options['titles_font'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font for special text','inception'),
    'description'   => __('Please select the font that will be used in titles.','inception'),
    'type'          => 'webfonts',
    'content'       => 'text',
    'length'        => '7',
    'default'       => 'http://fonts.googleapis.com/css?family=Oswald'
);

$options['titles_font_family'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font family string for special text','inception'),
    'description'   => __('Indicate the css font-family string for titles.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '50',
    'default'       => 'Oswald, Impact, arial, sans-serif'
);

/* General FONT */
$options['body_font'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font to use in theme body','inception'),
    'description'   => __('Please select the font that will be used in body.','inception'),
    'type'          => 'webfonts',
    'content'       => 'text',
    'length'        => '7',
    'default'       => 'http://fonts.googleapis.com/css?family=Roboto'
);

$options['body_font_family'] = array(
    'section'       => 'appearance',
    'caption'       => __('Font family string for special text','inception'),
    'description'   => __('Indicate the css font-family string for bpdy.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '50',
    'default'       => 'Roboto'
);

$options['body_font_size'] = array(
    'section'       => 'appearance',
    'caption'       => __('Default font size','inception'),
    'description'   => __('This size will be used in general body texts.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '50',
    'default'       => '14px'
);

$options['bgimage'] = array(
    'section'       => 'appearance',
    'caption'       => __('Background image for website','inception'),
    'description'   => __('The image size must be large enough to be adjusted to the size of the screen.','inception'),
    'type'          => 'imageurl',
    'content'       => 'text',
    'length'        => '50',
    'default'       => ''
);

$options['bgmode'] = array(
    'section'       => 'appearance',
    'caption'       => __('Mode of background','inception'),
    'description'   => '',
    'type'          => 'radio',
    'content'       => 'text',
    'length'        => '50',
    'default'       => 'no-repeat',
    'options'       => array( 'repeat' => __('Tiled','inception'), 'no-repeat' => __('Fit Screen','inception'))
);

$options['bgfixed'] = array(
    'section'       => 'appearance',
    'caption'       => __('Fixed background','inception'),
    'description'   => '',
    'type'          => 'yesno',
    'content'       => 'int',
    'length'        => '50',
    'default'       => '1'
);

$options['bgorientation'] = array(
    'section'       => 'appearance',
    'caption'       => __('Background orientation','inception'),
    'description'   => '',
    'type'          => 'radio',
    'content'       => 'int',
    'length'        => '50',
    'default'       => '1',
    'options'       => array(0 => __('Portrait', 'inception'), 1 => __('Landscape', 'inception'))
);

$options['container_shadow'] = array(
    'section'       => 'appearance',
    'caption'       => __('Show shadow for theme container','inception'),
    'description'   => '',
    'type'          => 'yesno',
    'content'       => 'int',
    'default'       => '1'
);

$options['container_shadow_size'] = array(
    'section'       => 'appearance',
    'caption'       => __('Size of the container shadow','inception'),
    'description'   => '',
    'type'          => 'textbox',
    'content'       => 'int',
    'default'       => '4'
);

$options['container_shadow_opacity'] = array(
    'section'       => 'appearance',
    'caption'       => __('Size of the container shadow','inception'),
    'description'   => __('Values from 0 to 1 (e.g. 0.1)', 'inception'),
    'type'          => 'textbox',
    'content'       => 'int',
    'default'       => '0.1'
);

/*             COLORS
====================================*/
$options['bgcolor'] = array(
    'section'       => 'colors',
    'caption'       => __('Page background color:','inception'),
    'description'   => __('Specify the color that will be used as background in all pages.','inception'),
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#0C1116'
);

$options['top_bgcolor'] = array(
    'section'       => 'colors',
    'caption'       => __('Top navigation bar background color:','inception'),
    'description'   => __('Specify the color that will be used as background in top navigation bar.','inception'),
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#0C1116'
);

$options['linktop'] = array(
    'section'       => 'colors',
    'caption'       => __('Color for top navigation links:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFF'
);

$options['headcolor'] = array(
    'section'       => 'colors',
    'caption'       => __('Background color for header:','inception'),
    'description'   => __('Specify the background color for header. This color affects to submenus and buttons background.','inception'),
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#45484d'
);

$options['header_gradient'] = array(
    'section'       => 'colors',
    'caption'       => __('Background style for header:','inception'),
    'description'   => '',
    'type'          => 'radio',
    'content'       => 'integer',
    'default'       => '1',
    'options'       => array( 0 => __('Solid', 'inception'), 1 => __('Gradient', 'inception'))
);

$options['headtext'] = array(
    'section'       => 'colors',
    'caption'       => __('Text color for main navigation:','inception'),
    'description'   => __('This color will be used for color text in main navigation links.','inception'),
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#676767'
);

$options['logocolor'] = array(
    'section'       => 'colors',
    'caption'       => __('Color for site name text:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFFFFF'
);

$options['featured_bg'] = array(
    'section'       => 'colors',
    'caption'       => __('Background color for featured content:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#040404'
);

$options['featured_gradient'] = array(
    'section'       => 'colors',
    'caption'       => __('Background style for featured content:','inception'),
    'description'   => '',
    'type'          => 'radio',
    'content'       => 'integer',
    'default'       => '1',
    'options'       => array( 0 => __('Solid', 'inception'), 1 => __('Gradient', 'inception'))
);

$options['asidecolor'] = array(
    'section'       => 'colors',
    'caption'       => __('Color for left side content:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#040404'
);

$options['asideTextColor'] = array(
    'section'       => 'colors',
    'caption'       => __('Color for left side text:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#444444'
);

/*          HOME
===============================*/

$options['slider'] = array(
    'section'       => 'home',
    'caption'       => __('Slider content:','inception'),
    'description'   => __('Select content for home page slider','inception'),
    'type'          => 'slider',
    'content'       => 'array',
    'length'        => '7',
    'default'       => '',
    'options'       => array(
        'image' => array(
            'caption' => __('Select image for slider','inception'),
            'description' => __('The image must have a size of 960 x 400 pixels.','xthemes'),
            'type' => 'imageurl'
        ),
        'link' => array(
            'caption' => __('Specify the link for this slider','inception'),
            'description' => '',
            'type' => 'textbox'
        ),
        'content' => array(
            'caption' => __('Text content','inception'),
            'description' => '',
            'type' => 'textarea'
        )
    )
);

$options['sbtcolor'] = array(
    'section'       => 'home',
    'caption'       => __('Background color for slider titles:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FE5C28'
);

$options['stcolor'] = array(
    'section'       => 'home',
    'caption'       => __('Text color for slider titles:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFFFFF'
);

$options['caption_bg'] = array(
    'section'       => 'home',
    'caption'       => __('Background color for slider captions:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#000000'
);

$options['caption_color'] = array(
    'section'       => 'home',
    'caption'       => __('Text color for slider captions:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFFFFF'
);

$options['featured'] = array(
    'section'       => 'home',
    'caption'       => __('MyWords featured category:','inception'),
    'description'   => __('Select the category where featured posts will be published. Inception will format this information automatically.','inception'),
    'type'          => 'select',
    'content'       => 'int',
    'length'        => '7',
    'default'       => '0',
    'options'       => get_mywords_categories()
);

$options['blog'] = array(
    'section'       => 'home',
    'caption'       => __('MyWords blog category:','inception'),
    'description'   => __('Select the category where blog posts will be published. Inception will format this information automatically.','inception'),
    'type'          => 'select',
    'content'       => 'int',
    'length'        => '7',
    'default'       => '0',
    'options'       => get_mywords_categories()
);

$options['blog_limit'] = array(
    'section'       => 'home',
    'caption'       => __('Number of posts to show in blog column:','inception'),
    'description'   => '',
    'type'          => 'textbox',
    'content'       => 'int',
    'default'       => '5'
);

$options['blog_link'] = array(
    'section'       => 'home',
    'caption'       => __('Blog link','inception'),
    'description'   => __('This link will be used in home page, at bottom of "From The Blog" list.', 'inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'default'       => XOOPS_URL . '/modules/mywords/'
);

$options['recent_limit'] = array(
    'section'       => 'home',
    'caption'       => __('Number of recent posts to show in home:','inception'),
    'description'   => '',
    'type'          => 'textbox',
    'content'       => 'int',
    'default'       => '4'
);

$options['posts_link'] = array(
    'section'       => 'home',
    'caption'       => __('"View all posts" link','inception'),
    'description'   => __('This link will be used in home page, at bottom of "Recent Posts" list.', 'inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'default'       => XOOPS_URL . '/modules/mywords/'
);

/* ========= FOOTER ============ */
$options['footer_bg'] = array(
    'section'       => 'footer',
    'caption'       => __('Footer background color:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#000000'
);

$options['ftColor'] = array(
    'section'       => 'footer',
    'caption'       => __('Footer titles color:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFFFFF'
);

$options['fColor'] = array(
    'section'       => 'footer',
    'caption'       => __('Footer text color:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#000000'
);

$options['fLinks'] = array(
    'section'       => 'footer',
    'caption'       => __('Footer links color:','inception'),
    'description'   => '',
    'type'          => 'color',
    'content'       => 'text',
    'length'        => '7',
    'default'       => '#FFFFFF'
);

$options['block-one-title'] = array(
    'section'       => 'footer',
    'caption'       => __('First block title:','inception'),
    'description'   => __('Title for first block of footer.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '150',
    'default'       => __('About Us','inception')
);

$options['block-one-content'] = array(
    'section'       => 'footer',
    'caption'       => __('First block content:','inception'),
    'description'   => __('Content for first block of footer.','inception'),
    'type'          => 'textarea',
    'content'       => 'text',
    'length'        => '',
    'default'       => ''
);

$options['block-two-title'] = array(
    'section'       => 'footer',
    'caption'       => __('Second block title:','inception'),
    'description'   => __('Title for second block of footer.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '150',
    'default'       => __('Contact Us','inception')
);

$options['block-two-content'] = array(
    'section'       => 'footer',
    'caption'       => __('Second block content:','inception'),
    'description'   => __('Content for second block of footer.','inception'),
    'type'          => 'textarea',
    'content'       => 'text',
    'length'        => '',
    'default'       => ''
);

$options['block-three-title'] = array(
    'section'       => 'footer',
    'caption'       => __('Three block title:','inception'),
    'description'   => __('Title for three block of footer.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '150',
    'default'       => __('Recent Tweets','inception')
);

$options['block-three-content'] = array(
    'section'       => 'footer',
    'caption'       => __('Three block content:','inception'),
    'description'   => __('Content for three block of footer.','inception'),
    'type'          => 'textarea',
    'content'       => 'text',
    'length'        => '',
    'default'       => '{RECENT-TWEETS}'
);

$options['block-four-title'] = array(
    'section'       => 'footer',
    'caption'       => __('Four block title:','inception'),
    'description'   => __('Title for four block of footer.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '150',
    'default'       => __('What whe do','inception')
);

$options['block-four-content'] = array(
    'section'       => 'footer',
    'caption'       => __('Four block content:','inception'),
    'description'   => __('Content for four block of footer.','inception'),
    'type'          => 'textarea',
    'content'       => 'text',
    'length'        => '',
    'default'       => ''
);

/*          TWITTER
**********************************/
$options['twituser'] = array(
    'section'       => 'twitter',
    'caption'       => __('Twitter username:','inception'),
    'description'   => __('Specify the twitter username that will be used to show tweets.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '20',
    'default'       => '@redmexico'
);

$options['twitnum'] = array(
    'section'       => 'twitter',
    'caption'       => __('Number of tweets:','inception'),
    'description'   => __('Thw number of tweets that will be shown at time.','inception'),
    'type'          => 'textbox',
    'content'       => 'text',
    'length'        => '10',
    'default'       => '5'
);

$settings = array(
    'sections'  => $sections,
    'options'   => $options
);

return $settings;