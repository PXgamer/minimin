{include file='include/header.tpl'}
<div class="container">
    <h1>{\pxgamer\Minimin\Minimin::APP_NAME} Store</h1>
    <hr>
    <div>
        <h3>{if $status}Successfully installed {else}Failed to install {/if} the <code>{$vendor}/{$package}</code> {\pxgamer\Minimin\Minimin::APP_NAME} package.</h3>
    </div>
</div>
{include file='include/footer.tpl'}