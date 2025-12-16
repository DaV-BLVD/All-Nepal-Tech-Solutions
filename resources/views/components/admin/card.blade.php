@props(['title', 'count', 'icon', 'color' => 'primary'])

<div class="bg-white rounded-xl shadow-md p-5 hover:shadow-lg transition">
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase">{{ $title }}</h3>
            <p class="text-3xl font-extrabold text-gray-900 mt-1">{{ $count }}</p>
        </div>
        <div class="text-3xl text-{{ $color }}">
            <i class="{{ $icon }}"></i>
        </div>
    </div>
</div>