<template>
    <!-- Background section sepenuhnya transparan dengan tinggi yang lega -->
    <section
        class="relative z-10 w-full min-h-[80vh] py-32 md:py-48 flex items-center justify-center px-6 sm:px-12 md:px-20 bg-transparent">

        <!-- Konten Dinamis Tanpa Card -->
        <div class="relative z-10 flex flex-col items-center text-center max-w-4xl mx-auto w-full">

            <h2
                class="font-cinzel text-xl sm:text-2xl md:text-3xl lg:text-5xl text-white font-bold tracking-wider uppercase leading-snug drop-shadow-lg">
                {{ locTitle }}
            </h2>

            <h3
                class="font-bodoni text-lg sm:text-xl md:text-2xl text-white/90 mt-4 font-light tracking-wide drop-shadow-md">
                {{ locSubtitle }}
            </h3>

            <!-- Border Luxury Putih -->
            <div class="w-full flex items-center justify-center my-8 md:my-10 text-white/90 drop-shadow-md">
                <div class="flex-grow h-[0.75px] bg-current max-w-[80px] sm:max-w-[150px]"></div>
                <svg class="w-[200px] sm:w-[300px] md:w-[400px] h-auto flex-shrink-0 text-current px-2"
                    viewBox="0 0 500 30" fill="none" stroke="currentColor">
                    <g transform="translate(250, 15)">
                        <path d="M -240,0 L -55,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                        <path d="M 55,0 L 240,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                        <circle cx="-45" cy="0" r="2.5" fill="none" stroke-width="0.75"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="-45" cy="0" r="1" fill="currentColor" stroke="none" />
                        <circle cx="45" cy="0" r="2.5" fill="none" stroke-width="0.75"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="45" cy="0" r="1" fill="currentColor" stroke="none" />
                        <path d="M -35,0 C -25,-9 -15,-9 -5,-2.5" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <path d="M -35,0 C -25,9 -15,9 -5,2.5" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <path d="M 35,0 C 25,-9 15,-9 5,-2.5" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <path d="M 35,0 C 25,9 15,9 5,2.5" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <path d="M 0,-12 C 1,-3 3,-1 12,0 C 3,1 1,3 0,12 C -1,3 -3,1 -12,0 C -3,-1 -1,-3 0,-12 Z"
                            fill="none" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                        <circle cx="0" cy="0" r="1.5" fill="currentColor" stroke="none" />
                        <circle cx="-20" cy="0" r="1.25" fill="currentColor" stroke="none" />
                        <circle cx="20" cy="0" r="1.25" fill="currentColor" stroke="none" />
                    </g>
                </svg>
                <div class="flex-grow h-[0.75px] bg-current max-w-[80px] sm:max-w-[150px]"></div>
            </div>

            <!-- Tombol Transparan dengan Outline Putih -->
            <a :href="linkUrl" target="_blank"
                class="inline-block px-8 py-3.5 border-2 border-white text-white bg-transparent hover:bg-white hover:text-[#3674B5] transition-all duration-300 font-cinzel font-bold tracking-widest uppercase text-sm sm:text-base rounded-sm active:scale-95 drop-shadow-lg hover:drop-shadow-none shadow-black/20">
                {{ btnText }}
            </a>

        </div>

    </section>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
    section?: any,
    lang: 'id' | 'en'
}>();

// Helper untuk lokalisasi dari Database
const getLoc = (data: any, langCode: string, fallback: string = '') => {
    if (!data) return fallback;
    let parsed = data;
    if (typeof data === 'string' && data.startsWith('{')) {
        try { parsed = JSON.parse(data); } catch (e) { }
    }
    if (typeof parsed === 'object' && parsed !== null) {
        return parsed[langCode] || parsed['en'] || fallback;
    }
    return parsed || fallback;
};

// Data Fallback jika data database belum ada
const fallbackTitleId = 'Yuk, jadwalkan sesi kamu sekarang!';
const fallbackTitleEn = "Let's schedule your session now!";
const fallbackSubtitleId = 'Apakah foto-foto tersebut sesuai dengan gaya kamu?';
const fallbackSubtitleEn = 'Are these photos your style?';

const locTitle = computed(() => getLoc(props.section?.title, props.lang, props.lang === 'id' ? fallbackTitleId : fallbackTitleEn));
const locSubtitle = computed(() => getLoc(props.section?.subtitle, props.lang, props.lang === 'id' ? fallbackSubtitleId : fallbackSubtitleEn));

const btnText = computed(() => props.lang === 'id' ? 'Booking Sekarang!' : 'Book Now!');
// Default ke link WhatsApp atau Link dari Database
const linkUrl = computed(() => props.section?.link_url || 'http://wa.me/6287762982309');
</script>