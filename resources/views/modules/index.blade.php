        @extends('layouts.app')
        @section('content')
            <x-common.page-breadcrumb pageTitle="Módulos" />
            <div class="rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
                <div class=" w-full   ">
                    <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
                        Administración de módulos
                    </h3>

                    <div x-data="iniApp()" class="">
                            <form @submit.prevent="save">
                                <div class="flex items-center gap-3 text-white my-3">
                                    <span>Nombre módulo</span>
                                    <x-form.input model="form.module" @keyup="crearSlug()" class="min-w-[420px]"></x-form.input>
                                    <span>Slug módulo</span>
                                    <x-form.input.validacion keyEval="existslug" debounce="checkSlug()" model="form.moduleslug" class="min-w-[420px]"></x-form.input.validacion>
                                </div>
                                <div class="flex  items-center gap-3 text-white my-3">     
                                    <span>Icono</span>
                                    <x-form.input.icon model="form.icono" class="" modelicon="iconsvg" value="" @click="$dispatch('open-regular-modal')" />
                                    <span>Activo</span>
                                    <x-form.input.checkbox model="form.active" value="1"></x-form.input.checkbox>
                                </div>
                                <div>
                                    <x-button.save></x-button.save>
                                </div>
                            </form>
                    <x-ui.modal @open-regular-modal.window="open = true" class="max-w-[600px]">
                     <div class="relative w-full rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10 text-white">

                        <div class="my-4 max-w-[80%]">

                            <input
                                x-model="search"
                                type="text"
                                placeholder="Buscar icono..."
                                class="
                                    w-full rounded-xl border border-gray-300
                                    px-4 py-2
                                    dark:border-gray-700
                                    dark:bg-gray-900
                                    dark:text-white
                                "
                            >

                        </div>

                        <div class="grid grid-cols-6 md:grid-cols-6 xl:grid-cols-6 gap-4 mt-8 max-h-[400px] overflow-hidden overflow-y-auto">
                            
                        <template x-for="icon in filteredIcons" :key="icon.id">
                           <div class="group border rounded-2xl p-2 hover:border-brand-500 transition cursor-pointer" @click="selectIcon(icon)">
                                <div x-html="icon.svg" class="flex justify-center text-gray-700 dark:text-white"></div>
                             </div>
                        </template>

                    </div>
                     </div>
            </x-ui.modal>
        
                </div>
                    
                </div>    
            </div>
        
            
           
        @endsection

        @push('scripts')
           <script>
                function iniApp() {

                    return {
                        form: {
                                module : '',
                                moduleslug : '',
                                icono : '',
                                active : '',
                        },
                        iconsvg : '', 
                        existslug : null,
                        exists: null,
                        loading: false,
                        switcherToggle : false,
                        eventActive : false,
                        errorForm : false,
                        showModal : false,
                        search : '',
                        icons : @js($icons),

                        get filteredIcons() {

                        if (!this.search) {
                            return this.icons;
                        }

                        return this.icons.filter(icon => {

                            return icon.slug
                                .toLowerCase()
                                .includes(
                                    this.search.toLowerCase()
                                );

                        });
                    },
                        openModal() { this.open = true;},
                        closeModal() { this.open = false;},    
                        crearSlug(){
                            this.form.moduleslug = slugify(this.form.module)
                            this.checkSlug()
                        },
                        selectIcon(icon){
                            this.closeModal();
                            this.form.icono = icon.slug
                            this.iconsvg = icon.svg
                        },
                        async checkSlug(){
                           
                            try {
                                this.loading = true;
                                this.eventActive = true;
                                this.errorForm  = true;
                                const response = await fetch('{{route('api.ckeck.exists')}}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': getCSRF()
                                    },
                                    body: JSON.stringify({
                                        type: 'module',
                                        slug: this.form.moduleslug
                                    })
                                })
                                const data     = await response.json();
                                this.existslug = data.exists;
                                this.errorForm = (this.existslug)  ? true : false
                            } catch (e) {
                                console.error(e);
                            } finally {
                                this.loading = false;
                                this.eventActive = false;
                            }
                        },
                        async save(){
                            try {
                                this.loading = true;
                                this.eventActive = true;
                                 
                                const response = await fetch('{{route('modules.save')}}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': getCSRF()
                                    },
                                    body: JSON.stringify(this.form)
                                })
                                const data     = await response.json();
                                
                            } catch (e) {
                                console.error(e);
                            } finally {
                                this.loading = false;
                                this.eventActive = false;
                            }
                        }    
                    }

                    
            }

            </script> 
        @endpush