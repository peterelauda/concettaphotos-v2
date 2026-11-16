<template>
    <div class="relative min-h-screen flex flex-col bg-transparent">

        <!-- PARALLAX BACKGROUND DINAMIS (z-0 agar tampil di atas body dan di belakang konten) -->
        <div class="fixed inset-0 z-0 w-full h-full bg-cover bg-center bg-no-repeat bg-fixed pointer-events-none"
            :style="{ backgroundImage: `url('${bgImage}')` }">
            <div class="absolute inset-0 bg-black/45 backdrop-blur-[1px]"></div>
        </div>

        <!-- NAVBAR (Otomatis transparan di atas dan putih saat menyentuh data-navbar-scroll-target) -->
        <Navbar :aboutItems="aboutItems" :servicesItems="servicesItems" @lang-changed="handleLangChanged" />

        <!-- HERO BANNER TENTANG KAMI (50vh) -->
        <div
            class="relative z-10 h-[50vh] flex flex-col items-center justify-center bg-transparent text-white text-center">
            <div class="max-w-4xl mx-auto px-6 mt-14">
                <p class="imperial-script-regular text-2xl sm:text-3xl md:text-4xl text-white mb-2 drop-shadow-md">
                    {{ lang === 'id' ? 'Mengenal Lebih Dekat' : 'Discover Our Journey' }}
                </p>
                <h1
                    class="font-cinzel text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-widest uppercase drop-shadow-lg">
                    {{ lang === 'id' ? 'Tentang Kami' : 'About Us' }}
                </h1>

                <div class="w-full flex items-center justify-center my-4 text-white/90 drop-shadow-md">
                    <div class="flex-grow h-[0.75px] bg-current max-w-[60px] sm:max-w-[100px]"></div>
                    <ServiceDivider class="text-white px-3" />
                    <div class="flex-grow h-[0.75px] bg-current max-w-[60px] sm:max-w-[100px]"></div>
                </div>
            </div>
        </div>

        <!-- DYNAMIC ABOUT SECTIONS (data-navbar-scroll-target memicu Navbar jadi putih 100%) -->
        <main data-navbar-scroll-target class="relative z-20 flex-grow bg-[#3674B5]">
            <section v-for="(section, index) in localizedSections" :key="section.id" :id="section.key" :class="[
                'py-20 sm:py-28 md:py-32 px-6 sm:px-12 md:px-20 transition-colors duration-500 border-b',
                index % 2 === 0
                    ? 'bg-[#3674B5] text-white border-white/15'
                    : 'bg-white text-[#3674B5] border-[#3674B5]/15'
            ]">
                <div class="relative max-w-7xl mx-auto flex flex-col gap-12 md:gap-16">

                    <!-- HEADER SECTION (Dihilangkan pada section pertama / index === 0) -->
                    <div v-if="index !== 0" class="flex flex-col items-center text-center max-w-3xl mx-auto">
                        <p v-if="section.locSubtitle" :class="[
                            'imperial-script-regular text-3xl sm:text-4xl md:text-5xl mb-2',
                            index % 2 === 0 ? 'text-white' : 'text-[#578FCA]'
                        ]">
                            {{ section.locSubtitle }}
                        </p>

                        <h2
                            class="font-cinzel text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-widest uppercase">
                            {{ section.locTitle }}
                        </h2>

                        <!-- Ornament Divider -->
                        <div class="w-full flex items-center justify-center my-4 opacity-90">
                            <div class="flex-grow h-[0.75px] bg-current max-w-[50px] sm:max-w-[100px]"></div>
                            <ServiceDivider :class="index % 2 === 0 ? 'text-white px-3' : 'text-[#3674B5] px-3'" />
                            <div class="flex-grow h-[0.75px] bg-current max-w-[50px] sm:max-w-[100px]"></div>
                        </div>
                    </div>

                    <!-- LAYOUT 2 KOLOM -->
                    <div :class="[
                        'flex flex-col lg:flex-row items-center gap-10 md:gap-14 lg:gap-20',
                        index % 2 === 1 ? 'lg:flex-row-reverse' : ''
                    ]">
                        <!-- KOLOM GAMBAR (Tanpa shadow) -->
                        <div v-if="section.media && section.media.length > 0" class="w-full lg:w-1/2">
                            <div :class="[
                                'relative aspect-[4/3] w-full rounded-sm overflow-hidden border transform transition-all duration-700 hover:scale-[1.02]',
                                index % 2 === 0 ? 'border-white/20 bg-white/10' : 'border-[#3674B5]/20 bg-gray-50'
                            ]">
                                <img :src="section.media[0].file_path" :alt="section.locTitle"
                                    class="w-full h-full object-cover" loading="lazy" />
                            </div>
                        </div>

                        <!-- KOLOM TEKS (Rata kanan khusus pada section background putih / index ganjil) -->
                        <div :class="[
                            'flex flex-col justify-center space-y-4 w-full',
                            (section.media && section.media.length > 0) ? 'lg:w-1/2' : 'lg:w-3/4 mx-auto',
                            index % 2 === 1 ? 'text-right' : 'text-left'
                        ]">
                            <div :class="[
                                'font-bodoni text-base sm:text-lg md:text-xl leading-loose whitespace-pre-line font-light opacity-95',
                                index % 2 === 1 ? 'text-right' : 'text-left'
                            ]">
                                {{ section.locContent }}
                            </div>

                            <!-- Button Contact -->
                            <div v-if="index === localizedSections.length - 1"
                                :class="['pt-6', index % 2 === 1 ? 'flex justify-end' : '']">
                                <Link href="/contact" :class="[
                                    'inline-block px-8 py-3 text-xs tracking-widest uppercase transition-all duration-300 border font-cinzel sm:text-sm active:scale-95',
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
    return props.aboutSections.map(section => ({
        ...section,
        locTitle: getLocalized(section.title, lang.value),
        locSubtitle: getLocalized(section.subtitle, lang.value),
        locContent: getLocalized(section.content, lang.value),
    }));
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