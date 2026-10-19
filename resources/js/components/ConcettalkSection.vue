<template>
    <section
        class="relative z-20 flex flex-col items-center justify-center w-full px-4 py-24 bg-[#3674B5] border-t border-white/20">

        <!-- Header -->
        <div class="text-center mb-12">
            <h2
                class="font-cinzel text-3xl md:text-5xl font-bold tracking-widest uppercase text-white drop-shadow-md mb-4">
                Concettalk
            </h2>
            <p class="font-bodoni text-white/80 max-w-xl mx-auto text-sm md:text-base">
                Ikuti tren foto terbaru, bagikan momen, dan berinteraksi dengan komunitas kami.
            </p>
        </div>

        <!-- Instagram-like Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto">

            <div v-for="post in posts" :key="post.id"
                class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
                <!-- Header Card -->
                <div class="flex items-center p-3 border-b border-gray-100">
                    <div
                        class="w-8 h-8 rounded-full bg-[#3674B5] flex items-center justify-center text-white font-bold text-xs">
                        A
                    </div>
                    <span class="ml-3 font-semibold text-sm text-gray-800">Admin_Concetta</span>
                </div>

                <!-- Image -->
                <img :src="post.image_path" class="w-full aspect-square object-cover" alt="Concettalk Feed" />

                <!-- Action Bar -->
                <div class="p-3">
                    <div class="flex gap-4 mb-2">
                        <!-- Like Button -->
                        <button @click="toggleLike(post)" class="transition-transform active:scale-90 outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                :class="post.has_liked ? 'text-red-500 fill-current' : 'text-gray-800'"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                :fill="post.has_liked ? 'currentColor' : 'none'">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </button>
                        <!-- Comment Icon -->
                        <button class="text-gray-800 outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </button>
                    </div>

                    <p class="font-bold text-sm text-gray-900 mb-1">{{ post.likes_count }} likes</p>

                    <!-- Caption -->
                    <p class="text-sm text-gray-800 mb-2">
                        <span class="font-semibold mr-1">Admin_Concetta</span>
                        {{ post.caption }}
                    </p>

                    <!-- Comments Display -->
                    <div class="mt-3 max-h-32 overflow-y-auto hide-scrollbar space-y-2">
                        <div v-for="comment in post.comments" :key="comment.id" class="text-xs">
                            <p class="text-gray-800">
                                <span class="font-semibold">{{ comment.user ? comment.user.name : comment.guest_name
                                    }}</span>
                                {{ comment.content }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Input Comment -->
                <div class="mt-auto border-t border-gray-100 p-3 flex items-center">
                    <input type="text" v-model="commentForms[post.id]" placeholder="Tambahkan komentar..."
                        class="flex-grow text-sm border-none focus:ring-0 px-0 py-1"
                        @keyup.enter="submitComment(post.id)">
                    <button @click="submitComment(post.id)" class="text-[#3674B5] font-semibold text-sm ml-2"
                        :disabled="!commentForms[post.id]">Post</button>
                </div>
            </div>

        </div>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';

const props = defineProps<{
    posts: any[] // Pastikan posts dikirim dari parent controller
}>();

const commentForms = ref<Record<number, string>>({});

const toggleLike = async (post: any) => {
    try {
        const response = await axios.post(`/concettalk/${post.id}/like`);
        if (response.data.status === 'liked') post.likes_count++;
        else post.likes_count--;
        post.has_liked = !post.has_liked; // asumsikan Anda menandai state ini dari backend
    } catch (e) { console.error(e); }
};

const submitComment = async (postId: number) => {
    if (!commentForms.value[postId]) return;
    try {
        const response = await axios.post('/concettalk/comment', {
            post_id: postId,
            content: commentForms.value[postId],
            guest_name: 'Guest_' + Math.floor(Math.random() * 1000) // Bisa di-custom dengan modal input nama
        });
        // Append komentar secara reaktif ke post (logika basic)
        const post = props.posts.find(p => p.id === postId);
        if (post) {
            if (!post.comments) post.comments = [];
            post.comments.push(response.data);
        }
        commentForms.value[postId] = '';
    } catch (e) { console.error(e); }
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
</style>