

<div {{ $attributes->merge([
    'class' => $clases]) }} role="alert">
    <span class="font-medium"> {{ $title }}</span> {{ $slot }}
</div>

