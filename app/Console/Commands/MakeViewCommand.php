<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    protected $signature = 'make:view {name}';

    protected $description = 'Crear una vista Blade';

    public function handle()
    {
        $name = $this->argument('name');

        $path = resource_path(
            'views/' . str_replace('.', '/', $name) . '.blade.php'
        );

        // Crear carpetas si no existen
        File::ensureDirectoryExists(dirname($path));

        // Verificar si ya existe
        if (File::exists($path)) {

            $this->error('La vista ya existe.');

            return;
        }

        // Contenido inicial
        $contenido = <<<BLADE
        @extends('layouts.app')
        @section('content')
            <x-common.page-breadcrumb pageTitle="Title" />
            <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
                <div class="mx-auto w-full max-w-[630px] text-center">
                    <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
                        Title
                    </h3>

                    <p class="text-sm text-gray-500 dark:text-gray-400 sm:text-base">
                        Loremp Ipsum
                    </p>
                </div>
            </div>
        @endsection
BLADE;

        File::put($path, $contenido);

        $this->info("Vista creada: {$path}");
    }
}