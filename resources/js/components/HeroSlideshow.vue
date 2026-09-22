<template>
    <div class="relative w-full h-screen">

        <div class="fixed top-0 left-0 w-full h-screen z-0 bg-black">
            <transition-group name="dissolve">
                <div v-for="(slide, index) in slides" v-show="currentIndex === index" :key="slide.id"
                    class="absolute inset-0 w-full h-full">

                    <img :src="slide.full_url" :alt="slide.caption_title || 'Slide Image'"
                        class="w-full h-full object-cover" />

                </div>
            </transition-group>
        </div>

        <div class="relative z-10 w-full h-full flex flex-col justify-center items-center text-center px-6"
            :style="{ opacity: textOpacity, transform: `translateY(${textTranslate}px)` }">

            <div class="animate-slide-down">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-quote icon-2 text-white mx-auto mb-1 solid-shadow-icon w-12 h-12 md:w-20 md:h-20"
                    viewBox="0 0 16 16">
                    <path
                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z">
                    </path>
                </svg>

                <div class="w-full flex items-center justify-center my-1 px-4 sm:px-8 md:px-12 text-white">

                    <div class="flex-grow h-[0.75px] bg-current"></div>

                    <svg class="w-64 sm:w-80 md:w-[420px] h-auto flex-shrink-0 text-current px-3" viewBox="0 0 420 40"
                        fill="none" stroke="currentColor">
                        <g transform="translate(210, 20)">

                            <path d="M -200,0 L -95,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />
                            <path d="M 95,0 L 200,0" stroke-width="0.75" vector-effect="non-scaling-stroke" />

                            <path d="M -85,0 C -80,-10 -65,-10 -60,0 C -55,10 -70,12 -75,4" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" fill="none" />
                            <path d="M -65,-3 Q -55,-14 -42,-6 C -48,1 -58,3 -65,-3 Z" stroke-width="0.75"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" fill="none" />

                            <path d="M -50,0 C -45,-7 -35,-7 -30,0 C -25,7 -35,9 -40,3" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" fill="none" />
                            <path d="M -38,-2 Q -30,-11 -20,-4 C -25,1 -32,2 -38,-2 Z" stroke-width="0.75"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" fill="none" />

                            <path d="M 85,0 C 80,-10 65,-10 60,0 C 55,10 70,12 75,4" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" fill="none" />
                            <path d="M 65,-3 Q 55,-14 42,-6 C 48,1 58,3 65,-3 Z" stroke-width="0.75"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" fill="none" />

                            <path d="M 50,0 C 45,-7 35,-7 30,0 C 25,7 35,9 40,3" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" fill="none" />
                            <path d="M 38,-2 Q 30,-11 20,-4 C 25,1 32,2 38,-2 Z" stroke-width="0.75"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" fill="none" />

                            <circle cx="-88" cy="0" r="1.25" fill="currentColor" stroke="none" />
                            <circle cx="88" cy="0" r="1.25" fill="currentColor" stroke="none" />

                            <circle cx="0" cy="0" r="3.5" fill="currentColor" stroke="none" />
                            <circle cx="0" cy="0" r="7" fill="none" stroke-width="0.75"
                                vector-effect="non-scaling-stroke" />
                            <circle cx="0" cy="0" r="10.5" fill="none" stroke-width="0.5"
                                vector-effect="non-scaling-stroke" opacity="0.7" />

                            <circle cx="-16" cy="0" r="1.25" fill="currentColor" stroke="none" />
                            <circle cx="16" cy="0" r="1.25" fill="currentColor" stroke="none" />

                        </g>
                    </svg>

                    <div class="flex-grow h-[0.75px] bg-current"></div>

                </div>

                <h1
                    class="col-lg-6 mx-auto mb-4 imperial-script-regular text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-normal solid-shadow-text">
                    "Let’s make your memories remains forever."
                </h1>
            </div>

            <div @click="scrollToNext"
                class="absolute bottom-20 sm:bottom-10 lg:bottom-12 left-1/2 cursor-pointer animate-smooth-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-chevron-down text-white w-6 h-6 sm:w-8 sm:h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 solid-shadow-icon"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                </svg>
            </div>
        </div>

    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'

interface SlideMedia {
    id: number
    file_path: string
    full_url: string
    caption_title?: string
    caption_description?: string
}

const props = defineProps<{
    slides: SlideMedia[]
    interval?: number
}>()

const currentIndex = ref(0)
let timer: ReturnType<typeof setInterval> | null = null

const startAutoplay = () => {
    if (props.slides.length <= 1) return
    if (timer) clearInterval(timer)
    timer = setInterval(() => {
        currentIndex.value = (currentIndex.value + 1) % props.slides.length
    }, props.interval || 5000)
}

const stopAutoplay = () => {
    if (timer) {
        clearInterval(timer)
        timer = null
    }
}

const textOpacity = ref(1)
const textTranslate = ref(0)

const handleScroll = () => {
    const scrollY = window.scrollY
    textOpacity.value = Math.max(1 - scrollY / 400, 0)
    textTranslate.value = scrollY * 0.4
}

const scrollToNext = () => {
    // Cari elemen target yang mengontrol perubahan navbar
    const targetSection = document.querySelector('[data-navbar-scroll-target]')

    if (targetSection) {
        const targetPosition = targetSection.getBoundingClientRect().top + window.scrollY
        window.scrollTo({
            top: targetPosition + 5,
            behavior: 'smooth'
        })
    } else {
        window.scrollTo({
            top: window.innerHeight + 50,
            behavior: 'smooth'
        })
    }
}

const handleVisibilityChange = () => {
    if (document.hidden) {
        stopAutoplay()
    } else {
        startAutoplay()
    }
}

onMounted(() => {
    startAutoplay()
    window.addEventListener('scroll', handleScroll)
    document.addEventListener('visibilitychange', handleVisibilityChange)
})

onUnmounted(() => {
    stopAutoplay()
    window.removeEventListener('scroll', handleScroll)
    document.removeEventListener('visibilitychange', handleVisibilityChange)
})
</script>

<style scoped>
.dissolve-enter-active,
.dissolve-leave-active {
    transition: opacity 1.5s ease-in-out;
}

.dissolve-enter-from,
.dissolve-leave-to {
    opacity: 0;
}

.dissolve-enter-to,
.dissolve-leave-from {
    opacity: 1;
}

@keyframes slideDown {
    0% {
        opacity: 0;
        transform: translateY(-80px);
    }

    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-down {
    animation: slideDown 2.5s ease-out forwards;
}

@keyframes smoothBounce {

    0%,
    100% {
        transform: translate(-50%, 0);
    }

    50% {
        transform: translate(-50%, 8px);
    }
}

.animate-smooth-bounce {
    animation: smoothBounce 2s ease-in-out infinite;
}

.solid-shadow-text {
    text-shadow: 0.8px 0.4px 0px rgba(80, 80, 80, 0.9);
}

.solid-shadow-icon {
    filter: drop-shadow(0.8px 0.4px 0px rgba(80, 80, 80, 0.9));
}
</style>