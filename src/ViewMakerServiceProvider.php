<?php

namespace PolarisPixels\ViewMaker;

use Illuminate\Support\ServiceProvider;
use PolarisPixels\ViewMaker\Console\Commands\MakeViewCommand;

class ViewMakerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
                            MakeViewCommand::class,
                        ]);
    }
}
