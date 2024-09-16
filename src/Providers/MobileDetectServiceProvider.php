<?php

namespace Shaqi\MobileDetect\Providers;

use Shaqi\MobileDetect\MobileDetect;
use Illuminate\Support\Facades\View;
use Shaqi\MobileDetect\Facades\MobileDetectFacade;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\AliasLoader;
use Botble\Base\Supports\ServiceProvider;
use Shaqi\MobileDetect\Directives\iOSBladeDirective;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Shaqi\MobileDetect\Directives\MobileBladeDirective;
use Shaqi\MobileDetect\Directives\TabletBladeDirective;
use Shaqi\MobileDetect\Directives\AndroidBladeDirective;
use Shaqi\MobileDetect\Directives\DesktopBladeDirective;
use Shaqi\MobileDetect\Contracts\BladeDirectiveInterface;
use Shaqi\MobileDetect\Directives\HandheldBladeDirective;
use Shaqi\MobileDetect\Directives\NotMobileBladeDirective;
use Shaqi\MobileDetect\Directives\NotTabletBladeDirective;

class MobileDetectServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('MobileDetect', function ($app) {
            return new MobileDetect();
        });

        AliasLoader::getInstance()->alias('MobileDetect', MobileDetect::class);
    }
    protected $defer = true;

    public function boot(MobileDetect $MobileDetect): void
    {
        $this->registerBladeDirectives($MobileDetect);

        $this
            ->setNamespace('plugins/mobiledetect')
            ->loadHelpers();
    }

    /**
     * @param MobileDetect $MobileDetect
     */
    private function registerBladeDirectives(MobileDetect $MobileDetect)
    {
        $this->registerDirective(new DesktopBladeDirective($MobileDetect));
        $this->registerDirective(new HandheldBladeDirective($MobileDetect));
        $this->registerDirective(new TabletBladeDirective($MobileDetect));
        $this->registerDirective(new NotTabletBladeDirective($MobileDetect));
        $this->registerDirective(new MobileBladeDirective($MobileDetect));
        $this->registerDirective(new NotMobileBladeDirective($MobileDetect));
        $this->registerDirective(new AndroidBladeDirective($MobileDetect));
        $this->registerDirective(new iOSBladeDirective($MobileDetect));
    }

    /**
     * @param BladeDirectiveInterface $directive
     */
    private function registerDirective(BladeDirectiveInterface $directive)
    {
        Blade::directive($directive->openingTag(), [$directive, 'openingHandler']);
        Blade::directive($directive->closingTag(), [$directive, 'closingHandler']);
        Blade::directive($directive->alternatingTag(), [$directive, 'alternatingHandler']);
    }
}
