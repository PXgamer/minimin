{include file='include/header.tpl'}
<div class="container">
    <h1>{\pxgamer\Minimin\Minimin::APP_NAME} Store</h1>
    <hr>
    <div>
        <h3>Installed Plugins</h3>
        {if !$installed}
            <p>No {\pxgamer\Minimin\Minimin::APP_NAME} plugins are installed.</p>
        {else}
            <table class="table">
                {foreach $installed as $plugin}
                    <tr>
                        <td>
                            <a href="{$plugin->link}">{$plugin->name}</a>
                        </td>
                        <td>
                            <span>{$plugin->description}</span>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {/if}
        <h3>Available Plugins</h3>
        {if !$available}
            <p>No {\pxgamer\Minimin\Minimin::APP_NAME} plugins are available.</p>
        {else}
            <table class="table">
                <tr>
                    <th>Plugin Title</th>
                    <th>Description</th>
                    <th>Downloads</th>
                    <th>Repo</th>
                    <th>Install</th>
                </tr>
                {foreach $available as $plugin}
                    <tr>
                        <td>
                            <a href="{$plugin->url}" target="_blank">{$plugin->name}</a>
                        </td>
                        <td>
                        <span>
                            {$plugin->description}
                        </span>
                        </td>
                        <td>
                        <span>
                            {$plugin->downloads}
                        </span>
                        </td>
                        <td>
                            <a href="{$plugin->repository}" target="_blank"><span class="fa fa-fw fa-github"></span></a>
                        </td>
                        <td>
                            <a href="/store/install/{$plugin->name}"><span class="fa fa-fw fa-download"></span></a>
                        </td>
                    </tr>
                {/foreach}
            </table>
        {/if}
    </div>
</div>
{include file='include/footer.tpl'}