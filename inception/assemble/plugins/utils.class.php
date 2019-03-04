<?php
/*
Theme name: Inception
Theme URI: http://www.redmexico.com.mx
Version: 2.0
Author: bitcero
Author URI: http://www.bitcero.info
*/

class InceptionUtilities
{
    public function formatDate($time)
    {
        $tf = new RMTimeFormatter('', '%d% %M% %Y%');

        return $tf->format($time);
    }

    /**
     * Allows to create the twitter plugin when available
     * based on content
     * @param mixed $text
     */
    public function preform($text)
    {
        global $xtAssembler;

        if ('{RECENT-TWEETS}' != $text) {
            return $text;
        }

        $ret = '<div class="twitter">';
        $ret .= '<div class="twitter-whole"> ';
        $ret .= '<ul id="twitter_update_list"><li>Twitters is loading ...</li></ul></div>';
        $ret .= '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
        $ret .= '<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=' . $xtAssembler->theme()->settings('twituser') . '&include_rts=1&callback=twitterCallback2&count=' . $xtAssembler->theme()->settings('twitnum') . '"></script>';
        $ret .= '</div>    ';

        return $ret;
    }

    public function createBg($color)
    {
        $color = str_replace('#', '', $color);

        if (file_exists(XOOPS_CACHE_PATH . '/inception/bg' . $color . '.png')) {
            return 'bg' . $color;
        }

        $r = hexdec(mb_substr($color, 0, 2));
        $g = hexdec(mb_substr($color, 2, 2));
        $b = hexdec(mb_substr($color, 4, 2));

        $img = imagecreate(240, 10);
        $bg = imagecolorallocate($img, $r, $g, $b);
        imagepng($img, XOOPS_CACHE_PATH . '/inception/bg' . $color . '.png');
        imagecolordeallocate($bg);
        imagedestroy($img);

        return 'bg' . $color;
    }

    public function extractText($text)
    {
        $tc = TextCleaner::getInstance();
        $text = $tc->clean_disabled_tags($text);
        $text = preg_replace('@<iframe[^>]*?>.*?</iframe>@si', '', $text);
        $text = preg_replace('/<p>/', '', $text);
        $text = preg_replace("/<\/p>/", '', $text);

        return $text;
    }
}
