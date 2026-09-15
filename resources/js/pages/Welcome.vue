<template>
    <div>
        <Navbar :aboutItems="aboutItems" :servicesItems="servicesItems" @lang-changed="lang = $event" />

        <HeroSlideshow v-if="slides && slides.length > 0" :slides="slides" />

        <div v-else class="p-8 text-center bg-gray-100">
            <h1 class="text-2xl font-bold">There are no active slides.</h1>
        </div>

        <div data-navbar-scroll-target
            class="relative z-20 bg-[#3674B5] pt-32 pb-32 sm:pt-40 sm:pb-40 px-6 border-t border-[#3674B5] flex flex-col items-center justify-center text-center overflow-hidden">

            <div ref="introRef" :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="max-w-3xl mx-auto flex flex-col items-center gap-5 sm:gap-6 transition-all duration-1000 ease-out">

                <h3
                    class="imperial-script-regular text-4xl sm:text-5xl md:text-6xl text-white font-light leading-tight drop-shadow-sm">
                    {{ introSection?.subtitle || t.subtitle }}
                </h3>

                <h2
                    class="font-cinzel text-white text-2xl sm:text-3xl md:text-4xl font-bold uppercase tracking-[0.2em] mb-1">
                    {{ introSection?.title || t.title }}
                </h2>

                <div class="w-full flex items-center justify-center mb-6 md:mb-10 px-3 sm:px-6 md:px-8 text-white/90">

                    <!-- Ujung Kiri (Panah & Cincin Keriting) -->
                    <svg class="w-6 sm:w-8 md:w-10 h-auto flex-shrink-0 fill-current stroke-current"
                        viewBox="0 0 30 20">
                        <polygon points="2,10 12,6 9,10 12,14" stroke="none" />
                        <path d="M 30,10 L 9,10" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                        <path d="M 20,10 C 20,2 10,2 13,7" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="13" cy="7" r="1.25" stroke="none" />
                        <path d="M 20,10 C 20,18 10,18 13,13" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="13" cy="13" r="1.25" stroke="none" />
                    </svg>

                    <!-- Garis Kiri Fleksibel -->
                    <div class="flex-grow h-[1px] bg-current" style="transform: scaleY(0.75);"></div>

                    <!-- Motif Mewah Tengah (Mahkota & Swirls, garis lurus tidak menembus tengah) -->
                    <svg class="w-48 sm:w-64 md:w-80 lg:w-[400px] h-auto flex-shrink-0 fill-current stroke-current drop-shadow-sm px-1 sm:px-2"
                        viewBox="0 0 240 40">
                        <g transform="translate(120, 20)">

                            <!-- Garis Masuk Kiri & Swirl Kiri -->
                            <path d="M -120,0 L -40,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                            <path
                                d="M -40, 0 C -25, 0 -25, -14 -12, -14 C -2, -14 2, -2 -8, -2 C -15, -2 -18, -8 -12, -10"
                                stroke-width="0.75" stroke-linecap="round" fill="none"
                                vector-effect="non-scaling-stroke" />

                            <!-- Garis Masuk Kanan & Swirl Kanan -->
                            <path d="M 120,0 L 40,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                            <path d="M 40, 0 C 25, 0 25, -14 12, -14 C 2, -14 -2, -2 8, -2 C 15, -2 18, -8 12, -10"
                                stroke-width="0.75" stroke-linecap="round" fill="none"
                                vector-effect="non-scaling-stroke" />

                            <!-- Mahkota (Crown Petals) -->
                            <path d="M -1.5,-4 C -2,-12 -2,-16 0,-18 C 2,-16 2,-12 1.5,-4 Z" stroke="none" />
                            <path d="M -2,-2 C -8,-10 -14,-12 -16,-8 C -10,-4 -4,-1 0,0 Z" stroke="none" />
                            <path d="M 2,-2 C 8,-10 14,-12 16,-8 C 10,-4 4,-1 0,0 Z" stroke="none" />

                            <!-- Titik Bawah (Bottom Dots) -->
                            <circle cx="0" cy="5" r="2.25" stroke="none" />
                            <circle cx="-9" cy="5" r="1.25" stroke="none" />
                            <circle cx="9" cy="5" r="1.25" stroke="none" />

                        </g>
                    </svg>

                    <!-- Garis Kanan Fleksibel -->
                    <div class="flex-grow h-[1px] bg-current" style="transform: scaleY(0.75);"></div>

                    <!-- Ujung Kanan (Panah & Cincin Keriting) -->
                    <svg class="w-6 sm:w-8 md:w-10 h-auto flex-shrink-0 fill-current stroke-current"
                        viewBox="0 0 30 20">
                        <polygon points="28,10 18,6 21,10 18,14" stroke="none" />
                        <path d="M 0,10 L 21,10" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                        <path d="M 10,10 C 10,2 20,2 17,7" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="17" cy="7" r="1.25" stroke="none" />
                        <path d="M 10,10 C 10,18 20,18 17,13" fill="none" stroke-width="0.75" stroke-linecap="round"
                            vector-effect="non-scaling-stroke" />
                        <circle cx="17" cy="13" r="1.25" stroke="none" />
                    </svg>

                </div>

                <div
                    class="font-bodoni text-sm sm:text-base md:text-lg leading-relaxed text-white/90 whitespace-pre-line mb-6 px-4">
                    {{ introSection?.content || t.content }}
                </div>

                <Link :href="introSection?.link_url || '/about'"
                    class="font-cinzel inline-block px-8 py-3 border border-white text-white text-xs sm:text-sm tracking-widest uppercase hover:bg-white hover:text-[#578FCA] active:scale-95 active:bg-white active:text-[#A1E3F9] transition-all duration-300">
                    {{ t.button }}
                </Link>

            </div>
        </div>

        <div class="relative z-20 bg-[#FFFFFF] p-8 min-h-screen text-[#3674B5] border-t border-[#3674B5]">
        </div>

        <div class="relative z-20 bg-[#578FCA] p-8 min-h-screen text-white border-t border-[#3674B5]">
        </div>

        <Footer />
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import Navbar from '@/components/Navbar.vue';
import HeroSlideshow from '@/components/HeroSlideshow.vue';
import Footer from '@/components/Footer.vue';
import { Link } from '@inertiajs/vue3';

interface SlideMedia {
    id: number
    file_path: string
    full_url: string
    caption_title?: string
    caption_description?: string
}

interface SectionItem {
    id: number
    title: string
    link_url: string
}

interface DynamicSection {
    id: number
    key: string
    title: string
    subtitle: string
    content: string
    link_url: string
    media?: SlideMedia[]
}

defineProps<{
    slides: SlideMedia[]
    aboutItems: SectionItem[]
    servicesItems: SectionItem[]
    introSection?: DynamicSection
}>()

const lang = ref<'id' | 'en'>('en');

const translations = {
    id: {
        subtitle: 'Captured with Love',
        title: 'The Art of Memories',
        content: 'Kami mengabadikan momen berharga Anda dengan penuh cinta, mengubah detik yang berlalu menjadi karya seni abadi. Biarkan kami membingkai memori Anda agar dikenang selamanya.',
        button: 'Kenali Kami Lebih Lanjut'
    },
    en: {
        subtitle: 'Captured with Love',
        title: 'The Art of Memories',
        content: 'We capture your precious moments with love and passion, turning fleeting seconds into timeless art. Let us frame your memories so they can be cherished forever.',
        button: 'Learn More About Us'
    }
};

const t = computed(() => translations[lang.value]);

const introRef = ref<HTMLElement | null>(null);
const isVisible = ref(false);

onMounted(() => {
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            isVisible.value = true;
            observer.disconnect();
        }
    }, { threshold: 0.2 });

    if (introRef.value) {
        observer.observe(introRef.value);
    }
});
</script>

<style scoped>
.font-cinzel {
    font-family: 'Cinzel', serif;
}

.font-bodoni {
    font-family: 'Bodoni Moda', serif;
}

.imperial-script-regular {
    font-family: 'Imperial Script', cursive;
    font-weight: 200;
    font-style: normal;
}
</style>