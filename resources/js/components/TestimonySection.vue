<template>
    <section id="testimony"
        class="relative z-20 overflow-hidden px-6 min-h-screen flex flex-col items-center justify-center py-16">
        <!-- Blurred Background (Blur halus & exposure tidak terlalu gelap) -->
        <div class="absolute inset-0 -z-10 overflow-hidden bg-black/15">
            <div class="absolute inset-0 bg-black/10 backdrop-blur-[6px]"></div>
        </div>

        <div class="relative flex flex-col items-center justify-center w-full max-w-7xl mx-auto my-auto">
            <!-- Header -->
            <div class="flex flex-col items-center w-full max-w-3xl gap-3 mx-auto mb-8 text-center">
                <h2
                    class="font-cinzel text-3xl md:text-4xl lg:text-5xl font-bold tracking-widest uppercase text-white drop-shadow-[0_2px_7px_rgba(0,0,0,0.18)]">
                    {{ heading }}
                </h2>

                <!-- ServiceDivider dengan warna putih -->
                <ServiceDivider class="text-white" />
            </div>

            <!-- Testimony Content (Background/Fill iframe putih & border putih halus) -->
            <div
                class="w-full overflow-hidden rounded-4xl border border-white/30 bg-white shadow-[0_8px_28px_rgba(0,0,0,0.12)] backdrop-blur-[4px]">
                <iframe src="https://padlet.com/embed/8eenhn71li4mvssp" title="Our Testimony" frameborder="0"
                    loading="lazy" allow="camera;microphone;geolocation;display-capture;clipboard-write"
                    class="block w-full h-[450px] md:h-[520px] border-0 bg-white"></iframe>

                <a href="https://padlet.com?ref=embed" target="_blank" rel="noopener noreferrer"
                    class="flex items-center justify-end h-7 px-2 bg-white border-t border-black/5">
                    <img src="https://padlet.net/embeds/made_with_padlet_2022.png" width="114" height="28"
                        alt="Made with Padlet" class="object-contain opacity-85" />
                </a>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import ServiceDivider from '@/components/ServiceDivider.vue';

const props = defineProps<{
    lang?: 'id' | 'en';
}>();

const heading = computed(() => {
    return props.lang === 'id' ? 'Testimoni Kami' : 'Our Testimony';
});
</script>