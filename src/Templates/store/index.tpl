{include file='include/header.tpl'}
<div class="container">
    <h1>{\pxgamer\Minimin\Minimin::APP_NAME} Store</h1>
    <hr>
    <div>
        <h3>Installed Plugins</h3>
        <table class="table">
            {foreach $installed as $plugin}
                <a href="{$plugin->link}">{$plugin->name}</a>
            {/foreach}
            {if !$installed}
                <p>No {\pxgamer\Minimin\Minimin::APP_NAME} plugins are installed.</p>
            {/if}
        </table>
        <h3>Available Plugins</h3>
        <table class="table">
            {foreach $available as $plugin}
            {/foreach}
            {if !$available}
                <p>No {\pxgamer\Minimin\Minimin::APP_NAME} plugins are available.</p>
            {/if}
        </table>
    </div>
</div>
{include file='include/footer.tpl'}