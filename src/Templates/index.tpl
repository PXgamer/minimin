{include file='include/header.tpl'}
<div class="container">
    <h1>{\pxgamer\Minimin\Minimin::APP_NAME}</h1>
    <hr>
    <div>
        <h3>Minimin Control Panel</h3>
        <ul class="list-unstyled">
            <li><a href="/admin">Minimin Options</a></li>
            <li><a href="/store">Minimin Store</a></li>
            {foreach $plugins as $plugin}
                <li><a href="/{$plugin->link}">{$plugin->name}</a> v{$plugin->version}</li>
            {/foreach}
        </ul>
    </div>
</div>
{include file='include/footer.tpl'}