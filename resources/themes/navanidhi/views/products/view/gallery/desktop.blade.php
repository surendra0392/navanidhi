<!-- For large screens (desktop) -->
<div class="sticky top-28 flex h-max gap-5 lg:gap-6 max-1180:hidden w-full max-w-[580px]">
    <!-- Product Image and Videos Thumbnails Slider (Only if multiple media items exist) -->
    <div 
        class="flex flex-col items-center gap-2.5 min-w-[80px] max-w-[80px] max-h-[540px]"
        v-if="lengthOfMedia > 1"
    >
        <!-- Arrow Up -->
        <button
            type="button"
            class="flex h-7 w-7 items-center justify-center rounded-full text-[#6E7765] hover:text-[#0F4D2E] hover:bg-black/5 transition-colors focus:outline-none"
            aria-label="@lang('shop::app.components.products.carousel.previous')"
            @click="swipeDown"
        >
            <span class="icon-arrow-up text-lg"></span>
        </button>

        <!-- Swiper Container -->
        <div
            ref="swiperContainer"
            class="flex flex-col max-h-[460px] gap-2.5 overflow-auto scroll-smooth scrollbar-hide py-1"
        >
            <template v-for="(media, index) in [...media.images, ...media.videos]">
                <div
                    v-if="media.type == 'videos'"
                    :class="`relative aspect-square w-[76px] h-[76px] cursor-pointer rounded-xl overflow-hidden border transition-all duration-200 ${isActiveMedia(index) ? 'border-2 border-[#0F4D2E] ring-2 ring-[#0F4D2E]/20 shadow-sm' : 'border-[#DCD3C3] hover:border-[#0F4D2E]/60'}`"
                    @click="change(media, index)"
                    tabindex="0"
                >
                    <video
                        class="w-full h-full object-cover"
                        alt="{{ $product->name }}"
                    >
                        <source
                            :src="media.video_url"
                            type="video/mp4"
                        />
                    </video>
                </div>

                <div
                    v-else
                    :class="`relative aspect-square w-[76px] h-[76px] cursor-pointer rounded-xl overflow-hidden border bg-[#FDFBF7] transition-all duration-200 ${isActiveMedia(index) ? 'border-2 border-[#0F4D2E] ring-2 ring-[#0F4D2E]/20 shadow-sm' : 'border-[#DCD3C3] hover:border-[#0F4D2E]/60'}`"
                    tabindex="0"
                    @click="change(media, index)"
                >
                    <img
                        class="w-full h-full object-cover"
                        :src="media.small_image_url"
                        alt="{{ $product->name }}"
                        width="76"
                        height="76"
                        loading="lazy"
                    />
                </div>
            </template>
        </div>

        <!-- Arrow Down -->
        <button
            type="button"
            class="flex h-7 w-7 items-center justify-center rounded-full text-[#6E7765] hover:text-[#0F4D2E] hover:bg-black/5 transition-colors focus:outline-none"
            aria-label="@lang('shop::app.components.products.carousel.next')"
            @click="swipeTop"
        >
            <span class="icon-arrow-down text-lg"></span>
        </button>
    </div>

    <!-- Main Product Stage Display -->
    <div class="flex-1 w-full">
        <!-- Shimmer Placeholder -->
        <div
            class="aspect-square w-full max-w-[520px] rounded-2xl bg-zinc-100 shimmer border border-[#DCD3C3]"
            v-show="isMediaLoading"
        ></div>

        <!-- Actual Main Media Frame -->
        <div
            class="relative aspect-square w-full max-w-[520px] rounded-2xl bg-[#FDFBF7] border border-[#DCD3C3] overflow-hidden shadow-[0_4px_20px_-4px_rgba(15,77,46,0.08)] p-4 flex items-center justify-center group"
            v-show="! isMediaLoading"
        >
            <!-- Botanical Badge Overlay -->
            <div class="absolute top-4 left-4 z-10 pointer-events-none">
                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#0F4D2E] text-white shadow-sm">
                    100% Pure Botanical
                </span>
            </div>

            <!-- Zoom Hint Overlay Button -->
            <button
                type="button"
                class="absolute bottom-4 right-4 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-white/90 text-[#1C2A22] shadow-sm hover:bg-white hover:text-[#0F4D2E] transition-all duration-200 opacity-80 group-hover:opacity-100 cursor-pointer"
                aria-label="Zoom image"
                @click="isImageZooming = !isImageZooming"
            >
                <span class="icon-search text-base"></span>
            </button>

            <!-- Main Image -->
            <img
                class="w-full h-full object-contain rounded-xl transition-transform duration-500 group-hover:scale-105 cursor-zoom-in"
                :src="baseFile.path"
                v-if="baseFile.type == 'image'"
                alt="{{ $product->name }}"
                width="500"
                height="500"
                loading="eager"
                fetchpriority="high"
                @click="isImageZooming = !isImageZooming"
            />

            <!-- Main Video -->
            <video
                class="w-full h-full object-contain rounded-xl"
                controls
                v-if="baseFile.type == 'video'"
                :key="baseFile.path"
            >
                <source
                    :src="baseFile.path"
                    type="video/mp4"
                />
            </video>
        </div>
    </div>
</div>
