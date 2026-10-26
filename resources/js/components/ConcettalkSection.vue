<template>
    <!-- Hapus overflow-hidden agar shadow kartu tidak terpotong tepi -->
    <section
        class="relative z-20 flex flex-col items-center w-full pt-28 pb-36 md:pt-32 md:pb-40 bg-[#3674B5] border-t border-white/20">

        <div ref="contentRef" :class="[
            'w-full flex flex-col items-center transition-all duration-[1200ms] ease-[cubic-bezier(0.25,1,0.5,1)] transform-gpu',
            isVisible ? 'opacity-100 translate-y-0 blur-0' : 'opacity-0 translate-y-24 blur-sm'
        ]">

            <!-- Header Dynamic -->
            <div
                class="flex flex-col items-center gap-2 px-6 sm:px-12 md:px-20 mx-auto text-center max-w-3xl mb-10 md:mb-12">
                <h2 class="font-cinzel text-3xl md:text-4xl lg:text-5xl text-white font-bold tracking-widest uppercase">
                    {{ locTitle }}
                </h2>

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
                            <path d="M -35,0 C -25,-9 -15,-9 -5,-2.5" fill="none" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" />
                            <path d="M -35,0 C -25,9 -15,9 -5,2.5" fill="none" stroke-width="0.75"
                                stroke-linecap="round" vector-effect="non-scaling-stroke" />
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

                <p class="font-bodoni text-base md:text-lg text-white/80 font-light leading-relaxed max-w-2xl mt-1">
                    {{ locContent }}
                </p>
            </div>

            <!-- Carousel -->
            <div ref="carouselRef" :class="[
                'w-full overflow-x-auto hide-scrollbar flex gap-4 sm:gap-6 md:gap-10 pb-12 select-none transition-all duration-300',
                isDragging ? 'snap-none cursor-grabbing' : 'snap-x snap-mandatory cursor-grab',
                'px-6 sm:px-12 md:px-20 justify-start'
            ]" @mousedown="onMouseDown" @mouseleave="onMouseLeave" @mouseup="onMouseUp" @mousemove="onMouseMove">

                <!-- Cards -->
                <div v-for="post in displayPosts" :key="post.id"
                    class="flex flex-col bg-white rounded-xl shadow-xl overflow-hidden flex-shrink-0 snap-center w-[80vw] sm:w-[350px] md:w-[400px]">
                    <div class="flex items-center p-3.5 border-b border-gray-100 bg-white">
                        <div
                            class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm overflow-hidden border border-gray-100 flex-shrink-0">
                            <img src="/images/logo_cp_navbar.png" alt="Logo CP" class="w-full h-full object-cover" />
                        </div>
                        <span class="ml-3 font-cinzel font-bold text-sm text-[#3674B5]">Concetta Photo</span>
                    </div>

                    <div class="relative w-full aspect-[4/5] bg-gray-100 overflow-hidden"
                        @dblclick="handleDoubleClick(post)">
                        <img :src="post.image_path" class="w-full h-full object-cover pointer-events-none"
                            loading="lazy" />
                        <transition name="heart-pop">
                            <div v-if="post.showHeartAnim"
                                class="absolute inset-0 flex items-center justify-center bg-black/20 z-10 pointer-events-none">
                                <svg class="w-24 h-24 text-red-500 fill-current drop-shadow-lg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                            </div>
                        </transition>
                    </div>

                    <div class="p-4 flex flex-col flex-grow bg-white">
                        <div class="flex gap-4 mb-2">
                            <button @click="toggleLike(post)" class="transition-transform active:scale-90 outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7"
                                    :class="post.has_liked ? 'text-red-500 fill-current' : 'text-[#3674B5]'"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                                    :fill="post.has_liked ? 'currentColor' : 'none'">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </button>
                            <button @click="openModal(post)"
                                class="text-[#3674B5] outline-none hover:opacity-70 transition-opacity">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.306 5.485-.245 1.488-1.282 2.684-1.303 2.708a.75.75 0 00.916 1.134c1.868-.691 3.235-1.574 4.144-2.327A8.956 8.956 0 0012 20.25z" />
                                </svg>
                            </button>
                        </div>
                        <p class="font-bodoni font-bold text-sm text-black mb-2">{{ post.likes_count }} likes</p>
                        <p class="text-sm font-bodoni text-black mb-3">
                            <span class="font-cinzel font-bold text-[#3674B5] mr-1">Concetta Photo</span>
                            {{ post.caption }}
                        </p>
                        <div class="mt-auto space-y-1.5 pt-2 border-t border-gray-100">
                            <div v-for="comment in (post.comments || []).slice(0, 3)" :key="comment.id"
                                class="text-sm font-bodoni text-black">
                                <span class="font-bold mr-1 text-black">{{ comment.user ? comment.user.name :
                                    (comment.guest_name || 'Guest') }}</span>
                                <span class="text-black" v-if="comment.content.length <= 80">{{ comment.content
                                }}</span>
                                <span class="text-black" v-else>
                                    {{ comment.content.substring(0, 80) }}...
                                    <button @click="openModal(post)"
                                        class="text-gray-500 text-xs ml-1 hover:underline font-bodoni">{{ t.more
                                        }}</button>
                                </span>
                            </div>
                            <button v-if="(post.comments || []).length > 3" @click="openModal(post)"
                                class="text-gray-500 text-xs mt-1 hover:underline font-bodoni block">
                                View all {{ post.comments.length }} comments
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card Selengkapnya -->
                <div v-if="hasMorePosts"
                    class="flex flex-col items-center justify-center bg-[#FDFBF7] hover:bg-[#A1E3F9] border border-[#3674B5]/30 rounded-xl shadow-xl flex-shrink-0 snap-center w-[85vw] sm:w-[350px] md:w-[400px] group cursor-pointer transition-all duration-300">
                    <div
                        class="w-16 h-16 rounded-full border-2 border-[#3674B5] bg-white flex items-center justify-center text-[#3674B5] group-hover:scale-110 transition-transform duration-300 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </div>
                    <h3
                        class="font-cinzel mt-4 text-[#3674B5] font-bold tracking-widest uppercase text-sm sm:text-base">
                        {{ t.morePosts }}</h3>
                </div>
            </div>
        </div>

        <!-- MODAL COMMENT dengan Teleport ke Tag Body -->
        <Teleport to="body">
            <div v-if="activePost"
                class="fixed inset-0 z-[99999] flex items-center justify-center p-0 md:p-4 bg-black/90 md:bg-black/80 backdrop-blur-sm"
                @click.self="closeModal">
                <div
                    class="bg-white md:rounded-2xl shadow-2xl w-full h-full md:h-auto max-w-5xl flex flex-col md:flex-row overflow-hidden max-h-screen md:max-h-[90vh]">

                    <!-- Bagian Kiri: Gambar Full Scale Responsive -->
                    <div
                        class="w-full md:w-3/5 bg-black flex items-center justify-center h-[40vh] md:h-auto overflow-hidden relative">
                        <img :src="activePost.image_path" class="w-full h-full object-contain" />
                        <button @click="closeModal"
                            class="md:hidden absolute top-4 right-4 bg-black/50 text-white rounded-full p-1.5 hover:bg-red-500 transition-colors z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Bagian Kanan: Area Komentar -->
                    <div class="w-full md:w-2/5 flex flex-col h-[60vh] md:h-[85vh] bg-white">
                        <div class="flex items-center justify-between p-4 border-b border-gray-200">
                            <div class="flex items-center">
                                <div
                                    class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-sm overflow-hidden border border-gray-100 flex-shrink-0">
                                    <img src="/images/logo_cp_navbar.png" alt="Logo CP"
                                        class="w-full h-full object-cover" />
                                </div>
                                <span class="ml-3 font-cinzel font-bold text-sm text-[#3674B5]">Concetta Photo</span>
                            </div>
                            <button @click="closeModal"
                                class="hidden md:block text-gray-500 hover:text-red-500 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Daftar Komentar -->
                        <div class="flex-grow p-4 overflow-y-auto hide-scrollbar space-y-4 bg-white">
                            <div class="flex gap-3 mb-4 pb-3 border-b border-gray-100">
                                <div
                                    class="w-8 h-8 rounded-full bg-white flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-gray-100">
                                    <img src="/images/logo_cp_navbar.png" alt="Logo CP"
                                        class="w-full h-full object-cover" />
                                </div>
                                <p class="text-sm font-bodoni text-black">
                                    <span class="font-cinzel font-bold text-[#3674B5] mr-1">Concetta Photo</span>
                                    {{ activePost.caption }}
                                </p>
                            </div>

                            <div v-for="comment in (activePost.comments || [])" :key="comment.id"
                                class="flex flex-col gap-1">
                                <div class="flex gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gray-200 flex-shrink-0 flex items-center justify-center text-gray-700 font-bold text-xs uppercase">
                                        {{ (comment.user ? comment.user.name : (comment.guest_name || 'G')).charAt(0) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bodoni text-black">
                                            <span class="font-bold mr-1 text-black">{{ comment.user ? comment.user.name
                                                : (comment.guest_name || 'Guest') }}</span>
                                            {{ comment.content }}
                                        </p>
                                        <button v-if="isAdmin" @click="setReply(comment)"
                                            class="text-xs text-gray-500 mt-1 hover:underline font-bodoni">Reply</button>
                                    </div>
                                </div>

                                <div v-if="comment.replies && comment.replies.length > 0" class="ml-11 mt-2 space-y-2">
                                    <div v-for="reply in comment.replies" :key="reply.id" class="flex gap-3">
                                        <div
                                            class="w-6 h-6 rounded-full bg-white flex-shrink-0 flex items-center justify-center shadow-sm overflow-hidden border border-gray-100">
                                            <img src="/images/logo_cp_navbar.png" alt="Logo CP"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <p class="text-sm font-bodoni text-black">
                                            <span class="font-cinzel font-bold text-[#3674B5] mr-1">Concetta
                                                Photo</span>
                                            {{ reply.content }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Input Komentar -->
                        <div class="border-t border-gray-200 p-4 bg-gray-50 flex flex-col">
                            <div v-if="replyingTo"
                                class="flex items-center justify-between bg-gray-200 text-xs px-3 py-1 rounded-md mb-2 text-black font-bodoni">
                                <span>Replying to <strong>{{ replyingTo.user?.name || replyingTo.guest_name || 'Guest'
                                        }}</strong></span>
                                <button @click="cancelReply" class="text-gray-600 font-bold">✕</button>
                            </div>

                            <div v-if="!isAuth" class="mb-2">
                                <input type="text" v-model="guestName" placeholder="Your Name"
                                    class="w-full text-sm border-gray-300 rounded-md p-2.5 font-bodoni text-black placeholder-gray-400 focus:border-[#3674B5] focus:ring-[#3674B5]">
                            </div>

                            <div class="flex items-center">
                                <input type="text" v-model="commentText" placeholder="Add a comment..."
                                    class="flex-grow text-sm border-gray-300 rounded-md p-2.5 font-bodoni text-black placeholder-gray-400 focus:border-[#3674B5] focus:ring-[#3674B5]"
                                    @keyup.enter="submitComment(activePost)">
                                <button @click="submitComment(activePost)"
                                    class="ml-3 text-[#3674B5] font-bold text-sm font-cinzel tracking-widest disabled:opacity-40 transition-opacity"
                                    :disabled="!commentText || (!isAuth && !guestName)">POST</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Teleport>

    </section>
</template>

<script setup lang="ts">
import { ref, computed, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps<{
    posts: any[],
    section?: any,
    lang: 'id' | 'en'
}>();

const page = usePage();
const isAuth = computed(() => page.props.auth?.user != null);
const isAdmin = computed(() => page.props.auth?.user?.role === 'admin');

// Localization
const getLoc = (data: any, fallback: string = '') => {
    if (!data) return fallback;
    let parsed = typeof data === 'string' ? (data.startsWith('{') ? JSON.parse(data) : data) : data;
    return typeof parsed === 'object' ? (parsed[props.lang] || parsed['en'] || fallback) : parsed;
};

const locTitle = computed(() => getLoc(props.section?.title, 'Concettalk'));
const locContent = computed(() => getLoc(props.section?.content, 'Ikuti tren foto terbaru, bagikan momen, dan berinteraksi dengan komunitas kami.'));

const t = computed(() => ({
    more: props.lang === 'id' ? 'selengkapnya' : 'more',
    morePosts: props.lang === 'id' ? 'Selengkapnya' : 'View More'
}));

// Posts Initialization
const postsData = ref([...props.posts]);
const displayPosts = computed(() => postsData.value.slice(0, 7));
const hasMorePosts = computed(() => postsData.value.length > 7);

const guestName = ref('');
const likedPostsMap = ref<Record<number, boolean>>({});

const contentRef = ref<HTMLElement | null>(null);
const isVisible = ref(false);

onMounted(() => {
    if (!isAuth.value) {
        guestName.value = localStorage.getItem('concettalk_guest_name') || '';
    }

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) isVisible.value = true;
    }, { threshold: 0.1 });

    if (contentRef.value) observer.observe(contentRef.value);

    const storedLikes = JSON.parse(localStorage.getItem('concettalk_likes') || '{}');
    likedPostsMap.value = storedLikes;

    postsData.value.forEach(post => {
        if (!post.comments) post.comments = [];
        if (likedPostsMap.value[post.id]) {
            post.has_liked = true;
        }
    });
});

// Like Feature
const toggleLike = async (post: any) => {
    const isLiking = !post.has_liked;
    post.has_liked = isLiking;
    post.likes_count += isLiking ? 1 : -1;

    likedPostsMap.value[post.id] = isLiking;
    localStorage.setItem('concettalk_likes', JSON.stringify(likedPostsMap.value));

    try {
        await axios.post(`/concettalk/${post.id}/like`);
    } catch (e: any) {
        try {
            await axios.post(`/api/concettalk/${post.id}/like`);
        } catch (err: any) {
            post.has_liked = !isLiking;
            post.likes_count += isLiking ? -1 : 1;
            likedPostsMap.value[post.id] = post.has_liked;
            localStorage.setItem('concettalk_likes', JSON.stringify(likedPostsMap.value));

            if (err.response?.status === 429) {
                alert(props.lang === 'id' ? 'Terlalu cepat. Tunggu sebentar.' : 'Too fast. Please wait.');
            }
        }
    }
};

const handleDoubleClick = (post: any) => {
    post.showHeartAnim = true;
    setTimeout(() => { post.showHeartAnim = false; }, 800);
    if (!post.has_liked) toggleLike(post);
};

// Modal Handling
const activePost = ref<any>(null);
const commentText = ref('');
const replyingTo = ref<any>(null);

const openModal = (post: any) => {
    activePost.value = post;
    document.body.style.overflow = 'hidden';
};

const closeModal = () => {
    activePost.value = null;
    replyingTo.value = null;
    commentText.value = '';
    document.body.style.overflow = 'auto';
};

const setReply = (comment: any) => {
    replyingTo.value = comment;
    commentText.value = '';
};

const cancelReply = () => {
    replyingTo.value = null;
};

// Submit Comments
const submitComment = async (post: any) => {
    if (!commentText.value) return;
    if (!isAuth.value && !guestName.value) return;

    if (!isAuth.value) {
        localStorage.setItem('concettalk_guest_name', guestName.value);
    }

    const payload = {
        post_id: post.id,
        content: commentText.value,
        guest_name: guestName.value,
        parent_id: replyingTo.value?.id || null
    };

    let response;
    try {
        response = await axios.post('/concettalk/comment', payload);
    } catch (e: any) {
        try {
            response = await axios.post('/api/concettalk/comment', payload);
        } catch (err: any) {
            if (err.response?.status === 429) {
                alert(props.lang === 'id' ? 'Anda berkomentar terlalu cepat.' : 'You are commenting too fast.');
            }
            return;
        }
    }

    if (response && response.data) {
        if (!post.comments) post.comments = [];

        if (replyingTo.value) {
            if (!replyingTo.value.replies) replyingTo.value.replies = [];
            replyingTo.value.replies.push(response.data);
        } else {
            post.comments.unshift(response.data);
        }

        commentText.value = '';
        replyingTo.value = null;
    }
};

// Drag To Scroll Carousel
const carouselRef = ref<HTMLElement | null>(null);
const isDragging = ref(false);
let startX = 0, scrollLeft = 0;

const onMouseDown = (e: MouseEvent) => {
    if (!carouselRef.value) return;
    isDragging.value = true;
    startX = e.pageX - carouselRef.value.offsetLeft;
    scrollLeft = carouselRef.value.scrollLeft;
};
const onMouseLeave = () => isDragging.value = false;
const onMouseUp = () => isDragging.value = false;
const onMouseMove = (e: MouseEvent) => {
    if (!isDragging.value || !carouselRef.value) return;
    e.preventDefault();
    const x = e.pageX - carouselRef.value.offsetLeft;
    carouselRef.value.scrollLeft = scrollLeft - ((x - startX) * 1.5);
};
</script>

<style scoped>
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.heart-pop-enter-active {
    animation: pop-in 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.heart-pop-leave-active {
    animation: pop-out 0.4s ease-in forwards;
}

@keyframes pop-in {
    0% {
        transform: scale(0);
        opacity: 0;
    }

    50% {
        transform: scale(1.2);
        opacity: 1;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes pop-out {
    to {
        transform: scale(0);
        opacity: 0;
    }
}
</style>