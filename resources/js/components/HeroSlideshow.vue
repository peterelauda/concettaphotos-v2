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
                <svg xmlns="http://www.w3.org/2000/svg" width="77" height="77" fill="currentColor"
                    class="bi bi-quote icon-2 text-white mx-auto mb-4 solid-shadow-icon" viewBox="0 0 16 16">
                    <path
                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z">
                    </path>
                </svg>

                <h1
                    class="col-lg-6 mx-auto mb-4 font-rouge text-white text-5xl md:text-7xl font-normal solid-shadow-text">
                    "Let’s make your memories remains forever."
                </h1>
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
    timer = setInterval(() => {
        currentIndex.value = (currentIndex.value + 1) % props.slides.length
    }, props.interval || 5000)
}

const stopAutoplay = () => {
    if (timer) clearInterval(timer)
}

const textOpacity = ref(1)
const textTranslate = ref(0)

const handleScroll = () => {
    const scrollY = window.scrollY
    textOpacity.value = Math.max(1 - scrollY / 400, 0)
    textTranslate.value = scrollY * 0.4
}

onMounted(() => {
    startAutoplay()
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    stopAutoplay()
    window.removeEventListener('scroll', handleScroll)
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

.solid-shadow-text {
    text-shadow: 2px 2px 0px rgba(0, 0, 0, 0.4),
        3px 3px 0px rgba(0, 0, 0, 0.2);
}

.solid-shadow-icon {
    filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.4));
}
</style>