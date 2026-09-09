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

                <svg xmlns="http://www.w3.org/2000/svg" class="w-32 sm:w-40 md:w-56 h-auto text-white/70 mb-3 mt-1"
                    viewBox="0 0 200 30" fill="none" stroke="currentColor">
                    <path d="M100,2 C101,9 104,13 111,15 C104,17 101,21 100,28 C99,21 96,17 89,15 C96,13 99,9 100,2 Z"
                        fill="currentColor" stroke="none" />

                    <path d="M20,15 C40,15 60,19 85,15" stroke-width="0.75" stroke-linecap="round" />
                    <path d="M180,15 C160,15 140,19 115,15" stroke-width="0.75" stroke-linecap="round" />

                    <path d="M35,16 C35,12 40,9 45,12 C42,14 38,15 35,16 Z" fill="currentColor" stroke="none" />
                    <path d="M55,18 C55,22 60,25 65,22 C62,20 58,19 55,18 Z" fill="currentColor" stroke="none" />
                    <path d="M70,16 C70,12 75,9 80,12 C77,14 73,15 70,16 Z" fill="currentColor" stroke="none" />

                    <path d="M165,16 C165,12 160,9 155,12 C158,14 162,15 165,16 Z" fill="currentColor" stroke="none" />
                    <path d="M145,18 C145,22 140,25 135,22 C138,20 142,19 145,18 Z" fill="currentColor" stroke="none" />
                    <path d="M130,16 C130,12 125,9 120,12 C123,14 127,15 130,16 Z" fill="currentColor" stroke="none" />

                    <circle cx="27" cy="12" r="0.75" fill="currentColor" stroke="none" />
                    <circle cx="48" cy="18" r="0.75" fill="currentColor" stroke="none" />
                    <circle cx="82" cy="11" r="0.75" fill="currentColor" stroke="none" />
                    <circle cx="173" cy="12" r="0.75" fill="currentColor" stroke="none" />
                    <circle cx="152" cy="18" r="0.75" fill="currentColor" stroke="none" />
                    <circle cx="118" cy="11" r="0.75" fill="currentColor" stroke="none" />
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
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import Navbar from '@/components/Navbar.vue';
import HeroSlideshow from '@/components/HeroSlideshow.vue';
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