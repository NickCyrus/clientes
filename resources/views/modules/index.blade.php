@extends('layouts.app')

@section('content')

<x-common.page-breadcrumb pageTitle="Módulos" />
<div x-data="iniApp()">
<div  class="rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12" >

    <div class="w-full" >

        <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
            Administración de módulos
        </h3>

        <form @submit.prevent="save">

            <input x-model="form.id" type="hidden" />

            <div class="flex items-center gap-3 text-white my-3">
                <span>Nombre módulo</span>

                <x-form.input
                    model="form.module"
                    @keyup="crearSlug()"
                    class="min-w-[420px]"
                />

                <span>Slug módulo</span>

                <x-form.input.validacion
                    keyEval="existslug"
                    debounce="checkSlug()"
                    model="form.moduleslug"
                    class="min-w-[420px]"
                />
            </div>

            <div class="flex items-center gap-3 text-white my-3">
                <span>Icono</span>

                <x-form.input.icon
                    model="form.icono"
                    modelicon="iconsvg"
                    @click="$dispatch('open-regular-modal')"
                />

                <span>Activo</span>

                <x-form.input.checkbox
                    model="form.active"
                    value="1"
                />
            </div>

            <x-button.save />

        </form>

        <x-ui.modal @open-regular-modal.window="open = true" class="max-w-[600px]">

            <div class="relative w-full rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10 text-white">

                <div class="my-4 max-w-[80%]">
                    <input
                        x-model="search"
                        type="text"
                        placeholder="Buscar icono..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-2 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                    >
                </div>

                <div class="grid grid-cols-6 gap-4 mt-8 max-h-[400px] overflow-y-auto">

                    <template x-for="icon in filteredIcons" :key="icon.id">

                        <div
                            class="group border rounded-2xl p-2 hover:border-brand-500 transition cursor-pointer"
                            @click="selectIcon(icon)"
                        >
                            <div
                                x-html="icon.svg"
                                class="flex justify-center text-gray-700 dark:text-white"
                            ></div>
                        </div>

                    </template>

                </div>

            </div>

        </x-ui.modal>

    </div>

</div>

<div class="mt-5 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
            Lista de módulos
        </h3>

        <div class="relative">
            <span class="absolute -translate-y-1/2 pointer-events-none left-4 top-1/2">
                <!-- Search Icon -->
                <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill=""></path>
                </svg>
            </span>
            <input type="text" x-model="searchInList" @input.debounce.500ms="loadItems()" placeholder="Buscar ..." class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-200 bg-transparent py-2.5 pl-12 pr-14 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-800 dark:bg-white/3 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 xl:w-[430px]">
        </div>

    </div> 

    <div class="max-w-full overflow-x-auto custom-scrollbar" x-init="loadItems()">

        <table class="min-w-full">

            <thead>
                <tr class="border-t border-gray-100 dark:border-gray-800">
                    <th class="py-3 text-left">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                            Icono / Nombre
                        </p>
                    </th>

                    <th class="py-3 text-left">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                            Slug
                        </p>
                    </th>
                     <th class="py-3 text-left">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                            Estado
                        </p>
                    </th>
                     <th class="py-3 text-left">
                        <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                            
                        </p>
                    </th>
                </tr>
            </thead>

            <tbody>

                <template x-for="item in items.data" :key="item.id">

                    <tr class="border-t border-gray-100 dark:border-gray-800">

                        <td class="py-3 whitespace-nowrap">

                            <div class="flex items-center gap-3">

                                <div
                                    class="h-[40px] w-[40px] border flex items-center justify-center overflow-hidden rounded-md dark:text-white text-gray-800"
                                    x-html="item.svg"
                                ></div>

                                <div>
                                    <p
                                        class="font-medium text-gray-800 text-theme-sm dark:text-white/90"
                                        x-text="item.name"
                                    ></p>
                                </div>

                            </div>

                        </td>

                        <td>
                            <p
                                class="font-medium text-gray-800 text-theme-sm dark:text-white/90"
                                x-text="'/' + item.slug"
                            ></p>
                        </td>
                        <td>
                            <span x-show="item.enabled" class="rounded-full px-2 py-0.5 text-theme-xs font-medium bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                Activo
                            </span>
                            <span  x-show="!item.enabled" class="rounded-full px-2 py-0.5 text-theme-xs font-medium bg-error-50 text-error-600 dark:bg-success-500/15 dark:text-error-500">
                                Desactivado
                            </span>
                           
                        </td>
                        <td>
                            <button @click="edit(item.id)" class="font-medium text-gray-800 text-theme-sm dark:text-white/90  cursor-pointer text-brand-500">Editar</button>
                            |
                            <button @click="deleteModule(item.id)" class="font-medium text-error-800 text-theme-sm dark:text-error/90  cursor-pointer text-brand-500">Eliminar</button>
                                
                        </td>

                    </tr>

                </template>

            </tbody>

        </table>

        <div class="flex gap-2 mt-4 justify-end items-center">

            <div class="text-sm text-gray-500 mr-10">
                Página <span x-text="items.current_page"></span>
                de
                <span x-text="items.last_page"></span>
            </div>

            <button
                x-show="items.prev_page_url"
                @click="loadItems(items.prev_page_url)"
                class="px-4 py-2 bg-gray-200 rounded"
            >
                Anterior
            </button>

            <template x-for="page in pages" :key="page">

                <button
                    @click="loadItems(`/modules/list?page=${page}`)"
                    class="px-4 py-2 rounded-lg border"
                    :class="items.current_page == page ? 'bg-black text-white' : 'bg-white'"
                >
                    <span x-text="page"></span>
                </button>

            </template>

            <button
                x-show="items.next_page_url"
                @click="loadItems(items.next_page_url)"
                class="px-4 py-2 bg-black text-white rounded"
            >
                Siguiente
            </button>

        </div>

    </div>

</div>
<!-- END  PACKED !-->
</div>
@endsection

@push('scripts')

<script>

 
function iniApp() {
    return {

        open: false,

        form: {
            id: '',
            module: '',
            moduleslug: '',
            icono: '',
            active: false
        },

        iconsvg: '',
        existslug: null,
        exists: null,
        loading: false,
        switcherToggle: false,
        eventActive: false,
        errorForm: false,
        showModal: false,
        search: '',
        icons: @js($icons),

        get filteredIcons() {
            if (!this.search) return this.icons

            return this.icons.filter(icon =>
                icon.slug.toLowerCase().includes(this.search.toLowerCase())
            )
        },

        openModal() {
            this.open = true
        },

        closeModal() {
            this.open = false
        },

        crearSlug() {
            this.form.moduleslug = slugify(this.form.module)
            this.checkSlug()
        },
        resetForm() {
           this.form.id = ''
           this.form.module = '' 
           this.form.moduleslug = ''
           this.form.icono = ''
           this.form.active = ''
           this.iconsvg = ''
        },

        selectIcon(icon) {
            this.closeModal()
            this.form.icono = icon.slug
            this.iconsvg = icon.svg
        },

        async checkSlug() {
            try {

                this.loading = true

                const response = await fetch('{{ route('api.ckeck.exists') }}', {
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

                const data = await response.json()

                this.existslug = data.exists
                this.errorForm = this.existslug

            } catch (e) {

                console.error(e)

            } finally {

                this.loading = false

            }
        },

        async save() {

            try {

                this.loading = true

                const response = await fetch('{{ route('modules.save') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCSRF()
                    },
                    body: JSON.stringify(this.form)
                })

                const data = await response.json()

                this.resetForm()
                this.loadItems()
                 

            } catch (e) {

                console.error(e)

            } finally {

                this.loading = false

            }
        },

        items: { data: [] },
        pages: [],
        searchInList : '',
        async loadItems(page = 1) {
        try {
        const response = await fetch(
            `{{ route('modules.list') }}?page=${page}&search=${this.searchInList}`
        )
        this.items = await response.json()
        this.generatePages()
        } catch (e) {
            console.error(e)
        }    
       },

        generatePages() {
            this.pages = []

            if (!this.items.last_page) return

            for (let i = 1; i <= this.items.last_page; i++) {
                this.pages.push(i)
            }
        },

        async edit(id) {
             
            const response = await fetch(`{{ route('modules.edit') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCSRF()
                    },
                    body: JSON.stringify({
                        id: id
                    })
                })

           const data = await response.json()
           this.form.id = data.id 
           this.form.module = data.name 
           this.form.moduleslug = data.slug 
           this.form.icono = data.icon 
           this.form.active = data.enabled
           this.iconsvg = data.svg
        } 
        ,

        async deleteModule(id) {
             
            const response = await fetch(`{{ route('modules.delete') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCSRF()
                    },
                    body: JSON.stringify({
                        id: id
                    })
                })

           this.loadItems()
            
        } 
    }
}

</script>

@endpush