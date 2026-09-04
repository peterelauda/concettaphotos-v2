<template>
    <header :class="[
        'fixed top-0 z-40 w-full transition-all duration-700 ease-in-out',
        isScrolled
            ? 'bg-white opacity-100 shadow-md'
            : 'bg-transparent opacity-100'
    ]">
        <div class="flex items-center justify-between w-full px-4 sm:px-6 md:px-10 py-4">
            <div class="flex-1">
                <button @click="isSidebarOpen = true" :class="isScrolled
                    ? 'text-[#3674B5] hover:text-[#3674B5]'
                    : 'text-white hover:text-white'"
                    class="font-cinzel text-sm sm:text-base md:text-lg active:scale-95 transition-colors duration-700 flex items-center gap-1 sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <span class="hidden md:inline">{{ t.menu }}</span>
                </button>
            </div>

            <div class="flex-1 flex justify-center">
                <Link href="/">
                    <img src="/images/logo_cp_primary.png" alt="Concetta Photos"
                        :class="isScrolled ? 'logo-blue' : 'logo-white'"
                        class="h-7 sm:h-10 md:h-14 w-auto object-contain transition-all duration-700 ease-in-out" />
                </Link>
            </div>

            <div class="flex-1 flex items-center justify-end">
                <div class="relative">
                    <button @click="isLangOpen = !isLangOpen" :class="isScrolled
                        ? 'text-[#3674B5] hover:text-[#3674B5]'
                        : 'text-white hover:text-white'"
                        class="font-cinzel text-xs sm:text-sm md:text-base lg:text-lg flex items-center gap-1 transition-colors duration-700 outline-none">
                        {{ lang.toUpperCase() }}
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-3 w-3 sm:h-3 sm:w-3 md:h-4 md:w-4 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <transition name="fade">
                        <div v-if="isLangOpen" :class="[
                            'absolute right-0 mt-2 w-16 sm:w-20 rounded-sm py-1 z-50 overflow-hidden border-none transition-all duration-300',
                            isScrolled ? 'bg-white shadow-md' : 'bg-white/7 shadow-lg backdrop-blur-[1px]'
                        ]">

                            <button @click="changeLang('en')"
                                class="block w-full text-center px-4 py-2 text-xs sm:text-sm md:text-base lg:text-lg font-bodoni bg-transparent outline-none transition-colors duration-200"
                                :class="isScrolled
                                    ? 'text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF]'
                                    : 'text-white hover:bg-white hover:text-[#578FCA] active:bg-white active:text-[#3674B5]'
                                    ">
                                EN
                            </button>

                            <button @click="changeLang('id')"
                                class="block w-full text-center px-4 py-2 text-xs sm:text-sm md:text-base lg:text-lg font-bodoni bg-transparent outline-none transition-colors duration-200"
                                :class="isScrolled
                                    ? 'text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF]'
                                    : 'text-white hover:bg-white hover:text-[#578FCA] active:bg-white active:text-[#3674B5]'
                                    ">
                                ID
                            </button>

                        </div>
                    </transition>

                </div>
            </div>

        </div>
    </header>

    <transition name="fade">
        <div v-if="isSidebarOpen" @click="isSidebarOpen = false" class="fixed inset-0 bg-black/40 z-50"></div>
    </transition>

    <div :class="isSidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 h-full w-[85vw] max-w-80 bg-white z-50 shadow-2xl transition-transform duration-300 ease-in-out flex flex-col">

        <div class="p-4 sm:p-6 flex justify-end">
            <button @click="isSidebarOpen = false"
                class="text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div
            class="flex-1 overflow-y-auto px-5 sm:px-6 py-2 font-bodoni text-sm sm:text-base md:text-lg lg:text-xl text-[#3674B5]">
            <ul class="space-y-4">
                <li>
                    <button @click="isAboutOpen = !isAboutOpen"
                        class="w-full flex justify-between items-start text-left text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        <span class="flex-1 pr-2 whitespace-normal break-words">{{ t.about }}</span>
                        <span class="text-xs sm:text-sm transition-transform duration-300 mt-1 flex-shrink-0"
                            :class="isAboutOpen ? 'rotate-180' : ''"> ▼ </span>
                    </button>
                    <ul v-show="isAboutOpen" class="pl-4 mt-2 space-y-2">
                        <li v-for="item in aboutItems" :key="item.id">
                            <Link :href="item.link_url || '#'"
                                class="block py-1 text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                                {{ item.title }}
                            </Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <Link href="/pricelist"
                        class="block text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        {{ t.priceList }}
                    </Link>
                </li>
                <li>
                    <button @click="isServicesOpen = !isServicesOpen"
                        class="w-full flex justify-between items-start text-left text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        <span class="flex-1 pr-2 whitespace-normal break-words">{{ t.services }}</span>
                        <span class="text-xs sm:text-sm transition-transform duration-300 mt-1 flex-shrink-0"
                            :class="isServicesOpen ? 'rotate-180' : ''"> ▼ </span>
                    </button>
                    <ul v-show="isServicesOpen" class="pl-4 mt-2 space-y-2">
                        <li v-for="item in servicesItems" :key="item.id">
                            <Link :href="item.link_url || '#'"
                                class="block py-1 text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                                {{ item.title }}
                            </Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <Link href="/testimonials"
                        class="block text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        {{ t.testimonials }}
                    </Link>
                </li>
                <li>
                    <Link href="/concettalk"
                        class="block text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        {{ t.concettalk }}
                    </Link>
                </li>
                <li>
                    <Link href="/faqs"
                        class="block text-left whitespace-normal break-words text-[#3674B5] hover:text-[#578FCA] active:text-[#D1F8EF] transition-colors duration-200">
                        {{ t.faqs }}
                    </Link>
                </li>
            </ul>
        </div>

        <div class="p-4 sm:p-6 flex flex-col gap-3 font-cinzel">
            <Link href="/inquiries"
                class="block w-full text-center whitespace-normal rounded-sm border border-[#3674B5] px-4 py-2 sm:px-5 sm:py-2 text-xs sm:text-sm md:text-base lg:text-lg leading-normal text-white bg-[#3674B5] hover:bg-[#578FCA] hover:border-[#578FCA] hover:text-white active:bg-[#A1E3F9] active:border-[#A1E3F9] active:text-white transition-all duration-200">
                {{ t.inquiries }}
            </Link>
            <Link href="/subscribe"
                class="block w-full text-center whitespace-normal rounded-sm border border-[#578FCA] px-4 py-2 sm:px-5 sm:py-2 text-xs sm:text-sm md:text-base lg:text-lg leading-normal text-[#578FCA] hover:bg-[#A1E3F9] hover:text-white hover:border-[#A1E3F9] active:bg-[#D1F8EF] active:text-white active:border-[#D1F8EF] transition-all duration-200">
                {{ t.subscribe }}
            </Link>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'

interface SectionItem {
    id: number
    title: string
    link_url: string | null
}

const props = withDefaults(
    defineProps<{
        aboutItems?: SectionItem[]
        servicesItems?: SectionItem[]
    }>(),
    {
        aboutItems: () => [],
        servicesItems: () => []
    }
)

const aboutItems = computed(() => props.aboutItems)
const servicesItems = computed(() => props.servicesItems)

const isScrolled = ref(false)

const handleScroll = () => {
    const targetSection = document.querySelector('[data-navbar-scroll-target]')

    if (!targetSection) {
        isScrolled.value = false
        return
    }

    const sectionTop = targetSection.getBoundingClientRect().top

    isScrolled.value = sectionTop <= 0
}

onMounted(() => {
    handleScroll()

    window.addEventListener(
        'scroll',
        handleScroll,
        { passive: true }
    )
})

onUnmounted(() => {
    window.removeEventListener(
        'scroll',
        handleScroll
    )
})

const isSidebarOpen = ref(false)
const isLangOpen = ref(false)
const isAboutOpen = ref(false)
const isServicesOpen = ref(false)

const lang = ref<'en' | 'id'>('en')

const changeLang = (newLang: 'en' | 'id') => {
    lang.value = newLang
    isLangOpen.value = false
}

const translations = {
    en: {
        menu: 'Menu',
        about: 'About',
        priceList: 'Price List',
        services: 'Our Services',
        testimonials: 'Testimonials',
        concettalk: 'Concettalk',
        faqs: 'FAQs',
        inquiries: 'Inquiries',
        subscribe: 'Subscribe'
    },

    id: {
        menu: 'Menu',
        about: 'Tentang',
        priceList: 'Daftar Harga',
        services: 'Layanan Kami',
        testimonials: 'Testimoni',
        concettalk: 'Concettalk',
        faqs: 'FAQs',
        inquiries: 'Pertanyaan',
        subscribe: 'Langganan'
    }
}

const t = computed(() => translations[lang.value])
</script>

<style scoped>
.font-cinzel {
    font-family: 'Cinzel', serif;
}

.font-bodoni {
    font-family: 'Bodoni Moda', serif;
}

header {
    transition:
        background-color 700ms ease-in-out,
        box-shadow 700ms ease-in-out,
        color 700ms ease-in-out;
}

.logo-white {
    filter: brightness(0) invert(1);
}

.logo-blue {
    filter: brightness(0) saturate(100%) invert(40%) sepia(34%) saturate(1017%) hue-rotate(168deg) brightness(88%) contrast(91%);
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
