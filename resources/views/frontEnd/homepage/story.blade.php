<?php
$StoryLimit = 6; // 0 = all
$Story = Helper::Topics(Helper::GeneralWebmasterSettings("home_content8_section_id"), 0, $StoryLimit, 1);
?>
@if(count($Story)>0)
{
    dd($Story);
}
@else
@endif
<section id="services" class="services">
    <div class="container">
        <div class="row">
            <div class="stories-container">
                {{-- <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/1-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/2-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/3-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/4-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/5-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/6-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/7-thumb.png')}}" alt="" />
                </div>

                <div class="content">
                    <img src="{{ asset('public/assets/frontend/images/news/8-thumb.png')}}" alt="" />
                </div> --}}
            </div>

            <div class="story-full">
                <div class="content">
                    <div class="close-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <div class="left-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>

                    <img src="images/1.png" alt="" />

                    <div class="right-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fff"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>

                    <div class="title">Test Title</div>
                </div>
            </div>
        </div>

    </div>
</section>
