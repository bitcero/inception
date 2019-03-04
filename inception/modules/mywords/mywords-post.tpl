<{if $shownav}>
<div class="mwpostnav fontfamily">
    <{if $prev_post}><a class="prev" href="<{$prev_post.link}>">&laquo; <{$prev_post.title}></a><{/if}>
    <{if $next_post}><a class="next" href="<{$next_post.link}>"><{$next_post.title}> &raquo;</a><{/if}>
</div>
<{/if}>
<div class="mwitem">
    <h3><{$post.title}></h3>
    <{if $post.published!=''}>
        <span class="mwinfotop">
        <{$post.published}>. <{if $edit_link}> | <{$edit_link}><{/if}>
        | <{$lang_reads}>
        <{if $post.trackback!=''}>
        | <a href="<{$post.trackback}>"><{$lang_trackback}></a>
        <{/if}>
        </span>
    <{/if}>
    <{if $socials}>
        <div class="mwbooks">
            <{foreach item=bm from=$socials}>
                <a href="javascript:;" onclick="openWithSelfMain('<{$bm.url}>','marker',600,600);" title="<{$bm.alt}>"><img src="<{$xoops_url}>/modules/mywords/images/icons/<{$bm.icon}>" alt="<{$bm.alt}>"></a>
            <{/foreach}>
        </div>
    <{/if}>
    <div class="mwtext">
        <{if $enable_images}><img src="<{$post.image}>" alt="<{$post.title}>" class="full_post_image"><{/if}>
        <{$post.text}>
    </div>
    <div class="mwfoot">
        <{if $post.cats!=''}>
        <div class="six columns alpha">
            <span class="mwcats"><{$lang_publish}></span>
            <{$post.cats|replace:"<a ":'<a class="button"'}>
        </div>
        <{/if}>
        
        <{if $post.tags!=''}>
        <div class="six columns omega">
            <span class="mwtags"><{$lang_tagged}></span> <{$post.tags|replace:"<a ":'<a class="button"'}>
        </div>
        <{/if}>
    </div>
</div>
<{$post_navbar}>

<h4 class="comments_title"><{$lang_numcoms}></h4>

<!-- Start Comments -->
<a name="comments"></a>
<{include file="db:rmc-comments-display.html"}>
<{include file="db:rmc-comments-form.html"}>
<!-- /End comments -->

<!-- Trackbacks -->
<{if $trackbacks}>
<h2 class="comments_title"><{$lang_numtracks}></h2>
<div id="trackbacks-list">
<{foreach item=tb from=$trackbacks}>
    <div class="tb_item">
        <span class="title"><{$tb.title}></span>
        <span class="blogdate"><a href="<{$tb.url}>"><{$tb.blog}></a> | <{$tb.date}></span>
        <{$tb.text}>
    </div>
<{/foreach}>
</div>
<{/if}>
<!-- /Trackbacks -->

<{if $pingnow}>
<iframe src="<{$xoops_url}>/modules/mywords/ping.php?post=<{$post.id}>" style="display: none; width: 0; height: 0;"></iframe>
<{/if}>