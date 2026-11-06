<template>
    <div class="w-full flex items-center justify-center mb-6 md:mb-10 px-3 sm:px-6 md:px-8 text-white/90">
        <!-- Ujung Kiri (Panah & Cincin Keriting) -->
        <svg class="w-6 sm:w-8 md:w-10 h-auto flex-shrink-0 fill-current stroke-current" viewBox="0 0 30 20">
            <polygon points="2,10 12,6 9,10 12,14" stroke="none" />
            <path d="M 30,10 L 9,10" stroke-width="0.75" vector-effect="non-scaling-stroke" />
            <path d="M 20,10 C 20,2 10,2 13,7" fill="none" stroke-width="0.75" stroke-linecap="round" vector-effect="non-scaling-stroke" />
            <circle cx="13" cy="7" r="1.25" stroke="none" />
            <path d="M 20,10 C 20,18 10,18 13,13" fill="none" stroke-width="0.75" stroke-linecap="round" vector-effect="non-scaling-stroke" />
            <circle cx="13" cy="13" r="1.25" stroke="none" />
        </svg>

        <!-- Garis Kiri Fleksibel -->
        <div class="flex-grow h-[1px] bg-current" style="transform: scaleY(0.75);"></div>

        <!-- Motif Mewah Tengah -->
        <svg class="w-48 sm:w-64 md:w-80 lg:w-[400px] h-auto flex-shrink-0 fill-current stroke-current drop-shadow-sm px-1 sm:px-2" viewBox="0 0 240 40">
            <g transform="translate(120, 20)">
                <!-- Garis & Swirl Kiri -->
                <path d="M -120,0 L -40,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                <path d="M -40, 0 C -25, 0 -25, -14 -12, -14 C -2, -14 2, -2 -8, -2 C -15, -2 -18, -8 -12, -10" stroke-width="0.75" stroke-linecap="round" fill="none" vector-effect="non-scaling-stroke" />
                
                <!-- Garis & Swirl Kanan -->
                <path d="M 120,0 L 40,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                <path d="M 40, 0 C 25, 0 25, -14 12, -14 C 2, -14 -2, -2 8, -2 C 15, -2 18, -8 12, -10" stroke-width="0.75" stroke-linecap="round" fill="none" vector-effect="non-scaling-stroke" />
                
                <!-- Mahkota -->
                <path d="M -1.5,-4 C -2,-12 -2,-16 0,-18 C 2,-16 2,-12 1.5,-4 Z" stroke="none" />
                <path d="M -2,-2 C -8,-10 -14,-12 -16,-8 C -10,-4 -4,-1 0,0 Z" stroke="none" />
                <path d="M 2,-2 C 8,-10 14,-12 16,-8 C 10,-4 4,-1 0,0 Z" stroke="none" />
                
                <!-- Titik Bawah -->
                <circle cx="0" cy="5" r="2.25" stroke="none" />
                <circle cx="-9" cy="5" r="1.25" stroke="none" />
                <circle cx="9" cy="5" r="1.25" stroke="none" />
            </g>
        </svg>

        <!-- Garis Kanan Fleksibel -->
        <div class="flex-grow h-[1px] bg-current" style="transform: scaleY(0.75);"></div>

        <!-- Ujung Kanan (Panah & Cincin Keriting) -->
        <svg class="w-6 sm:w-8 md:w-10 h-auto flex-shrink-0 fill-current stroke-current" viewBox="0 0 30 20">
            <polygon points="28,10 18,6 21,10 18,14" stroke="none" />
            <path d="M 0,10 L 21,10" stroke-width="0.75" vector-effect="non-scaling-stroke" />
            <path d="M 10,10 C 10,2 20,2 17,7" fill="none" stroke-width="0.75" stroke-linecap="round" vector-effect="non-scaling-stroke" />
            <circle cx="17" cy="7" r="1.25" stroke="none" />
            <path d="M 10,10 C 10,18 20,18 17,13" fill="none" stroke-width="0.75" stroke-linecap="round" vector-effect="non-scaling-stroke" />
            <circle cx="17" cy="13" r="1.25" stroke="none" />
        </svg>
    </div>
</template>