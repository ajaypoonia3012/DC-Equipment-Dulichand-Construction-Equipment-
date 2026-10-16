@php
    $customLogo = \App\Models\CompanySetting::get('site_logo_dark') ?: \App\Models\CompanySetting::get('site_logo_light');
@endphp

@if($customLogo)
    <div class="flex items-center gap-3">
        <img src="{{ asset('storage/' . $customLogo) }}" alt="DC Equipment" class="h-10 w-auto object-contain" />
        <span class="font-bold text-sm text-slate-200 hidden sm:inline">DC Equipment</span>
    </div>
@else
    <x-logo variant="dark" height="h-9 sm:h-11" />
@endif
