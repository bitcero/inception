<div class="mwitem_single" id="mwitem-<{$post.id}>">
    <{if $enable_images}>
    <div class="five columns alpha">
        <a href="<{$post.link}>" title="<{$post.title}>"><img src="<{$xoops_imageurl}>include/thumbs.php?src=<{$post.image}>&w=276&h=196" alt="<{$post.title}>" class="post_image" /></a>
    </div>
    <{/if}>
    <div class="<{if $enable_images}>seven columns omega<{else}>twelve columns<{/if}>">
        <h3 class="mw_title"><{$post.title}></h3>
        <span class="mw_date"><{$utils->formatDate($post.time)}></span>
        <p><{$utils->extractText($post.text)|truncate:250:'...':false:true}></p>
        <div class="mw_info">
            <a href="<{$post.link}>" class="button"><{$lang_readmore}></a> &nbsp; <{$lang_comments|sprintf:$post.comments}>
        </div>
    </div>
</div>
