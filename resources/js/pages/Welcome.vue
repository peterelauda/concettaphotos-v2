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

                <svg xmlns="http://www.w3.org/2000/svg" class="w-64 sm:w-80 md:w-[450px] h-auto text-white/90 mb-3 mt-1"
                    viewBox="0 0 300 40" fill="none" stroke="currentColor">

                    <path d="M 25,20 L 275,20" stroke-width="1.25" stroke-linecap="round" />

                    <path d="M 25,20 L 12,20" stroke-width="1.25" stroke-linecap="round" />
                    <path d="M 18,20 C 18,13 8,10 5,14 C 2,17 8,20 12,20" stroke-width="1.25" stroke-linecap="round" />
                    <path d="M 18,20 C 18,27 8,30 5,26 C 2,23 8,20 12,20" stroke-width="1.25" stroke-linecap="round" />
                    <circle cx="9" cy="20" r="1.25" fill="currentColor" stroke="none" />
                    <path d="M 25,20 L 29,17 L 29,23 Z" fill="currentColor" stroke="none" />

                    <path d="M 275,20 L 288,20" stroke-width="1.25" stroke-linecap="round" />
                    <path d="M 282,20 C 282,13 292,10 295,14 C 298,17 292,20 288,20" stroke-width="1.25"
                        stroke-linecap="round" />
                    <path d="M 282,20 C 282,27 292,30 295,26 C 298,23 292,20 288,20" stroke-width="1.25"
                        stroke-linecap="round" />
                    <circle cx="291" cy="20" r="1.25" fill="currentColor" stroke="none" />
                    <path d="M 275,20 L 271,17 L 271,23 Z" fill="currentColor" stroke="none" />

                    <g transform="translate(150, 20)">
                        <path d="M 0,-6 C -2,-14 -8,-16 -10,-12 C -12,-8 -4,-2 0,0 Z" fill="currentColor"
                            stroke="none" />
                        <path d="M 0,-6 C 0,-18 0,-20 0,-17 C 0,-14 0,-4 0,0 Z" fill="currentColor" stroke="none" />
                        <path d="M 0,-6 C 2,-14 8,-16 10,-12 C 12,-8 4,-2 0,0 Z" fill="currentColor" stroke="none" />

                        <circle cx="0" cy="8" r="1.75" fill="currentColor" stroke="none" />
                        <circle cx="-7" cy="8" r="1.25" fill="currentColor" stroke="none" />
                        <circle cx="7" cy="8" r="1.25" fill="currentColor" stroke="none" />

                        <path d="M -12,0 C -12,-10 -4,-12 -2,-5 C 0,2 -10,8 -20,2 C -28,-2 -35,1 -40,6"
                            stroke-width="1.25" stroke-linecap="round" />

                        <path d="M 12,0 C 12,-10 4,-12 2,-5 C 0,2 10,8 20,2 C 28,-2 35,1 40,6" stroke-width="1.25"
                            stroke-linecap="round" />
                    </g>
                </svg>

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