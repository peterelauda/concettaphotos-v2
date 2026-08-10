<template>
    <div class="relative w-full h-[500px] md:h-[650px] overflow-hidden bg-black">

        <div class="relative w-full h-full">
            <transition-group name="dissolve">
                <div v-for="(slide, index) in slides" v-show="currentIndex === index" :key="slide.id"
                    class="absolute inset-0 w-full h-full">

                    <img :src="slide.full_url" :alt="slide.caption_title || 'Slide Image'"
                        class="w-full h-full object-cover" />

                    <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center p-6">
                        <h2 v-if="slide.caption_title"
                            class="text-white text-3xl md:text-5xl font-bold mb-3 drop-shadow-md">
                            {{ slide.caption_title }}
                        </h2>
                        <p v-if="slide.caption_description"
                            class="text-gray-200 text-lg md:text-xl max-w-2xl drop-shadow">
                            {{ slide.caption_description }}
                        </p>
                    </div>
                </div>
            </transition-group>
        </div>

        <div v-if="slides.length > 1" class="absolute bottom-6 left-0 right-0 z-10 flex justify-center gap-3">
            <button v-for="(_, index) in slides" :key="index" @click="goToSlide(index)"
                class="w-3 h-3 rounded-full transition-all duration-300"
                :class="currentIndex === index ? 'bg-white w-8' : 'bg-white/50 hover:bg-white/80'"
                :aria-label="'Go to slide ' + (index + 1)"></button>
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

const goToSlide = (index: number) => {
    currentIndex.value = index
    stopAutoplay()
    startAutoplay()
}

onMounted(() => {
    startAutoplay()
})

onUnmounted(() => {
    stopAutoplay()
})
</script>

<style scoped>
.dissolve-enter-active,
.dissolve-leave-active {
    transition: opacity 1.2s ease-in-out;
}

.dissolve-enter-from,
.dissolve-leave-to {
    opacity: 0;
}

.dissolve-enter-to,
.dissolve-leave-from {
    opacity: 1;
}
</style>