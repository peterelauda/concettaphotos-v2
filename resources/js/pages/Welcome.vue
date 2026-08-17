<template>
    <div>
        <HeroSlideshow v-if="slides && slides.length > 0" :slides="slides" />
        
        <div v-else class="p-8 text-center bg-gray-100">
            <h1 class="text-2xl font-bold">There are no active slides.</h1>
        </div>
        
        <div class="relative z-20 bg-background p-8 min-h-screen">
        </div>
    </div>
</template>

<script setup lang="ts">
import HeroSlideshow from '@/components/HeroSlideshow.vue';

interface SlideMedia {
    id: number
    file_path: string
    full_url: string
    caption_title?: string
    caption_description?: string
}

defineProps<{
    slides: SlideMedia[]
}>()
</script>