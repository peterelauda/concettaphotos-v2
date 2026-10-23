<template>
    <div
        class="relative w-full max-w-6xl mx-auto px-4 sm:px-8 py-16 flex flex-col items-center justify-center overflow-hidden">

        <!-- Header Text -->
        <div class="text-center mb-10 md:mb-14 z-10 w-full">
            <h2
                class="font-cinzel text-3xl sm:text-4xl md:text-5xl text-white font-bold tracking-[0.15em] uppercase mb-4">
                {{ locTitle }}
            </h2>

            <!-- Border Luxury Khusus Pricelist -->
            <div class="w-full flex items-center justify-center my-4 md:my-6 text-white/90">
                <div class="flex-grow h-[0.75px] bg-current max-w-[100px] md:max-w-[200px]"></div>
                <svg class="w-[300px] sm:w-[500px] md:w-[700px] h-auto flex-shrink-0 text-current px-2 md:px-4 drop-shadow-sm"
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
                <div class="flex-grow h-[0.75px] bg-current max-w-[100px] md:max-w-[200px]"></div>
            </div>
        </div>

        <!-- Dekorasi Kanan Atas: Burung Terbang Keluar -->
        <svg class="absolute top-0 right-0 w-32 sm:w-48 md:w-56 h-auto text-white/20 pointer-events-none"
            viewBox="0 0 200 200" fill="none" stroke="currentColor">
            <!-- Jalur dimulai dari dekat buku (60,110) menuju ujung pojok (180,20) -->
            <path d="M 60,110 C 120,80 150,50 180,20" stroke-width="1.5" stroke-dasharray="6, 6" />
            <!-- Burung diposisikan di ujung (180,20) dan diputar -35 derajat menghadap keluar layar -->
            <g transform="translate(180, 20) rotate(-35)">
                <path d="M 0,0 Q -10,-15 -25,-15 Q -10,-5 0,0 Z M 0,0 Q -10,15 -25,15 Q -10,5 0,0 Z" fill="currentColor"
                    stroke="none" />
            </g>
        </svg>

        <!-- Dekorasi Kiri Bawah: Pesawat Kertas Terbang Keluar -->
        <svg class="absolute bottom-0 left-0 w-32 sm:w-48 md:w-56 h-auto text-white/20 pointer-events-none"
            viewBox="0 0 200 200" fill="none" stroke="currentColor">
            <!-- Jalur dimulai dari dekat buku (140,60) menuju ujung pojok (20,180) -->
            <path d="M 140,60 C 80,110 50,150 20,180" stroke-width="1.5" stroke-dasharray="6, 6" />
            <!-- Pesawat diposisikan di ujung (20,180) dan diputar 135 derajat menghadap pojok kiri bawah -->
            <g transform="translate(20, 180) rotate(135)">
                <polygon points="0,0 -30,12 -22,0 -30,-12" stroke-width="1.5" stroke-linejoin="round" />
                <line x1="0" y1="0" x2="-22" y2="0" stroke-width="1.5" />
            </g>
        </svg>

        <!-- Container Navigasi & Buku -->
        <div class="flex items-center justify-center w-full gap-2 sm:gap-6 md:gap-12 z-10">

            <!-- Arrow Kiri -->
            <button @click="prevPage"
                class="flex-shrink-0 text-white hover:text-white transition-all duration-300 transform hover:-translate-x-2 active:scale-90 active:text-white outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-10 sm:h-10 drop-shadow-md" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Book Layout -->
            <div
                class="flex-grow max-w-4xl flex bg-[#FDFBF7] shadow-[0_30px_60px_rgba(0,0,0,0.4)] rounded-sm relative perspective-[2500px] max-w-[90vw] md:max-w-4xl">

                <!-- Sisi Kiri Buku -->
                <div
                    class="flex w-6 sm:w-8 md:w-1/2 flex-shrink-0 border-r border-[#3674B5]/20 relative items-center justify-center overflow-hidden bg-gradient-to-br from-[#FDFBF7] to-[#F5F0E6]">
                    <div
                        class="absolute inset-0 bg-[radial-gradient(circle_at_center,_transparent_0%,_rgba(0,0,0,0.03)_100%)]">
                    </div>
                    <div class="md:hidden absolute inset-0 flex justify-end pr-[2px] opacity-20">
                        <div class="w-[1px] h-full bg-[#3674B5] mx-[1px]"></div>
                        <div class="w-[1px] h-full bg-[#3674B5] mx-[1px]"></div>
                        <div class="w-[1px] h-full bg-[#3674B5] mx-[1px]"></div>
                    </div>
                    <div class="hidden md:block absolute inset-4 border border-[#3674B5]/10"></div>
                    <h4
                        class="hidden md:block imperial-script-regular text-5xl lg:text-6xl text-[#3674B5]/20 -rotate-12 select-none">
                        {{ locSubtitle }}
                    </h4>
                    <div
                        class="absolute top-0 right-0 bottom-0 w-3 md:w-8 bg-gradient-to-l from-black/20 md:from-black/10 to-transparent">
                    </div>
                </div>

                <!-- Sisi Kanan Buku -->
                <div
                    class="flex-grow md:w-1/2 relative min-h-[350px] sm:min-h-[420px] flex flex-col transform-style-3d overflow-visible">

                    <div class="absolute -top-1 right-4 sm:right-8 w-5 sm:w-8 h-12 sm:h-16 bg-[#A1E3F9] z-30 shadow-sm"
                        style="clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%);"></div>

                    <div
                        class="hidden md:block absolute top-0 left-0 bottom-0 w-8 bg-gradient-to-r from-black/5 to-transparent z-20 pointer-events-none">
                    </div>

                    <!-- Base Layer -->
                    <div class="absolute inset-0 p-4 sm:p-8 md:p-10 flex flex-col z-0">
                        <div class="flex-grow flex flex-col justify-center items-center text-center">
                            <h4
                                class="imperial-script-regular text-xl sm:text-2xl md:text-3xl text-[#578FCA] mb-1 sm:mb-2">
                                Category</h4>
                            <h3
                                class="font-cinzel text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold tracking-wider uppercase mb-2 sm:mb-4 text-[#3674B5] leading-snug break-words max-w-full">
                                {{ isAnimating ? (isFlipping ? nextData.name : currentData.name) : currentData.name }}
                            </h3>
                            <p
                                class="font-bodoni text-[11px] sm:text-sm md:text-base text-[#3674B5]/80 leading-relaxed max-w-xs sm:max-w-sm mb-4 sm:mb-8">
                                {{ isAnimating ? (isFlipping ? nextData.description : currentData.description) :
                                    currentData.description }}
                            </p>
                            <Link
                                :href="isAnimating ? (isFlipping ? nextData.link : currentData.link) : currentData.link"
                                class="font-cinzel mt-auto text-[10px] sm:text-xs md:text-sm tracking-widest uppercase px-4 sm:px-6 py-2.5 border border-[#3674B5] text-[#3674B5] transition-colors duration-300 w-max
                                hover:text-white hover:bg-[#3674B5]
                                active:text-white active:bg-[#D1F8EF] active:border-[#D1F8EF]">
                                {{ t.viewDetailBtn }}
                            </Link>
                        </div>
                    </div>

                    <!-- Flip Layer -->
                    <div v-show="isAnimating" class="absolute inset-0 origin-left transform-style-3d z-10"
                        :class="[isFlipping ? 'animate-page-flip' : 'animate-page-flip-reverse']">
                        <div
                            class="absolute inset-0 bg-[#FDFBF7] backface-hidden p-4 sm:p-8 md:p-10 shadow-[-5px_0_15px_rgba(0,0,0,0.05)] border-l border-white/50 flex flex-col">
                            <div class="flex-grow flex flex-col justify-center items-center text-center">
                                <h4
                                    class="imperial-script-regular text-xl sm:text-2xl md:text-3xl text-[#578FCA] mb-1 sm:mb-2">
                                    Category</h4>
                                <h3
                                    class="font-cinzel text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold tracking-wider uppercase mb-2 sm:mb-4 text-[#3674B5] leading-snug break-words max-w-full">
                                    {{ isFlipping ? currentData.name : nextData.name }}
                                </h3>
                                <p
                                    class="font-bodoni text-[11px] sm:text-sm md:text-base text-[#3674B5]/80 leading-relaxed max-w-xs sm:max-w-sm mb-4 sm:mb-8">
                                    {{ isFlipping ? currentData.description : nextData.description }}
                                </p>
                                <div
                                    class="font-cinzel mt-auto text-[10px] sm:text-xs md:text-sm tracking-widest uppercase px-4 sm:px-6 py-2.5 border border-[#3674B5] text-[#3674B5] w-max opacity-50">
                                    {{ t.viewDetailBtn }}
                                </div>
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-black/10 to-transparent pointer-events-none">
                            </div>
                        </div>
                        <div
                            class="absolute inset-0 bg-[#FDFBF7] backface-hidden rotate-y-180 shadow-[5px_0_15px_rgba(0,0,0,0.05)] border-r border-[#3674B5]/5">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arrow Kanan -->
            <button @click="nextPage"
                class="flex-shrink-0 text-white hover:text-white transition-all duration-300 transform hover:translate-x-2 active:scale-90 active:text-white outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 sm:w-10 sm:h-10 drop-shadow-md" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Indikator Halaman -->
        <div class="flex items-center justify-center gap-3 mt-10 z-10">
            <button v-for="(_, index) in parsedPackages" :key="index" @click="goToPage(index)"
                class="w-2 h-2 rounded-full transition-all duration-300"
                :class="currentIndex === index ? 'bg-white scale-150' : 'bg-white/30 hover:bg-white/60'">
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    section: any,
    lang: 'id' | 'en'
}>();

const t = computed(() => ({
    viewDetailBtn: props.lang === 'id' ? 'Lihat Detail' : 'View Detail'
}));

const getLoc = (data: any, fallback: string = '') => {
    if (!data) return fallback;
    let parsed = typeof data === 'string' ? (data.startsWith('{') ? JSON.parse(data) : data) : data;
    return typeof parsed === 'object' ? (parsed[props.lang] || parsed['en'] || fallback) : parsed;
};

const locTitle = computed(() => getLoc(props.section?.title));
const locSubtitle = computed(() => getLoc(props.section?.subtitle));

const parsedPackages = computed(() => {
    let content = props.section?.content;
    if (typeof content === 'string') {
        try { content = JSON.parse(content); } catch (e) { content = []; }
    }
    return Array.isArray(content) ? content.map((pkg: any) => getLoc(pkg)) : [];
});

const currentIndex = ref(0);
const nextIndex = ref(0);
const isAnimating = ref(false);
const isFlipping = ref(true);

const currentData = computed(() => parsedPackages.value[currentIndex.value] || {});
const nextData = computed(() => parsedPackages.value[nextIndex.value] || {});

const triggerFlip = (direction: 'next' | 'prev', specificIndex: number | null = null) => {
    if (isAnimating.value) return;
    const total = parsedPackages.value.length;
    if (total <= 1) return;

    if (specificIndex !== null) {
        nextIndex.value = specificIndex;
        isFlipping.value = specificIndex > currentIndex.value;
    } else {
        if (direction === 'next') {
            nextIndex.value = (currentIndex.value + 1) % total;
            isFlipping.value = true;
        } else {
            nextIndex.value = (currentIndex.value - 1 + total) % total;
            isFlipping.value = false;
        }
    }

    isAnimating.value = true;

    setTimeout(() => {
        currentIndex.value = nextIndex.value;
        isAnimating.value = false;
    }, 1200);
};

const nextPage = () => triggerFlip('next');
const prevPage = () => triggerFlip('prev');
const goToPage = (index: number) => {
    if (index !== currentIndex.value) triggerFlip(index > currentIndex.value ? 'next' : 'prev', index);
};
</script>

<style scoped>
.transform-style-3d {
    transform-style: preserve-3d;
}

.backface-hidden {
    backface-visibility: hidden;
}

.rotate-y-180 {
    transform: rotateY(180deg);
}

.animate-page-flip {
    animation: pageFlip 1.2s cubic-bezier(0.5, 0, 1, 1) forwards;
}

@keyframes pageFlip {
    0% {
        transform: rotateY(0deg);
        opacity: 1;
    }

    100% {
        transform: rotateY(-180deg);
        opacity: 0;
    }
}

.animate-page-flip-reverse {
    animation: pageFlipReverse 1.2s cubic-bezier(0.5, 0, 1, 1) forwards;
}

@keyframes pageFlipReverse {
    0% {
        transform: rotateY(-180deg);
        opacity: 0;
    }

    100% {
        transform: rotateY(0deg);
        opacity: 1;
    }
}
</style>