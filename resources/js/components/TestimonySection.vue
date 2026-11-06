<template>
    <section id="testimony"
        class="relative z-20 overflow-hidden px-6 min-h-screen flex flex-col items-center justify-center py-16">
        <!-- Blurred Background (Tetap Statis di Belakang) -->
        <div class="absolute inset-0 -z-10 overflow-hidden bg-black/15">
            <div class="absolute inset-0 bg-black/21 backdrop-blur-[6px]"></div>
        </div>

        <!-- Konten yang Dianimasikan -->
        <div ref="contentRef" :class="[
            'relative flex flex-col items-center justify-center w-full max-w-7xl mx-auto my-auto transition-all duration-[1200ms] ease-[cubic-bezier(0.25,1,0.5,1)] transform-gpu',
            isVisible ? 'opacity-100 translate-y-0 blur-0 scale-100' : 'opacity-0 translate-y-24 blur-md scale-95'
        ]">

            <!-- Header -->
            <div class="flex flex-col items-center w-full max-w-3xl gap-3 mx-auto mb-8 text-center">
                <h2
                    class="font-cinzel text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold tracking-widest uppercase text-white drop-shadow-[0_2px_7px_rgba(0,0,0,0.18)]">
                    {{ heading }}
                </h2>

                <!-- ServiceDivider dengan warna putih -->
                <ServiceDivider class="text-white" />

                <p
                    class="mt-2 text-sm font-light tracking-wide text-white/90 font-bodoni sm:text-base md:text-lg drop-shadow-md">
                    {{ subHeading }}
                </p>
            </div>

            <!-- Testimony Content -->
            <div
                class="w-full mt-3 overflow-hidden rounded-4xl border border-white/30 bg-white shadow-[0_8px_28px_rgba(0,0,0,0.12)] backdrop-blur-[4px]">
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
import { computed, ref, onMounted } from 'vue';
import ServiceDivider from '@/components/ServiceDivider.vue';

const props = defineProps<{
    lang?: 'id' | 'en';
}>();

const heading = computed(() => {
    return props.lang === 'id' ? 'Testimoni Kami' : 'Our Testimony';
});

const subHeading = computed(() => {
    return props.lang === 'id' ? 'Kami melayani dengan hati' : 'We serve with heart';
});

// Animasi Scroll Reveal
const contentRef = ref<HTMLElement | null>(null);
const isVisible = ref(false);

onMounted(() => {
    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) isVisible.value = true;
    }, { threshold: 0.15 });

    if (contentRef.value) observer.observe(contentRef.value);
});
</script>