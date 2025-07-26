<!-- Include Swiper.js CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Slider -->
<div class="max-w-7xl px-4 lg:px-6 lg:px-8 py-3 mx-auto">
    <div class="relative">
        <!-- Swiper -->
        <div class="swiper h-[30rem] md:h-[calc(100vh-106px)] bg-gray-100 rounded-2xl">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <video class="h-full w-full object-cover" src="https://media.w3.org/2010/05/sintel/trailer_hd.mp4"
                        muted autoplay></video>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <video class="h-full w-full object-cover" src="https://media.w3.org/2010/05/sintel/trailer_hd.mp4"
                        muted autoplay></video>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <video class="h-full w-full object-cover" src="https://media.w3.org/2010/05/sintel/trailer_hd.mp4"
                        muted autoplay></video>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="swiper-pagination"></div>



            <!-- Scroll Down Button -->
            <div class="scroll-down-btn">
                <span class="material-icons">keyboard_arrow_down</span>
            </div>
        </div>


    </div>
</div>
<!-- End Slider -->

<!-- Content After Slider -->
<div id="content" class="max-w-7xl px-4 lg:px-6 lg:px-8 py-3 mx-auto">
    
</div>

<!-- Include Swiper.js Script -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    /* Creative Navigation Buttons */
    .creative-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        width: 2.5rem;
        /* Smaller width */
        height: 2.5rem;
        /* Smaller height */
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .creative-nav:hover {
        transform: scale(1.2);
        /* Subtle hover effect */
        background-color: rgba(0, 0, 0, 0.8);
    }

    .creative-nav span {
        font-size: 1.5rem;
        /* Smaller icon size */
    }

    .prev-btn {
        left: 1rem;
    }

    .next-btn {
        right: 1rem;
    }

    /* Scroll Down Button */
    .scroll-down-btn {
        position: absolute;
        bottom: 1rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        width: 3rem;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
    }

    .scroll-down-btn:hover {
        transform: scale(1.1);
        background-color: rgba(0, 0, 0, 0.8);
    }

    .scroll-down-btn .material-icons {
        font-size: 2rem;
    }

    /* Add a subtle animation for the scroll-down button */
    .scroll-down-btn:hover span {
        animation: bounce 0.6s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .swiper-button-next:after,
    .swiper-rtl .swiper-button-prev:after {
        display: none !important
    }

    .swiper-button-prev:after,
    .swiper-rtl .swiper-button-next:after {
        display: none !important
    }
</style>

<script>
    // Initialize Swiper
    const swiper = new Swiper('.swiper', {
        loop: false, // Disable looping for a clear end
        autoplay: false, // Disable autoplay initially
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next', // Custom next button
            prevEl: '.swiper-button-prev', // Custom previous button
        },
    });

    // Attach 'ended' event to videos for slide control
    const slides = document.querySelectorAll('.swiper-slide video');
    const contentSection = document.getElementById('content');

    slides.forEach((video, index) => {
        video.addEventListener('ended', () => {
            if (index === slides.length - 1) {
                const offset = 100; // Adjust this value for your desired offset
                const contentPosition = contentSection.offsetTop + offset;

                window.scrollTo({
                    top: contentPosition,
                    behavior: 'smooth',
                });
            } else {
                swiper.slideNext();
            }
        });

        video.addEventListener('play', () => {
            swiper.autoplay.stop();
        });

        if (index === swiper.realIndex) {
            video.play();
        }
    });

    // Swiper slide change event
    swiper.on('slideChange', () => {
        slides.forEach((video, index) => {
            if (index === swiper.realIndex) {
                video.play();
            } else {
                video.pause();
                video.currentTime = 0;
            }
        });
    });

    // Scroll Down Button
    const scrollDownBtn = document.querySelector('.scroll-down-btn');
    scrollDownBtn.addEventListener('click', () => {
        const offset = 400; // Adjust for your desired offset
        const contentPosition = contentSection.offsetTop + offset;

        window.scrollTo({
            top: contentPosition,
            behavior: 'smooth',
        });
    });
</script>
