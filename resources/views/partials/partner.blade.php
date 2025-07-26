<!-- Include Swiper.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<style>
    .before\:from-white::before {
        --tw-gradient-from: transparent !important;
        --tw-gradient-to: transparent !important;
    }

    .after\:from-white::after {
        --tw-gradient-from: transparent !important;
    }
</style>
<div class="max-w-7xl px-4 lg:px-6 lg:px-8 py-4 lg:py-4 mx-auto">
    <div
        class="relative py-6 md:py-10 overflow-hidden border-b border-gray-200 before:absolute before:top-0 before:start-0 before:z-10 before:w-20 before:h-full before:bg-gradient-to-r before:from-white before:to-transparent after:absolute after:top-0 after:end-0 after:w-20 after:h-full after:bg-gradient-to-l after:from-white after:to-transparent">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ asset('/storage/' . $partner->image) }}" alt="{{ $partner->name }}"
                            class="h-20 md:h-28 object-contain" />
                    </div>
                @endforeach
            </div>
            <!-- Add Navigation Buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- Include Swiper.js JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 5,
            spaceBetween: 20,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });
    });
</script>
