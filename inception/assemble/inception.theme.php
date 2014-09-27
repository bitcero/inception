<?php
/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 2.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

class Inception extends XtTheme implements XtITheme
{
    public function details(){
        
        $details = array(
            'name' => 'Inception Theme',
            'description' => __('Inception is a stunning theme for XOOPS, based on xThemes. This theme allows you to create a great site with several features and configurations. You have the control of every single aspect of the appearance..','inception'),
            'version' => '2.0.5',
            'author' => 'Eduardo Cortes (bitcero)',
            'uri' => 'http://www.eduardocortes.mx',
            'author_uri' => 'http://www.eduardocortes.mx',
            'author_email' => 'i.bitcero@gmail.com',
            'license' => 'Commercial',
            'dir' => 'inception',
            'screenshot' => 'images/shot.jpg',
            'social' => array(
                'twitter' => 'http://www.twitter.com/bitcero/',
                'google-plus' => 'https://plus.google.com/u/0/115179107044073767092/',
                'linkedin' => 'http://www.linkedin.com/in/bitcero/',
                'instagram' => 'http://www.instagram.com/eduardocortesh',
                'flickr' => 'https://www.flickr.com/photos/bitcero/',
                'blog' => 'http://eduardocortes.mx'
            )
        );
        
        return $details;
        
    }
    
    /**
    * This theme supports xThemes 1.5 menus
    */
    public function haveMenus(){
        
        $menu['top'] = array(
            'title' => __('Navigation Top', 'inception'),
            'levels' => 1
        );
        
        $menu['main'] = array(
            'title' => __('Main Navigation','inception'),
            'levels' => 3
        );
        
        return $menu;
        
    }
    
    /**
    * Configuration options
    */
    public function options(){
        $options = include('inception-options.php');
        return $options;
    }
    
    public function init(){
        global $rmTpl, $xtAssembler, $xoopsTpl;
        
        $rmTpl->add_style('base.css', 'inception', array(), 'theme');
        $rmTpl->add_style('skeleton.css', 'inception', array(), 'theme');
        $rmTpl->add_style('layout.css', 'inception', array(), 'theme');
        $rmTpl->add_style('inception-css.php', 'inception', array(), 'theme');
        $rmTpl->add_style('superfish.css', 'inception', array(), 'theme');
        
        // Scripts
        $rmTpl->add_script('hoverIntent.js','inception', array(), 'theme');
        $rmTpl->add_script('superfish.js','inception', array(), 'theme');
        $rmTpl->add_script('supersubs.js','inception', array(), 'theme');
        $rmTpl->add_script('inception.js','inception', array(), 'theme');
        
        if($xtAssembler->isHome()){
            $rmTpl->add_style('flexslider.css', 'inception', array(), 'theme');
            $rmTpl->add_script('jquery.flexslider-min.js','inception', array(), 'theme');
            
            // Language strings
            $xoopsTpl->assign('lang_from_blog',__('From the blog','inception'));
            $xoopsTpl->assign('lang_recent_posts',__('Recent Posts','inception'));
            $xoopsTpl->assign('lang_viewallposts',__('View all posts','inception'));
            $xoopsTpl->assign('lang_viewblog',__('View the Blog','inception'));

        }
        
        $xoopsTpl->assign('lang_readmore',__('Read More','inception'));
        $xoopsTpl->assign('lang_comments',__('%s Comments','inception'));
        $xoopsTpl->assign('lang_goto',__('Where do you want to go?','inception'));
        
        // Include webfont
        if ( $this->settings('sitename_font') != '' )
            $rmTpl->add_head('<link rel="stylesheet" type="text/css" href="'.$this->settings('sitename_font').'" media="all" />');
        if ( $this->settings( 'titles_font_family') != '' && $this->settings( 'titles_font_family') != $this->settings( 'sitename_font_family') )
            $rmTpl->add_head('<link rel="stylesheet" type="text/css" href="'.$this->settings('titles_font').'" media="all" />');
        if ( $this->settings('body_font') != '' )
            $rmTpl->add_head('<link rel="stylesheet" type="text/css" href="'.$this->settings('body_font').'" media="all" />');
    }
    
    /**
    * This function allows to register plugins in xtAssembler
    */
    public function register(){
        
        $plugins[] = array(
            'name'  =>  'InceptionUtilities',     // Class name
            'var'   =>  'utils',            // Smarty var to assign object (<{$thumbs->method()})
            'file'  =>  'utils.class.php'
        );
        
        return $plugins;
        
    }
    
    /**
    * Show a little help about Inception
    */
    public function controlPanel(){
        global $rmc_config, $rmTpl, $xtFunctions;

        $rmTpl->add_theme_style('dashboard.css', 'inception');
        xoops_cp_header();
        
        $dir = XOOPS_THEME_PATH.'/inception/lang/';
        if(!is_file($dir.$rmc_config['lang'].'.php')){
            include $dir.$rmc_config['lang'].'.php';
        } else {
            include $dir.'en.php';
        }
        
        xoops_cp_footer();
        
    }
    
}
