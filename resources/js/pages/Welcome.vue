<template>
    <div>
        <Navbar :aboutItems="aboutItems" :servicesItems="servicesSections" @lang-changed="lang = $event" />

        <HeroSlideshow v-if="slides && slides.length > 0" :slides="slides" />

        <div v-else class="p-8 text-center bg-gray-100">
            <h1 class="text-2xl font-bold">There are no active slides.</h1>
        </div>

        <div data-navbar-scroll-target
            class="relative z-20 flex flex-col items-center justify-center px-6 py-32 overflow-hidden text-center bg-[#3674B5] border-t border-[#3674B5] sm:py-40">

            <div ref="introRef" :class="[
                'max-w-3xl mx-auto flex flex-col items-center gap-5 sm:gap-6 transition-all duration-1000 ease-out',
                isIntroVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'
            ]">

                <h3
                    class="text-4xl font-light leading-tight text-white drop-shadow-sm imperial-script-regular sm:text-5xl md:text-6xl">
                    {{ introData.subtitle }}
                </h3>

                <h2
                    class="mb-1 text-2xl font-bold tracking-[0.2em] text-white uppercase font-cinzel sm:text-3xl md:text-4xl">
                    {{ introData.title }}
                </h2>

                <OrnamentDivider />

                <div
                    class="px-4 mb-6 text-sm leading-relaxed whitespace-pre-line font-bodoni sm:text-base md:text-lg text-white/90">
                    {{ introData.content }}
                </div>

                <Link :href="introData.link"
                    class="inline-block px-8 py-3 text-xs tracking-widest text-white uppercase transition-all duration-300 border border-white font-cinzel sm:text-sm hover:bg-white hover:text-[#578FCA] active:scale-95 active:bg-white active:text-[#A1E3F9]">
                    {{ t.button }}
                </Link>

            </div>
        </div>

        <!-- SERVICES SECTION -->
        <div class="relative z-20 bg-[#FFFFFF] pt-24 pb-32 border-t border-[#3674B5] flex flex-col overflow-hidden">

            <div ref="servicesAnimRef"
                :class="['transition-all duration-1000 ease-out', isServicesVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12']">

                <!-- Header -->
                <div class="flex flex-col items-center gap-2 px-6 mx-auto text-center max-w-3xl mb-10 md:mb-12">
                    <h2
                        class="font-cinzel text-3xl md:text-4xl lg:text-5xl text-[#3674B5] font-bold tracking-widest uppercase">
                        {{ t.servicesHeading }}
                    </h2>

                    <ServiceDivider />

                    <p
                        class="font-bodoni text-base md:text-lg text-[#3674B5]/80 font-light leading-relaxed max-w-2xl mt-1">
                        {{ t.servicesDesc }}
                    </p>
                </div>

                <!-- Carousel -->
                <div ref="carouselRef" :class="[
                    'w-full overflow-x-auto hide-scrollbar flex gap-6 md:gap-10 pb-8 select-none transition-all duration-300',
                    isDragging ? 'snap-none cursor-grabbing' : 'snap-x snap-mandatory cursor-grab',
                    needsScrolling ? 'px-6 sm:px-12 md:px-20 justify-start' : 'px-6 justify-center'
                ]" @mousedown="onMouseDown" @mouseleave="onMouseLeave" @mouseup="onMouseUp" @mousemove="onMouseMove"
                    @scroll="handleScroll">

                    <div v-for="(service, index) in localizedServices" :key="service.id"
                        class="flex flex-col gap-4 flex-shrink-0 snap-center w-[85vw] sm:w-[350px] md:w-[420px] group">

                        <!-- Service Image & Controls -->
                        <div>
                            <div
                                class="relative block w-full aspect-[4/5] bg-[#F8F9FA] overflow-hidden shadow-sm rounded-sm">
                                <img v-if="service.media?.length"
                                    :src="service.media[activePhotoMap[service.id] || 0].full_url"
                                    :alt="service.locTitle" :class="[
                                        'w-full h-full object-cover transform-gpu transition-transform duration-700 ease-out pointer-events-none origin-center',
                                        activeServiceIndex === index ? 'scale-105' : 'scale-100 md:group-hover:scale-105'
                                    ]" />
                                <div v-else
                                    class="flex items-center justify-center w-full h-full text-sm pointer-events-none text-[#3674B5]/40 font-bodoni">
                                    Image Unavailable
                                </div>
                            </div>

                            <!-- Pagination Controls -->
                            <div class="flex items-center justify-center px-2 mt-4 text-[#3674B5]">
                                <button @click="prevPhoto(service)" aria-label="Previous photo"
                                    class="p-2 transition-colors cursor-pointer hover:text-[#578FCA] active:scale-95">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                                    </svg>
                                </button>
                                <button @click="nextPhoto(service)" aria-label="Next photo"
                                    class="p-2 transition-colors cursor-pointer hover:text-[#578FCA] active:scale-95">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="flex flex-col gap-2 mt-1 px-2 text-center">
                            <p
                                class="text-lg font-normal tracking-widest imperial-script-regular sm:text-xl md:text-2xl lg:text-3xl text-[#578FCA]">
                                {{ service.locSubtitle }}
                            </p>

                            <Link :href="service.link_url || '#'" @click="handleLinkClick($event)"
                                class="text-2xl font-bold transition-colors font-cinzel sm:text-3xl md:text-4xl text-[#3674B5] hover:text-[#578FCA]">
                                {{ service.locTitle }}
                            </Link>

                            <p
                                class="mt-1 text-sm font-light leading-relaxed font-bodoni sm:text-base md:text-lg text-[#3674B5]/80">
                                {{ service.locContent }}
                            </p>

                            <Link :href="service.link_url || '#'" @click="handleLinkClick($event)"
                                class="flex items-center gap-2 mx-auto mt-3 text-xs font-normal tracking-widest uppercase transition-colors w-max font-cinzel text-[#3674B5] hover:text-[#578FCA]">
                                {{ t.viewDetailBtn }}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Scroll Indicators -->
                <div v-if="needsScrolling && localizedServices.length > 0"
                    class="flex items-center justify-center w-full max-w-[200px] gap-2 mx-auto mt-8 md:gap-3 md:max-w-xs">
                    <button v-for="(service, index) in localizedServices" :key="service.id"
                        @click="scrollToService(index)" aria-label="Go to slide" :class="[
                            'flex-1 h-[2px] md:h-[3px] transition-all duration-300 rounded-full cursor-pointer hover:bg-[#3674B5]/70',
                            activeServiceIndex === index ? 'bg-[#3674B5] scale-y-110' : 'bg-[#3674B5]/20'
                        ]">
                    </button>
                </div>

            </div>
        </div>

        <!-- Pricelist Section -->
        <div
            class="relative z-20 bg-[#578FCA] min-h-screen text-white border-t border-[#3674B5] flex flex-col items-center justify-center overflow-hidden">

            <div ref="pricelistAnimRef"
                :class="['w-full transition-all duration-[1200ms] ease-[cubic-bezier(0.25,1,0.5,1)]',
                    isPricelistVisible ? 'opacity-100 translate-y-0 blur-0 scale-100' : 'opacity-0 translate-y-20 blur-sm scale-95']">

                <PricelistBook v-if="pricelistSection" :section="pricelistSection" :lang="lang" />

            </div>
        </div>

        <Footer />
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import Navbar from '@/components/Navbar.vue';
import HeroSlideshow from '@/components/HeroSlideshow.vue';
import Footer from '@/components/Footer.vue';
import OrnamentDivider from '@/components/OrnamentDivider.vue';
import ServiceDivider from '@/components/ServiceDivider.vue';
import PricelistBook from '@/components/PricelistBook.vue';

// ==========================================
// 1. TYPES & INTERFACES
// ==========================================
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
    title: any
    subtitle: any
    content: any
    link_url: string
    media?: SlideMedia[]
}

// ==========================================
// 2. PROPS
// ==========================================
const props = defineProps<{
    slides: SlideMedia[]
    aboutItems: SectionItem[]
    servicesItems: SectionItem[]
    introSection?: DynamicSection
    servicesSections?: DynamicSection[]
    pricelistSection?: DynamicSection
}>();

// ==========================================
// 3. LOCALIZATION & TRANSLATIONS
// ==========================================
const lang = ref<'id' | 'en'>('en');

const translations = {
    id: {
        subtitle: 'Captured with Love',
        title: 'The Art of Memories',
        content: 'Kami mengabadikan momen berharga Anda dengan penuh cinta, mengubah detik yang berlalu menjadi karya seni abadi. Biarkan kami membingkai memori Anda agar dikenang selamanya.',
        button: 'Kenali Kami Lebih Lanjut',

        servicesSubtitle: 'Explore',
        servicesHeading: 'Our Services',
        servicesDesc: 'Setiap sesi fotografi yang kami desain sepenuhnya dibuat khusus—menyesuaikan preferensi, gaya, dan momen berharga Anda. Potret-potret ini menunjukkan keindahan yang tercipta saat segalanya difokuskan pada kenangan Anda.',
        viewDetailBtn: 'View More'
    },
    en: {
        subtitle: 'Captured with Love',
        title: 'The Art of Memories',
        content: 'We capture your precious moments with love and passion, turning fleeting seconds into timeless art. Let us frame your memories so they can be cherished forever.',
        button: 'Learn More About Us',

        servicesSubtitle: 'Explore',
        servicesHeading: 'Our Services',
        servicesDesc: 'Each photography session we design is entirely bespoke—built around your timing, your style, and the encounters that call to you. These glimpses show what yours might become.',
        viewDetailBtn: 'View More'
    }
};

const t = computed(() => translations[lang.value]);

const getLocalized = (data: any, langCode: string, fallback: string = '') => {
    if (!data) return fallback;

    let parsedData = data;

    if (typeof data === 'string' && data.startsWith('{') && data.endsWith('}')) {
        try { parsedData = JSON.parse(data); }
        catch (e) { return data; }
    }

    if (typeof parsedData === 'object' && parsedData !== null) {
        return parsedData[langCode] || parsedData['id'] || parsedData['en'] || fallback;
    }

    return parsedData;
};

// ==========================================
// 4. WINDOW RESIZE & RESPONSIVENESS
// ==========================================
const windowWidth = ref(typeof window !== 'undefined' ? window.innerWidth : 1200);

const updateWidth = () => {
    windowWidth.value = window.innerWidth;
};

onMounted(() => window.addEventListener('resize', updateWidth));
onUnmounted(() => window.removeEventListener('resize', updateWidth));

const needsScrolling = computed(() => {
    if (!props.servicesSections?.length) return false;

    const isMobile = windowWidth.value < 640;
    const isTablet = windowWidth.value < 768;

    const cardWidth = isMobile ? windowWidth.value * 0.85 : (isTablet ? 350 : 420);
    const gap = isTablet ? 24 : 40;
    const paddingOffset = isTablet ? 48 : 160;

    const totalContentWidth = (props.servicesSections.length * cardWidth) + ((props.servicesSections.length - 1) * gap);

    return (totalContentWidth + paddingOffset) > windowWidth.value;
});

// ==========================================
// 5. SCROLL ANIMATIONS (INTERSECTION OBSERVER)
// ==========================================
// Local composable untuk menghindari duplikasi kode observer
const useScrollReveal = (threshold = 0.15) => {
    const elRef = ref<HTMLElement | null>(null);
    const isVisible = ref(false);

    onMounted(() => {
        const observer = new IntersectionObserver(([entry]) => {
            if (entry.isIntersecting) isVisible.value = true;
        }, { threshold });

        if (elRef.value) observer.observe(elRef.value);
    });

    return { elRef, isVisible };
};

const { elRef: introRef, isVisible: isIntroVisible } = useScrollReveal();
const { elRef: servicesAnimRef, isVisible: isServicesVisible } = useScrollReveal();

// ==========================================
// 6. CAROUSEL & PHOTO NAVIGATION LOGIC
// ==========================================
const activePhotoMap = ref<Record<number, number>>({});

// Fungsi dinamis untuk next/prev photo
const changePhoto = (service: DynamicSection, step: number) => {
    if (!service.media?.length) return;
    const current = activePhotoMap.value[service.id] || 0;
    const total = service.media.length;
    activePhotoMap.value[service.id] = (current + step + total) % total;
};

const nextPhoto = (service: DynamicSection) => changePhoto(service, 1);
const prevPhoto = (service: DynamicSection) => changePhoto(service, -1);

// Drag & Scroll State
const carouselRef = ref<HTMLElement | null>(null);
const activeServiceIndex = ref(0);
const isDragging = ref(false);

let startX = 0, startY = 0, scrollLeft = 0, hasMoved = false;

const onMouseDown = (e: MouseEvent) => {
    if (!needsScrolling.value || !carouselRef.value) return;
    isDragging.value = true;
    hasMoved = false;
    startX = e.pageX - carouselRef.value.offsetLeft;
    startY = e.pageY;
    scrollLeft = carouselRef.value.scrollLeft;
};

const onMouseLeave = () => isDragging.value = false;
const onMouseUp = () => isDragging.value = false;

const onMouseMove = (e: MouseEvent) => {
    if (!isDragging.value || !carouselRef.value) return;

    const x = e.pageX - carouselRef.value.offsetLeft;
    const y = e.pageY;

    if (Math.abs(x - startX) > 5 || Math.abs(y - startY) > 5) {
        hasMoved = true;
    }

    carouselRef.value.scrollLeft = scrollLeft - ((x - startX) * 1.5);
};

const handleLinkClick = (e: MouseEvent) => {
    if (hasMoved) e.preventDefault();
};

const handleScroll = () => {
    if (!carouselRef.value || !needsScrolling.value) return;

    const container = carouselRef.value;

    const scrollCenter = container.scrollLeft + container.clientWidth / 2;

    let closestIndex = 0;
    let minDistance = Infinity;

    Array.from(container.children).forEach((child, index) => {
        const el = child as HTMLElement;
        const childCenter = el.offsetLeft + el.clientWidth / 2;
        const distance = Math.abs(scrollCenter - childCenter);

        if (distance < minDistance) {
            minDistance = distance;
            closestIndex = index;
        }
    });

    activeServiceIndex.value = closestIndex;
};

const scrollToService = (index: number) => {
    activeServiceIndex.value = index;
    if (carouselRef.value) {
        const child = carouselRef.value.children[index] as HTMLElement;
        if (child) {
            const target = child.offsetLeft - (carouselRef.value.clientWidth / 2) + (child.clientWidth / 2);
            carouselRef.value.scrollTo({ left: target, behavior: 'smooth' });
        }
    }
};

// ==========================================
// 7. COMPUTED VIEW MODELS
// ==========================================
const introData = computed(() => ({
    title: getLocalized(props.introSection?.title, lang.value, t.value.title),
    subtitle: getLocalized(props.introSection?.subtitle, lang.value, t.value.subtitle),
    content: getLocalized(props.introSection?.content, lang.value, t.value.content),
    link: props.introSection?.link_url || '/about'
}));

const localizedServices = computed(() => {
    if (!props.servicesSections) return [];

    return props.servicesSections.map(service => ({
        ...service,
        locTitle: getLocalized(service.title, lang.value),
        locSubtitle: getLocalized(service.subtitle, lang.value),
        locContent: getLocalized(service.content, lang.value),
    }));
});

const { elRef: pricelistAnimRef, isVisible: isPricelistVisible } = useScrollReveal();
</script>

<style scoped>
/* Hide scrollbar completely but allow scroll */
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>