<?php
/*
Plugin name: Posts from MyWords
Plugin URI: http://www.redmexico.com.mx
Version: 2.0
Author: Eduardo Cortés (bitcero)
Author URI: http://www.bitcero.info
License: GPL v2
Copyright: Eduardo Cortés 2011 - 2012
*/

function smarty_function_posts($options, $tpl)
{
    $path = XOOPS_ROOT_PATH . '/modules/mywords';
    require_once $path . '/class/mwpost.class.php';

    $cat = isset($options['cat']) ? $options['cat'] : 0;
    $var = isset($options['var']) ? $options['var'] : 'posts';
    $limit = isset($options['limit']) ? $options['limit'] : 5;
    $status = isset($options['status']) ? $options['status'] : 'publish';
    $len = isset($options['len']) ? $options['len'] : 70;

    $db = XoopsDatabaseFactory::getDatabaseConnection();
    if ($cat > 0) {
        $sql = 'SELECT a.* FROM ' . $db->prefix('mod_mywords_posts') . ' as a, ' . $db->prefix('mod_mywords_catpost') . " as b WHERE
            b.cat='$cat' AND a.id_post=b.post AND a.status='$status' ORDER BY `pubdate` DESC LIMIT 0,$limit";
    } else {
        $sql = 'SELECT * FROM ' . $db->prefix('mod_mywords_posts') . " WHERE
            status='$status' ORDER BY `pubdate` DESC LIMIT 0,$limit";
    }

    $result = $db->query($sql);
    $ret = [];
    $i = 0;
    $vars = '';
    $tpl->assign($var, null);
    while (false !== ($row = $db->fetchArray($result))) {
        $post = new MWPost();
        $post->assignVars($row);

        if ('' != $post->getVar('image')) {
            $img = new RMImage();
            $img->load_from_params($post->getVar('image', 'e'));
            $image = $img->getOriginal();
        }

        if (1 == $limit) {
            $tpl->assign($var, [
                'id' => $post->id(),
                'title' => $post->getVar('title'),
                'text' => TextCleaner::getInstance()->truncate($post->content(true), $len),
                'link' => $post->permalink(),
                'metas' => $post->get_meta('', false),
                'time' => $post->getVar('pubdate'),
                'comments' => $post->getVar('comments'),
                'image' => $image,
            ]);
        } else {
            $tpl->append($var, [
                'id' => $post->id(),
                'title' => $post->getVar('title'),
                'text' => TextCleaner::getInstance()->truncate($post->content(true), $len),
                'link' => $post->permalink(),
                'metas' => $post->get_meta('', false),
                'time' => $post->getVar('pubdate'),
                'comments' => $post->getVar('comments'),
                'image' => $image,
            ]);
        }

        $i++;
    }
}
