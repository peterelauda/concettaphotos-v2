<template>
    <div>
        <Navbar :aboutItems="aboutItems" :servicesItems="servicesItems" />

        <HeroSlideshow v-if="slides && slides.length > 0" :slides="slides" />

        <div v-else class="p-8 text-center bg-gray-100">
            <h1 class="text-2xl font-bold">There are no active slides.</h1>
        </div>

        <div data-navbar-scroll-target
            class="relative z-20 bg-[#3674B5] p-8 min-h-screen text-white border-t border-[#3674B5]">
        </div>

        <div class="relative z-20 bg-[#578FCA] p-8 min-h-screen text-white border-t border-[#3674B5]">
        </div>
    </div>
</template>

<script setup lang="ts">
import Navbar from '@/components/Navbar.vue';
import HeroSlideshow from '@/components/HeroSlideshow.vue';

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

defineProps<{
    slides: SlideMedia[]
    aboutItems: SectionItem[]
    servicesItems: SectionItem[]
}>()
</script>