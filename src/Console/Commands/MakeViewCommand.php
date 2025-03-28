<?php

namespace PolarisPixels\ViewMaker\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    protected $signature = 'make:view {name : The view name (e.g. demo/index)}';
    protected $description = 'Create a new Blade view file';

    public function handle(): int
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');

        if (File::exists($path)) {
            $this->error("View already exists at: {$path}");
            return static::FAILURE;
        }

        File::ensureDirectoryExists(dirname($path));

        File::put($path, <<<BLADE
@extends('layouts.app')

@section('header_title', ucfirst(basename('$name')))
@section('content')
    <p>This is the {$name} view.</p>
@endsection
BLADE);

        $this->info("View created: resources/views/{$name}.blade.php");

        return static::SUCCESS;
    }
}
