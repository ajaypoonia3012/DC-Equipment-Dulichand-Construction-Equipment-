@props([
    'variant' => 'light', // 'light' (for white backgrounds) or 'dark' (for dark headers/footers)
    'height' => 'h-14 sm:h-16',
    'showTagline' => true,
    'class' => '',
])

@php
    $isDark = $variant === 'dark';
    $textColor = $isDark ? '#FFFFFF' : '#0F172A';
    $subColor = $isDark ? '#38BDF8' : '#1E3A8A';
    $tagColor = $isDark ? '#F59E0B' : '#D97706';
    $metaColor = $isDark ? '#94A3B8' : '#475569';
    $dColor = $isDark ? 'url(#dcWhiteGradComp)' : 'url(#dcBlueGradComp)';
@endphp

<div {{ $attributes->merge(['class' => "inline-flex items-center {$class}"]) }}>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 86" fill="none" class="w-auto {{ $height }}">
        <defs>
            <linearGradient id="dcBlueGradComp" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#0F172A" />
                <stop offset="100%" stop-color="#1E3A8A" />
            </linearGradient>
            <linearGradient id="dcWhiteGradComp" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FFFFFF" />
                <stop offset="100%" stop-color="#E2E8F0" />
            </linearGradient>
            <linearGradient id="dcGoldGradComp" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#F59E0B" />
                <stop offset="100%" stop-color="#D97706" />
            </linearGradient>
            <filter id="dcLogoShadow" x="-10%" y="-10%" width="120%" height="120%">
                <feDropShadow dx="0" dy="1.5" stdDeviation="2" flood-color="{{ $isDark ? '#000000' : '#0F172A' }}" flood-opacity="{{ $isDark ? '0.4' : '0.12' }}"/>
            </filter>
        </defs>

        <!-- Industrial Geometric Icon -->
        <g transform="translate(6, 4)" filter="url(#dcLogoShadow)">
            <!-- Letter 'D' Block -->
            <path d="M 0 12 L 0 72 L 28 72 C 48 72 62 58 62 42 C 62 26 48 12 28 12 Z M 16 26 L 27 26 C 38 26 46 33 46 42 C 46 51 38 58 27 58 L 16 58 Z" fill="{{ $dColor }}" />

            <!-- Letter 'C' & Chisel Boom -->
            <path d="M 78 22 C 73 15 65 12 55 12 L 55 26 C 60 26 64 28 66 32 L 78 22 Z" fill="url(#dcGoldGradComp)" />
            <path d="M 55 58 L 55 72 C 65 72 74 68 79 61 L 67 52 C 65 55 60 58 55 58 Z" fill="url(#dcGoldGradComp)" />
            <polygon points="50,34 68,42 50,50 42,42" fill="url(#dcGoldGradComp)" />
            <circle cx="28" cy="42" r="3.5" fill="#F59E0B" />
        </g>

        <!-- Typography -->
        <g transform="translate(98, 4)">
            <text x="0" y="28" font-family="'Inter', 'Montserrat', 'Segoe UI', system-ui, sans-serif" font-weight="900" font-size="32" letter-spacing="1" fill="{{ $textColor }}">
                DC <tspan fill="{{ $subColor }}">EQUIPMENT</tspan>
            </text>

            @if($showTagline)
                <text x="1" y="49" font-family="'Inter', 'Segoe UI', system-ui, sans-serif" font-weight="700" font-size="16" letter-spacing="1" fill="{{ $tagColor }}">
                    DULICHAND CONSTRUCTION EQUIPMENT
                </text>

                <text x="1" y="67" font-family="'Inter', 'Segoe UI', system-ui, sans-serif" font-weight="600" font-size="12" letter-spacing="0.5" fill="{{ $metaColor }}">
                    JAIPUR, RAJASTHAN • DCP AUTHORIZED DEALER
                </text>
            @endif
        </g>
    </svg>
</div>
