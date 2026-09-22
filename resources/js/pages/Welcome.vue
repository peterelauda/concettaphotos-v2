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

        <!-- NEW: Dynamic Services Carousel Section (Photography Context) -->
        <div class="relative z-20 bg-[#FFFFFF] pt-24 pb-32 border-t border-[#3674B5] flex flex-col overflow-hidden">

            <!-- Heading Container -->
            <div class="max-w-3xl mx-auto px-6 text-center flex flex-col items-center gap-2 mb-10 md:mb-12">
                <h2
                    class="font-cinzel text-3xl md:text-4xl lg:text-5xl text-[#3674B5] font-bold tracking-widest uppercase">
                    {{ t.servicesHeading }}
                </h2>

                <!-- Desain Border Variatif Kustom (Solid, Uniform Outline, No Gradients/Fills) -->
                <div class="w-full flex items-center justify-center my-6 md:my-8 px-4 sm:px-8 md:px-12 text-[#3674B5]">

                    <!-- Garis Sisi Kiri (Solid Murni) -->
                    <div class="flex-grow h-[0.75px] bg-current"></div>

                    <!-- SVG Ornamen Luxury Tengah -->
                    <svg class="w-48 sm:w-64 md:w-80 h-auto flex-shrink-0 text-current px-3" viewBox="0 0 300 30"
                        fill="none" stroke="currentColor">
                        <g transform="translate(150, 15)">

                            <!-- Garis Penghubung Samping -->
                            <path d="M -140,0 L -55,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                            <path d="M 55,0 L 140,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />

                            <!-- Cincin & Titik Aksen Kiri -->
                            <circle cx="-45" cy="0" r="2.5" fill="none" stroke-width="0.75"
                                vector-effect="non-scaling-stroke" />
                            <circle cx="-45" cy="0" r="1" fill="currentColor" stroke="none" />

                            <!-- Cincin & Titik Aksen Kanan -->
                            <circle cx="45" cy="0" r="2.5" fill="none" stroke-width="0.75"
                                vector-effect="non-scaling-stroke" />
                            <circle cx="45" cy="0" r="1" fill="currentColor" stroke="none" />

                            <!-- Ornamen Ukiran Garis (Left Flourish - Outline Only) -->
                            <path
                                d="M -35,0 Q -25,-8 -15,-6 C -8,-5 -5,-1 -10,0 C -12,1 -15,4 -20,4 C -28,4 -30,-2 -35,0 Z"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"
                                vector-effect="non-scaling-stroke" fill="none" />

                            <!-- Ornamen Ukiran Garis (Right Flourish - Outline Only) -->
                            <path d="M 35,0 Q 25,-8 15,-6 C 8,-5 5,-1 10,0 C 12,1 15,4 20,4 C 28,4 30,-2 35,0 Z"
                                stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"
                                vector-effect="non-scaling-stroke" fill="none" />

                            <!-- Inti Pusat (Solid Dot & Konsisten Outline Ring) -->
                            <circle cx="0" cy="0" r="3" fill="currentColor" stroke="none" />
                            <circle cx="0" cy="0" r="6" fill="none" stroke-width="0.75"
                                vector-effect="non-scaling-stroke" />
                            <circle cx="-12" cy="0" r="1.25" fill="currentColor" stroke="none" />
                            <circle cx="12" cy="0" r="1.25" fill="currentColor" stroke="none" />

                        </g>
                    </svg>

                    <!-- Garis Sisi Kanan (Solid Murni) -->
                    <div class="flex-grow h-[0.75px] bg-current"></div>

                </div>

                <p class="font-bodoni text-base md:text-lg text-[#3674B5]/80 font-light leading-relaxed max-w-2xl mt-1">
                    {{ t.servicesDesc }}
                </p>
            </div>

            <!-- Carousel Slider Container (Responsive: Centered if fits screen, otherwise left-to-right scroll/drag) -->
            <div ref="carouselRef"
                class="w-full overflow-x-auto hide-scrollbar flex gap-6 md:gap-10 pb-8 select-none transition-all duration-300"
                :class="[
                    isDragging ? 'snap-none cursor-grabbing' : 'snap-x snap-mandatory cursor-grab',
                    needsScrolling ? 'px-6 sm:px-12 md:px-20 justify-start' : 'px-6 justify-center'
                ]" @mousedown="onMouseDown" @mouseleave="onMouseLeave" @mouseup="onMouseUp" @mousemove="onMouseMove"
                @scroll="handleScroll">

                <!-- Slide Item -->
                <div v-for="service in servicesSections" :key="service.id"
                    class="snap-center flex-shrink-0 w-[85vw] sm:w-[350px] md:w-[420px] flex flex-col gap-4 group">

                    <!-- Thumbnail/Image Area dengan Zoom Stabil & Tanpa Pergeseran Patahan -->
                    <div>
                        <div
                            class="block relative w-full aspect-[4/5] bg-[#F8F9FA] overflow-hidden shadow-sm rounded-sm">
                            <img v-if="service.media && service.media.length > 0"
                                :src="service.media[activePhotoMap[service.id] || 0].full_url" :alt="service.title"
                                class="w-full h-full object-cover transform-gpu transition-transform duration-700 ease-out group-hover:scale-105 pointer-events-none origin-center" />
                            <div v-else
                                class="w-full h-full flex items-center justify-center text-[#3674B5]/40 font-bodoni text-sm pointer-events-none">
                                Image Unavailable
                            </div>
                        </div>

                        <!-- Tombol Navigasi SVG Chevron Kiri Kanan -->
                        <div class="flex justify-center items-center px-2 text-[#3674B5] mt-4">
                            <button @click="prevPhoto(service)" aria-label="Previous photo"
                                class="hover:text-[#578FCA] transition-colors p-2 active:scale-95 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                                </svg>
                            </button>

                            <button @click="nextPhoto(service)" aria-label="Next photo"
                                class="hover:text-[#578FCA] transition-colors p-2 active:scale-95 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="flex flex-col gap-2 mt-1 px-2 text-center">
                        <p
                            class="imperial-script-regular text-lg sm:text-xl md:text-2xl lg:text-3xl text-[#578FCA] font-normal tracking-widest">
                            {{ service.subtitle }}
                        </p>
                        <Link :href="service.link_url || '#'" @click="handleLinkClick($event)"
                            class="font-cinzel text-2xl sm:text-3xl md:text-4xl text-[#3674B5] font-bold hover:text-[#578FCA] transition-colors">
                            {{ service.title }}
                        </Link>
                        <p
                            class="font-bodoni text-sm md:text-base text-[#3674B5]/80 font-light line-clamp-3 leading-relaxed mt-1">
                            {{ service.content }}
                        </p>
                        <!-- View More -->
                        <Link :href="service.link_url || '#'" @click="handleLinkClick($event)"
                            class="font-cinzel mx-auto text-xs font-normal tracking-widest text-[#3674B5] hover:text-[#578FCA] uppercase mt-3 flex items-center gap-2 transition-colors w-max">
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

            <!-- Divided Line Pagination (Responsif berdasarkan kondisi layar & kebutuhan scroll) -->
            <div v-if="needsScrolling && servicesSections && servicesSections.length > 0"
                class="flex items-center justify-center gap-2 md:gap-3 mt-8 w-full max-w-[200px] md:max-w-xs mx-auto">
                <button v-for="(service, index) in servicesSections" :key="service.id" @click="scrollToService(index)"
                    aria-label="Go to slide"
                    class="flex-1 h-[2px] md:h-[3px] transition-all duration-300 rounded-full cursor-pointer hover:bg-[#3674B5]/70"
                    :class="activeServiceIndex === index ? 'bg-[#3674B5] scale-y-110' : 'bg-[#3674B5]/20'">
                </button>
            </div>

        </div>

        <div class="relative z-20 bg-[#578FCA] p-8 min-h-screen text-white border-t border-[#3674B5]">
        </div>

        <Footer />
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue';
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

const props = defineProps<{
    slides: SlideMedia[]
    aboutItems: SectionItem[]
    servicesItems: SectionItem[]
    introSection?: DynamicSection
    servicesSections?: DynamicSection[]
}>()

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

// Cek dinamis apakah lebar layar memadai untuk menampung semua kartu atau perlu scrolling
const windowWidth = ref(typeof window !== 'undefined' ? window.innerWidth : 1200);

const updateWidth = () => {
    windowWidth.value = window.innerWidth;
};

onMounted(() => {
    window.addEventListener('resize', updateWidth);
});

onUnmounted(() => {
    window.removeEventListener('resize', updateWidth);
});

const needsScrolling = computed(() => {
    if (!props.servicesSections) return false;
    const cardWidth = windowWidth.value < 640 ? windowWidth.value * 0.85 : (windowWidth.value < 768 ? 350 : 420);
    const gap = windowWidth.value < 768 ? 24 : 40;
    const totalContentWidth = (props.servicesSections.length * cardWidth) + ((props.servicesSections.length - 1) * gap);
    const paddingOffset = windowWidth.value >= 768 ? 160 : 48;
    return (totalContentWidth + paddingOffset) > windowWidth.value;
});

// Intro Intersection Observer
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

// --- CAROUSEL LOGIC ---

const activePhotoMap = ref<Record<number, number>>({});

const nextPhoto = (service: DynamicSection) => {
    if (!service.media || service.media.length === 0) return;
    const current = activePhotoMap.value[service.id] || 0;
    activePhotoMap.value[service.id] = (current + 1) % service.media.length;
};

const prevPhoto = (service: DynamicSection) => {
    if (!service.media || service.media.length === 0) return;
    const current = activePhotoMap.value[service.id] || 0;
    activePhotoMap.value[service.id] = (current - 1 + service.media.length) % service.media.length;
};

// Drag and Scroll Sync with Hold protection
const carouselRef = ref<HTMLElement | null>(null);
const activeServiceIndex = ref(0);
const isDragging = ref(false);

let startX = 0;
let startY = 0;
let scrollLeft = 0;
let hasMoved = false;

const onMouseDown = (e: MouseEvent) => {
    if (!needsScrolling.value) return;
    isDragging.value = true;
    hasMoved = false;
    if (carouselRef.value) {
        startX = e.pageX - carouselRef.value.offsetLeft;
        startY = e.pageY;
        scrollLeft = carouselRef.value.scrollLeft;
    }
};

const onMouseLeave = () => {
    isDragging.value = false;
};

const onMouseUp = () => {
    isDragging.value = false;
};

const onMouseMove = (e: MouseEvent) => {
    if (!isDragging.value || !carouselRef.value) return;

    const x = e.pageX - carouselRef.value.offsetLeft;
    const y = e.pageY;

    const walkX = Math.abs(x - startX);
    const walkY = Math.abs(y - startY);

    if (walkX > 5 || walkY > 5) {
        hasMoved = true;
    }

    const walk = (x - startX) * 1.5;
    carouselRef.value.scrollLeft = scrollLeft - walk;
};

const handleLinkClick = (e: MouseEvent) => {
    if (hasMoved) {
        e.preventDefault();
    }
};

const handleScroll = () => {
    if (!carouselRef.value || !needsScrolling.value) return;
    const container = carouselRef.value;

    const scrollCenter = container.scrollLeft + container.clientWidth / 2;
    let closestIndex = 0;
    let minDistance = Infinity;

    Array.from(container.children).forEach((child, index) => {
        const childElement = child as HTMLElement;
        const childCenter = childElement.offsetLeft + childElement.clientWidth / 2;
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
            const targetScrollLeft = child.offsetLeft - (carouselRef.value.clientWidth / 2) + (child.clientWidth / 2);
            carouselRef.value.scrollTo({ left: targetScrollLeft, behavior: 'smooth' });
        }
    }
};
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

/* Hide scrollbar completely but allow scroll */
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>