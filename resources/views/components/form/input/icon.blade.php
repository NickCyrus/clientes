@php
    use App\Models\Icons;
@endphp
@props([
    'model'=>'',
    'modelicon'=>'',
    'placeholder' => '',
    'height' => '100%',
    'debounce'=> '',
    'type'=>'text',
    'id'=>'text',
    'icon'=>'',
    'width'=>'24px',
    'position'=>'start',
    
])

<div class="relative" {{ $attributes }}>
    @if ($position == 'start')
        <span class="absolute top-1/2 left-0 -translate-y-1/2 border-r border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
        <div x-html="{{$modelicon}}">
            @if (isset($icon))
                @php
                    $svg = Icons::GetBySlug($icon)->svg ?? '';
                    $svg = reemplazarAttr($svg , $height , 'height');
                    if ($width) $svg = reemplazarAttr($svg , $width , 'width');
                @endphp
                {!!$svg!!} 
            @else
                {{$slot}}
            @endif
            </div>
        </span>
    @endif
    <input type="text" x-model="{{$model}}" placeholder="{{$placeholder}}" {{ $attributes->merge(['class'=>'dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pl-[62px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30']) }} />
     @if ($position == 'end')
        <span class="absolute top-1/2 left-0 -translate-y-1/2 border-r border-gray-200 px-3.5 py-3 text-gray-500 dark:border-gray-800 dark:text-gray-400">
        <div x-html="{{$modelicon}}">
            @if (isset($icon))
                @php
                    $svg = Icons::GetBySlug($slug)->svg ?? '';
                    $svg = reemplazarAttr($svg , $height , 'height');
                    if ($width) $svg = reemplazarAttr($svg , $width , 'width');
                @endphp
                {!!$svg!!} 
            @else
                {{$slot}}
            @endif
            </div>
        </span>
    @endif
</div>
    