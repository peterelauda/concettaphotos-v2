<template>
    <footer class="relative z-20 bg-white pt-6 pb-6 md:pt-10 md:pb-8 flex flex-col w-full overflow-hidden">

        <div class="w-full flex items-center justify-center mb-6 md:mb-10 px-3 sm:px-6 md:px-8 text-[#3674B5]">

            <!-- Panah Kiri -->
            <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3.5 md:h-3.5 flex-shrink-0 fill-current" viewBox="0 0 10 10">
                <polygon points="10,4.5 4,1 0,5 4,9 10,5.5" />
            </svg>

            <!-- Garis Kiri -->
            <div class="flex-grow h-[1px] scale-y-50 opacity-75 bg-current"></div>

            <!-- Luxury Border Tengah -->
            <svg class="w-64 sm:w-80 md:w-[450px] lg:w-[500px] h-auto flex-shrink-0 text-current drop-shadow-sm px-1 sm:px-2"
                viewBox="0 0 300 30" fill="none" stroke="currentColor">

                <g transform="translate(150, 15)">

                    <!-- Center Dots -->
                    <circle cx="0" cy="0" r="3.5" fill="currentColor" stroke="none" />
                    <circle cx="0" cy="-9" r="1.5" fill="currentColor" stroke="none" />
                    <circle cx="0" cy="9" r="1.5" fill="currentColor" stroke="none" />

                    <!-- Left Swirls -->
                    <path d="M -8,0 Q -15,-8 -22,-8 C -28,-8 -28,-2 -24,-2 C -22,-2 -22,-4 -22,-4" stroke-width="0.5"
                        stroke-linecap="round" vector-effect="non-scaling-stroke" />
                    <circle cx="-22" cy="-4" r="1.5" fill="currentColor" stroke="none" />

                    <path d="M -8,0 Q -15,8 -22,8 C -28,8 -28,2 -24,2 C -22,2 -22,4 -22,4" stroke-width="0.5"
                        stroke-linecap="round" vector-effect="non-scaling-stroke" />
                    <circle cx="-22" cy="4" r="1.5" fill="currentColor" stroke="none" />

                    <!-- Left Lines & Rings -->
                    <path d="M -28,0 L -50,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />
                    <circle cx="-55" cy="0" r="3.5" fill="none" stroke-width="0.5" vector-effect="non-scaling-stroke" />

                    <path d="M -60,0 L -85,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />
                    <circle cx="-90" cy="0" r="3.5" fill="none" stroke-width="0.5" vector-effect="non-scaling-stroke" />

                    <path d="M -95,0 L -150,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />


                    <!-- Right Swirls -->
                    <path d="M 8,0 Q 15,-8 22,-8 C 28,-8 28,-2 24,-2 C 22,-2 22,-4 22,-4" stroke-width="0.5"
                        stroke-linecap="round" vector-effect="non-scaling-stroke" />
                    <circle cx="22" cy="-4" r="1.5" fill="currentColor" stroke="none" />

                    <path d="M 8,0 Q 15,8 22,8 C 28,8 28,2 24,2 C 22,2 22,4 22,4" stroke-width="0.5"
                        stroke-linecap="round" vector-effect="non-scaling-stroke" />
                    <circle cx="22" cy="4" r="1.5" fill="currentColor" stroke="none" />

                    <!-- Right Lines & Rings -->
                    <path d="M 28,0 L 50,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />
                    <circle cx="55" cy="0" r="3.5" fill="none" stroke-width="0.5" vector-effect="non-scaling-stroke" />

                    <path d="M 60,0 L 85,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />
                    <circle cx="90" cy="0" r="3.5" fill="none" stroke-width="0.5" vector-effect="non-scaling-stroke" />

                    <path d="M 95,0 L 150,0" stroke-width="0.5" vector-effect="non-scaling-stroke" />

                </g>
            </svg>

            <!-- Garis Kanan -->
            <div class="flex-grow h-[1px] scale-y-50 opacity-75 bg-current"></div>

            <!-- Panah Kanan -->
            <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 md:w-3.5 md:h-3.5 flex-shrink-0 fill-current" viewBox="0 0 10 10">
                <polygon points="0,4.5 6,1 10,5 6,9 0,5.5" />
            </svg>

        </div>

        <div
            class="w-full px-4 sm:px-6 md:px-8 lg:px-10 xl:px-12 2xl:px-16 flex flex-col-reverse sm:flex-row items-center justify-between gap-3 sm:gap-4">

            <div
                class="text-[#3674B5] font-bodoni text-[9px] sm:text-[10px] md:text-xs lg:text-sm text-center sm:text-left tracking-wide">
                &copy; {{ currentYear }} Concetta Photos. All Rights Reserved.
            </div>

            <div class="flex items-center gap-4 sm:gap-5 md:gap-6">
                <!-- Instagram -->
                <a href="https://www.instagram.com/concettaphotos/" target="_blank" aria-label="Instagram"
                    class="text-[#3674B5] hover:text-[#578FCA] active:text-[#A1E3F9] transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-5 lg:h-5" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.036 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zM8 4.271a3.729 3.729 0 1 0 0 7.458 3.729 3.729 0 0 0 0-7.458zM8 10.28a2.28 2.28 0 1 1 0-4.56 2.28 2.28 0 0 1 0 4.56z" />
                    </svg>
                </a>

                <!-- TikTok -->
                <a href="https://www.tiktok.com/@concettaphotos/" target="_blank" aria-label="TikTok"
                    class="text-[#3674B5] hover:text-[#578FCA] active:text-[#A1E3F9] transition-colors duration-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-5 lg:h-5" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                    </svg>
                </a>

                <!-- Threads -->
                <a href="https://www.threads.com/@concettaphotos" target="_blank" aria-label="Threads"
                    class="text-[#3674B5] hover:text-[#578FCA] active:text-[#A1E3F9] transition-colors duration-200 flex items-center justify-center">
                    <span
                        class="w-3 h-3 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-5 lg:h-5 bg-current inline-block transition-colors duration-200"
                        style="-webkit-mask-image: url('https://upload.wikimedia.org/wikipedia/commons/9/9d/Threads_%28app%29_logo.svg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original'); -webkit-mask-size: contain; -webkit-mask-repeat: no-repeat; -webkit-mask-position: center; mask-image: url('https://upload.wikimedia.org/wikipedia/commons/9/9d/Threads_%28app%29_logo.svg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original'); mask-size: contain; mask-repeat: no-repeat; mask-position: center;">
                    </span>
                </a>

                <!-- X / Twitter -->
                <a href="https://x.com/ConcettaPhotos_" target="_blank" aria-label="X"
                    class="text-[#3674B5] hover:text-[#578FCA] active:text-[#A1E3F9] transition-colors duration-200 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-3 h-3 sm:w-3.5 sm:h-3.5 md:w-4 md:h-4 lg:w-5 lg:h-5" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const currentYear = computed(() => new Date().getFullYear());
</script>

<style scoped>
.font-bodoni {
    font-family: 'Bodoni Moda', serif;
}
</style>