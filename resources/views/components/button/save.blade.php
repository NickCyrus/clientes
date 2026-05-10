@props([
    'model'=>'',
    'placeholder' => '',
    'height' => '100%',
    'debounce'=> '',
    'type'=>'text',
    'id'=>'text',
])

<x-button.button v-model="{{$model}}" x-bind:disabled="errorForm" class="my-3"> 
    <x-icon slug="loading" width="18px" x-show="eventActive"></x-icon> 
    <x-icon slug="save" width="18px" x-show="!eventActive"></x-icon> {{___('app.save', 'Guardar')}}
</x-button.button>