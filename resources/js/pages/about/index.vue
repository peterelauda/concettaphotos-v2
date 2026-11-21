<template>
    <div class="relative min-h-screen flex flex-col bg-transparent">

        <!-- PARALLAX BACKGROUND DINAMIS -->
        <div class="fixed inset-0 z-0 w-full h-full bg-cover bg-center bg-no-repeat pointer-events-none"
            :style="{ backgroundImage: `url('${bgImage}')` }">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/45 to-black/60 backdrop-blur-[1px]">
            </div>
        </div>

        <!-- NAVBAR -->
        <Navbar :aboutItems="aboutItems" :servicesItems="servicesItems" @lang-changed="handleLangChanged" />

        <!-- HERO BANNER TENTANG KAMI (50vh Responsive) -->
        <div
            class="relative z-10 min-h-[48vh] sm:min-h-[50vh] pt-24 pb-10 sm:pt-28 sm:pb-12 flex flex-col items-center justify-center bg-transparent text-white text-center">
            <div class="max-w-4xl mx-auto px-5 sm:px-8">
                <p
                    class="imperial-script-regular text-2xl sm:text-3xl md:text-4xl text-white mb-1 sm:mb-2 drop-shadow-md">
                    {{ lang === 'id' ? 'Mengenal Lebih Dekat' : 'Discover Our Journey' }}
                </p>
                <h1
                    class="font-cinzel text-2xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-[0.15em] sm:tracking-widest uppercase drop-shadow-lg">
                    {{ lang === 'id' ? 'Tentang Kami' : 'About Us' }}
                </h1>

                <div class="w-full flex items-center justify-center my-3 sm:my-4 text-white/90 drop-shadow-md">
                    <div class="flex-grow h-[0.75px] bg-current max-w-[45px] sm:max-w-[90px] md:max-w-[110px]"></div>
                    <ServiceDivider class="text-white px-2 sm:px-3" />
                    <div class="flex-grow h-[0.75px] bg-current max-w-[45px] sm:max-w-[90px] md:max-w-[110px]"></div>
                </div>
            </div>
        </div>

        <!-- DYNAMIC ABOUT SECTIONS -->
        <main data-navbar-scroll-target class="relative z-20 flex-grow bg-[#3674B5]">
            <section v-for="(section, index) in localizedSections" :key="section.id" :id="section.key" :class="[
                'py-14 sm:py-20 md:py-28 lg:py-32 px-5 sm:px-10 md:px-16 lg:px-20 transition-colors duration-500 border-b',
                index % 2 === 0
                    ? 'bg-[#3674B5] text-white border-white/15'
                    : 'bg-white text-[#3674B5] border-[#3674B5]/15'
            ]">
                <div class="relative max-w-7xl mx-auto flex flex-col gap-8 sm:gap-12 md:gap-16">

                    <!-- HEADER SECTION (Seragam untuk semua section, section pertama menampilkan Why Choose Us) -->
                    <div class="flex flex-col items-center text-center max-w-3xl mx-auto px-2">
                        <p v-if="section.locSubtitle" :class="[
                            'imperial-script-regular text-2xl sm:text-3xl md:text-4xl lg:text-5xl mb-1 sm:mb-2',
                            index % 2 === 0 ? 'text-white' : 'text-[#578FCA]'
                        ]">
                            {{ section.locSubtitle }}
                        </p>

                        <h2
                            class="font-cinzel text-xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-[0.12em] sm:tracking-widest uppercase">
                            {{ index === 0 ? (lang === 'id' ? 'Mengapa Memilih Kami?' : 'Why Choose Us?') :
                                section.locTitle }}
                        </h2>

                        <!-- Ornament Divider -->
                        <div class="w-full flex items-center justify-center my-3 sm:my-4 opacity-90">
                            <div class="flex-grow h-[0.75px] bg-current max-w-[45px] sm:max-w-[90px] md:max-w-[110px]">
                            </div>
                            <ServiceDivider
                                :class="index % 2 === 0 ? 'text-white px-2 sm:px-3' : 'text-[#3674B5] px-2 sm:px-3'" />
                            <div class="flex-grow h-[0.75px] bg-current max-w-[45px] sm:max-w-[90px] md:max-w-[110px]">
                            </div>
                        </div>
                    </div>

                    <!-- LAYOUT 2 KOLOM RESPONSIVE -->
                    <div :class="[
                        'flex flex-col lg:flex-row items-center gap-8 sm:gap-10 md:gap-14 lg:gap-16 xl:gap-20',
                        index % 2 === 1 ? 'lg:flex-row-reverse' : ''
                    ]">
                        <!-- KOLOM GAMBAR -->
                        <div v-if="section.media && section.media.length > 0" class="w-full lg:w-1/2">
                            <div :class="[
                                'relative aspect-[4/3] sm:aspect-[16/10] lg:aspect-[4/3] w-full rounded-sm overflow-hidden border transform transition-transform duration-700 hover:scale-[1.01]',
                                index % 2 === 0 ? 'border-white/25 bg-white/10' : 'border-[#3674B5]/20 bg-gray-50'
                            ]">
                                <img :src="section.media[0].file_path"
                                    :alt="index === 0 ? (lang === 'id' ? 'Mengapa Memilih Kami?' : 'Why Choose Us?') : section.locTitle"
                                    class="w-full h-full object-cover" loading="lazy" />
                            </div>
                        </div>

                        <!-- KOLOM TEKS -->
                        <div :class="[
                            'flex flex-col justify-center space-y-5 w-full',
                            (section.media && section.media.length > 0) ? 'lg:w-1/2' : 'lg:w-3/4 mx-auto'
                        ]">
                            <!-- Paragraf Justify dengan baris terakhir mengikuti posisi section (kiri/kanan) -->
                            <div
                                class="space-y-4 font-bodoni text-sm sm:text-base md:text-lg lg:text-xl leading-relaxed sm:leading-loose font-light opacity-95">
                                <p v-for="(paragraph, pIndex) in section.locParagraphs" :key="pIndex" :class="[
                                    'text-justify',
                                    index % 2 === 1
                                        ? '[text-align-last:left] lg:[text-align-last:right]'
                                        : '[text-align-last:left]'
                                ]">
                                    {{ paragraph }}
                                </p>
                            </div>

                            <!-- Button Contact di Section Terakhir -->
                            <div v-if="index === localizedSections.length - 1" :class="[
                                'pt-4 sm:pt-6 flex',
                                index % 2 === 1 ? 'justify-start lg:justify-end' : 'justify-start'
                            ]">
                                <Link href="/contact" :class="[
                                    'w-full sm:w-auto text-center inline-block px-8 py-3.5 sm:py-3 text-xs sm:text-sm tracking-widest uppercase transition-all duration-300 border font-cinzel active:scale-95',
                                    index % 2 === 0
                                        ? 'border-white text-white hover:bg-white hover:text-[#578FCA] active:bg-white active:text-[#A1E3F9]'
                                        : 'border-[#3674B5] text-[#3674B5] hover:bg-[#3674B5] hover:text-white'
                                ]">
                                    {{ lang === 'id' ? 'Hubungi Kami' : 'Contact Us' }}
                                </Link>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </main>

        <!-- FOOTER -->
        <div class="relative z-20 bg-white">
            <Footer />
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, nextTick } from 'vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
import Footer from '@/components/Footer.vue';
import ServiceDivider from '@/components/ServiceDivider.vue';

const props = defineProps<{
    aboutSections: any[];
    aboutItems: any[];
    servicesItems: any[];
    bgImage: string;
}>();

const lang = ref<'id' | 'en'>('en');

onMounted(() => {
    if (!window.location.hash) {
        window.scrollTo({ top: 0, behavior: 'instant' });
    }

    const savedLang = localStorage.getItem('app_lang');
    if (savedLang === 'id' || savedLang === 'en') lang.value = savedLang;

    nextTick(() => {
        if (window.location.hash) {
            const target = document.querySelector(window.location.hash);
            if (target) {
                setTimeout(() => {
                    const navbarOffset = 90;
                    const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: elementPosition - navbarOffset,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        }
    });
});

const handleLangChanged = (newLang: 'id' | 'en') => {
    lang.value = newLang;
};

const getLocalized = (data: any, langCode: string, fallback: string = '') => {
    if (!data) return fallback;
    let parsedData = data;
    if (typeof data === 'string' && data.startsWith('{') && data.endsWith('}')) {
        try { parsedData = JSON.parse(data); } catch (e) { return data; }
    }
    if (typeof parsedData === 'object' && parsedData !== null) {
        return parsedData[langCode] || parsedData['id'] || parsedData['en'] || fallback;
    }
    return parsedData;
};

const localizedSections = computed(() => {
    return props.aboutSections.map(section => {
        const rawContent = getLocalized(section.content, lang.value);
        const paragraphs = rawContent
            ? rawContent.split(/\n\s*\n/).map((p: string) => p.trim()).filter(Boolean)
            : [];

        return {
            ...section,
            locTitle: getLocalized(section.title, lang.value),
            locSubtitle: getLocalized(section.subtitle, lang.value),
            locContent: rawContent,
            locParagraphs: paragraphs,
        };
    });
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
}
</style>