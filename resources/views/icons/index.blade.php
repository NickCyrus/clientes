        @extends('layouts.app')
        @section('content')
            <x-common.page-breadcrumb pageTitle="Iconos" />
            <div class="min-h-screen rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
                    <h3 class="mb-4 font-semibold text-gray-800 text-theme-xl dark:text-white/90 sm:text-2xl">
                        Iconos
                    </h3>
 
    <!-- Card Body -->
    <div class="border-t border-gray-100 dark:border-gray-800 ">
        <div class="space-y-6" x-data="svgEditor(@js($icons))">
            <form @submit.prevent="save">
                <!-- Elements -->
                <div>
                    <label class="my-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        SLUG
                    </label>
                    <div class="relative">
                        <span class="absolute top-1/2 left-0 -translate-y-1/2 border-r border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
                            <div  x-html="svgcode || ''"></div>
                        </span>
                        <input x-model="namesvg"  
                            @input.debounce.500ms="verificarIcono()"
                            :class="{
                                'dark:bg-dark-900 border-error-300 shadow-theme-xs focus:border-error-300 focus:ring-error-500/10 dark:border-error-700 dark:focus:border-error-800': exists === true,
                                'dark:bg-dark-900 border-success-300 shadow-theme-xs focus:border-success-300 focus:ring-success-500/10 dark:border-success-700 dark:focus:border-success-800': exists === false
                            }"
                        type="text" placeholder="slug" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pl-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                        <span x-show="exists==true" class="absolute top-1/2 right-3.5 -translate-y-1/2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M2.58325 7.99967C2.58325 5.00813 5.00838 2.58301 7.99992 2.58301C10.9915 2.58301 13.4166 5.00813 13.4166 7.99967C13.4166 10.9912 10.9915 13.4163 7.99992 13.4163C5.00838 13.4163 2.58325 10.9912 2.58325 7.99967ZM7.99992 1.08301C4.17995 1.08301 1.08325 4.17971 1.08325 7.99967C1.08325 11.8196 4.17995 14.9163 7.99992 14.9163C11.8199 14.9163 14.9166 11.8196 14.9166 7.99967C14.9166 4.17971 11.8199 1.08301 7.99992 1.08301ZM7.09932 5.01639C7.09932 5.51345 7.50227 5.91639 7.99932 5.91639H7.99999C8.49705 5.91639 8.89999 5.51345 8.89999 5.01639C8.89999 4.51933 8.49705 4.11639 7.99999 4.11639H7.99932C7.50227 4.11639 7.09932 4.51933 7.09932 5.01639ZM7.99998 11.8306C7.58576 11.8306 7.24998 11.4948 7.24998 11.0806V7.29627C7.24998 6.88206 7.58576 6.54627 7.99998 6.54627C8.41419 6.54627 8.74998 6.88206 8.74998 7.29627V11.0806C8.74998 11.4948 8.41419 11.8306 7.99998 11.8306Z"
                                    fill="#F04438" />
                            </svg>
                        </span>
                        <span x-show="exists==false" class="absolute top-1/2 right-3.5 -translate-y-1/2">
                            <span class="absolute top-1/2 right-3.5 -translate-y-1/2">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.61792 8.00034C2.61792 5.02784 5.0276 2.61816 8.00009 2.61816C10.9726 2.61816 13.3823 5.02784 13.3823 8.00034C13.3823 10.9728 10.9726 13.3825 8.00009 13.3825C5.0276 13.3825 2.61792 10.9728 2.61792 8.00034ZM8.00009 1.11816C4.19917 1.11816 1.11792 4.19942 1.11792 8.00034C1.11792 11.8013 4.19917 14.8825 8.00009 14.8825C11.801 14.8825 14.8823 11.8013 14.8823 8.00034C14.8823 4.19942 11.801 1.11816 8.00009 1.11816ZM10.5192 7.266C10.8121 6.97311 10.8121 6.49823 10.5192 6.20534C10.2264 5.91245 9.75148 5.91245 9.45858 6.20534L7.45958 8.20434L6.54162 7.28638C6.24873 6.99349 5.77385 6.99349 5.48096 7.28638C5.18807 7.57927 5.18807 8.05415 5.48096 8.34704L6.92925 9.79533C7.0699 9.93599 7.26067 10.015 7.45958 10.015C7.6585 10.015 7.84926 9.93599 7.98991 9.79533L10.5192 7.266Z"
                                fill="#12B76A" />
                        </svg>
                    </span>
                        </span>
                    </div>
                    <p x-show="exists" class="text-theme-xs text-error-500 mt-1.5">
                        Lo sentimos este slug <b x-text="namesvg"></b> ya existe, por favor prueb otro ej : <b x-text="namesvg + '-' + getRandomInt(4)"></b>
                    </p>
                </div>
                <div >
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400 my-2">
                        SVG CODE
                    </label>
                    <textarea @input="cambiarColor()" x-model="svgcode" placeholder="" type="text" rows="6" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"></textarea>
                </div>
                <div >
                    
                    <x-button.button x-bind:disabled="exists" x-bind:disabled="!svgcode" class="my-3"> 
                        <x-icon slug="loading" width="18px" x-show="eventActive"></x-icon> 
                        <x-icon slug="save" width="18px" x-show="!eventActive"></x-icon> Guardar 
                    </x-button.button>
                </div>
                <!-- Elements -->
            </form>

            <div>
                <div class="mb-4">

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
                <div class="grid grid-cols-2 md:grid-cols-5 xl:grid-cols-16 gap-4 mt-8">

                        <template x-for="icon in filteredIcons" :key="icon.id">

                            <div
                                class="group border rounded-2xl p-2 hover:border-brand-500 transition cursor-pointer"
                                @click="navigator.clipboard.writeText(icon.slug)"
                            >

                                <div
                                    x-html="icon.svg"
                                    class="flex justify-center text-gray-700 dark:text-white mb-3"
                                ></div>

                                <p
                                    x-text="icon.slug"
                                    class="text-xs text-center truncate  text-gray-700 dark:text-white mb-3"
                                ></p>

                            </div>

                        </template>

                    </div>
            </div>
    </div>
</div>
                 
            </div>
    <script>
        function svgEditor(icons=[]) {

            return {
                icons: icons,
                svgcode: '',
                namesvg : '',
                wxh : '24px',
                exists: null,
                loading: false,
                eventActive : false,
                search : '',
               cambiarColor() {

    let svg = this.svgcode;

    // Limpiar basura
    svg = svg
        .replace(/<!--[\s\S]*?-->/g, '')
        .replace(/<\?xml[^>]*\?>/gi, '')
        .replace(/<!DOCTYPE[^>]*>/gi, '');

    // WIDTH
    if (/width="/i.test(svg)) {

        svg = svg.replace(
            /width="[^"]*"/gi,
            `width="${this.wxh}"`
        );

    } else {

        svg = svg.replace(
            /<svg/i,
            `<svg width="${this.wxh}"`
        );
    }

    // HEIGHT
    if (/height="/i.test(svg)) {

        svg = svg.replace(
            /height="[^"]*"/gi,
            `height="${this.wxh}"`
        );

    } else {

        svg = svg.replace(
            /<svg/i,
            `<svg height="${this.wxh}"`
        );
    }

    // FILL
    if (/fill="/i.test(svg)) {

        svg = svg.replace(
            /fill="[^"]*"/gi,
            'fill="currentColor"'
        );

    } else {

        svg = svg.replace(
            /<svg/i,
            `<svg fill="currentColor"`
        );
    }

    this.svgcode = svg;
},
                
                async verificarIcono() {
                        if (!this.namesvg) {
                            this.exists = null;
                            return;
                        }

                this.loading = true;
                try {
                    const response = await fetch('{{route('icon.name.ckeck')}}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': getCSRF()
                        },
                        body: JSON.stringify({
                            slug: this.namesvg
                        })
                     });
                    const data = await response.json();
                    this.exists = data.exists;
                } catch (e) {
                    console.error(e);
                } finally {
                    this.loading = false;
                }
            },
            resetForm() {
                this.namesvg = '';
                this.svgcode = '';
                this.exists = null;
            },
            async save(){
                    
                    this.eventActive = true;

                    try {
                        const response = await fetch('{{route('icons.save')}}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': getCSRF()
                            },
                            body: JSON.stringify({
                                 'svgcode': this.svgcode,
                                 'namesvg' : this.namesvg,   
                            })
                        });

                        const data = await response.json();
                        this.icons.push(data.icon);
                        if (!response.ok) {
                            return;
                        }
                        
                        this.resetForm()
                        await this.cargarIconos();
                        
                    } catch (error) {
                        console.error(error);
                        this.message = 'Error del servidor';
                    } finally {
                        this.eventActive = false;
                    }
            },
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
            async cargarIconos() {
                    try {
                        const response = await fetch('{{ route("icons.list") }}');
                        this.icons = await response.json();
                    } catch (error) {
                        console.error(error);
                    }
}
          }
        }
    </script>
@endsection