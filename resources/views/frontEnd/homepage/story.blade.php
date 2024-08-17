<?php
$HomeStoriesLimit = 12; ; // 0 = all
$HomeStories = Helper::Topics(Helper::GeneralWebmasterSettings("home_content8_section_id"), 0, $HomeStoriesLimit, 1);
?>
@if(count($HomeStories)>0)
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>{{ __('frontend.homeContents8Title') }}</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="stories-container">
                    <?php
                    $section_url = "";
                    $ph_count = 0;
                    ?>
                    @foreach($HomeStories as $HomePhoto)
                        <?php
                        if ($HomePhoto->$title_var != "") {
                            $title = $HomePhoto->$title_var;
                        } else {
                            $title = $HomePhoto->$title_var2;
                        }

                        if ($section_url == "") {
                            $section_url = Helper::sectionURL($HomePhoto->webmaster_id);
                        }
                        ?>
                        @if($ph_count<$HomeStoriesLimit)
                        <div class="content" id="content">
                            <img src="{{ URL::to('public/uploads/topics/'.$HomePhoto->photo_file) }}" alt="{{ $title }}" />
                        </div>
                        @else
                            @break
                        @endif
                        <?php
                        $ph_count++;
                        ?>
                    @endforeach
                </div>
                {{-- <div class="stories-container">
                    <div class="content">
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
                    </div>
                </div> --}}

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

                        <?php
                        $section_url = "";
                        $ph_count = 0;
                        ?>
                        @foreach($HomeStories as $HomePhoto)
                            @if($ph_count<$HomeStoriesLimit)
                                <img src="{{ URL::to('public/uploads/topics/'.$HomePhoto->photo_file) }}" alt="{{ $title }}" />
                            @else
                                @break
                            @endif
                            <?php
                            $ph_count++;
                            ?>
                        @endforeach
                        {{-- <img src="images/1.png" alt="" /> --}}

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
@endif
