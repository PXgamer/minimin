{$installed_plugins = pxgamer\Minimin\Plugins::get()}
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#minimin-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{pxgamer\Minimin\Minimin::APP_NAME}</a>
        </div>

        <div class="collapse navbar-collapse" id="minimin-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/store"><span class="fa fa-fw fa-shopping-cart"></span> Store</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-fw fa-bolt"></span> Plugins <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        {if !$installed_plugins}

                        {else}
                            {foreach $installed_plugins as $plugin}
                                <li><a href="/{$plugin->link}">{$plugin->name}</a></li>
                            {/foreach}
                        {/if}
                    </ul>
                </li>
                <li><a href="/options"><span class="fa fa-fw fa-cogs"></span> Options</a></li>
            </ul>
        </div>
    </div>
</nav>