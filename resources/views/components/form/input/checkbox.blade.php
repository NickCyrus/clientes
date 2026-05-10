
@props([
    'model'=>'',
    'id'=>'',
])
<div class="relative">
        <label>
            <input {{$attributes}} type="checkbox" id="{{$id}}" class="sr-only" x-model="{{$model}}" type="checkbox">
                    <div class="block h-6 w-11 rounded-full duration-300"
                        :class="{{$model}}
                            ? 'bg-brand-500'
                            : 'bg-gray-200 dark:bg-white/10'"></div>

                    <div class="
                            absolute top-0.5 left-0.5
                            h-5 w-5 rounded-full bg-white
                            duration-300 ease-linear"
                        :class="{{$model}}
                            ? 'translate-x-5'
                            : 'translate-x-0'"></div>
        </label>
</div>