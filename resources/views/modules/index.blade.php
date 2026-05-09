        @extends('layouts.app')
        @section('content')
            <x-common.page-breadcrumb pageTitle="Módulos" />
            <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
                <div class=" w-full   ">
                    <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
                        Administración de módulos
                    </h3>

                    <div x-data="actionForm()" class="">
                            <form>
                                <div class="flex items-center gap-3 text-white my-3">
                                    <span>Nombre módulo</span>
                                    <x-form.input.validacion model="module" class="min-w-[420px]"></x-form.input.validacion>
                                    <span>Slug módulo</span>
                                    <x-form.input.validacion model="moduleslug" class="min-w-[420px]"></x-form.input.validacion>
                                    <span>Icon</span>
                                     
                                    <span>Activo</span>
                                    <x-form.input.checkbox model="switcherToggle" value="1"></x-form.input.checkbox>
                                     
                </div>
                                </div>
                            </form>
                    </div>
                    
@php
    $orders = [
        [
            'product' => 'TailGrids',
            'category' => 'UI Kit',
            'countryFlag' => '/images/country/country-01.svg',
            'country' => 'USA',
            'cr' => 'Dashboard',
            'value' => '$12,499',
        ],
         
    ];
@endphp

<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]"
>
    <div class="flex flex-col gap-4 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Recent Orders</h3>
        </div>

        <div class="flex items-center gap-3">
             
        </div>
    </div>

     
    </div>
</div>
                </div>
            </div>
           <script>
                function actionForm() {

                    return {
                        module: '',
                        moduleslug : '',
                        exists: null,
                        loading: false,
                        eventActive : false,
                        switcherToggle : false
                    }
            }

            </script>
        @endsection