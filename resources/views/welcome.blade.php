@extends('HomeLayout')
@section('content')
<section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>အလွတ်ကျက်စနစ်မှရုန်းထွက်ပြီး လက်တွေ့အသုံးချ သဘောပေါက်နားလည်းနိုင်စွမ်းကို လေ့ကျင့်ပေးမည့် ပညာရေးဆီသို့</h2>
      <a href="{{route('loginPage')}}" class="btn-get-started">Log In</a>
    </div>
  </section><!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                    <img src="{{ asset('Mentor/assets/img/about.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Our school is founded on 2022 by <a href="https://www.facebook.com/htun.linn.7927">Saya Tun Linn(ရွှေဓာတု)</a>, an expieriencing teacher,teaching Chemistry for many years based on expiremental apprach.</h3>
                    <p class="fst-italic">
                        In our school, we can provide expiremental educational adn high quality service with fair pricing since we focus on the quality of real education and not just making the child to keep remembering by heart.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Ferry service is also available.</li>
                        <li><i class="bi bi-check-circle"></i> School is located in quiet and green place.
                        </li>
                        <li><i class="bi bi-check-circle"></i>Having extra language lessons.</li>
                    </ul>
                    <p>
                       U can track your child's progress on our website,just need to have a parent account, can be created in school's reception.
                    </p>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $studentCount }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Students</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Courses</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Events</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Trainers</p>
                </div>

            </div>

        </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Why Choose Mentor?</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad
                            corporis.
                        </p>
                        <div class="text-center">
                            <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Corporis voluptates sit</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Ullamco laboris ladore pan</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Labore consequatur</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <h2>Currently Available Grades</h2>
                <hr />
                @foreach ($grades as $grade)
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box">
                            <h3>Grade <a href="">{{ $grade->grade }}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Posts</h2>
                <p>Popular Posts</p>
            </div>

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                             @if (str_ends_with($post->media, '.jpg') ||
                                                str_ends_with($post->media, '.png') ||
                                                str_ends_with($post->media, '.jpeg') ||
                                                str_ends_with($post->media, '.gif'))
                                            <img src="{{ asset('storage/posts/'.$post->media) }}" class="img-fluid" alt="Image">
                                        @elseif (str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.mkv'))
                                            <video src="{{ asset('storage/posts/'.$post->media) }}" controls></video>
                                        @elseif (str_ends_with($post->media, '.pdf'))
                                            <embed src="{{ asset('storage/posts/'.$post->media) }}" type="application/pdf" width="100%"
                                                height="600px">
                                        @endif
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{ $post->author_name }}</h4>
                                    <p class="price">{{ $post->created_at->format('j-F-Y') }}</p>
                                </div>

                                <h3><a href="course-details.html">{{$post->title}}</a></h3>
                                <p>{{   Str::words($post->description, 20)}}</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        @if (str_ends_with($post->media, '.jpg') ||
                                                str_ends_with($post->media, '.png') ||
                                                str_ends_with($post->media, '.jpeg') ||
                                                str_ends_with($post->media, '.gif'))
                                            <img src="{{ asset('storage/posts/'.$post->media) }}" alt="Image">
                                        @elseif (str_ends_with($post->media, '.mp4') || str_ends_with($post->media, '.webm') || str_ends_with($post->media, '.mkv'))
                                            <video src="{{ asset('storage/posts/'.$post->media) }}" controls></video>
                                        @elseif (str_ends_with($post->media, '.pdf'))
                                            <embed src="{{ asset('storage/posts/'.$post->media) }}" type="application/pdf" width="100%"
                                                height="600px">
                                        @endif
                                        <span>Antonio</span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bi bi-eye"></i>&nbsp;{{ $post->view_count }}
                                        &nbsp;&nbsp;

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                @endforeach

            </div>

        </div>
    </section><!-- End Popular Courses Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Walter White</h4>
                            <span>Web Development</span>
                            <p>
                                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat
                                qui aut aut aut
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Sarah Jhinson</h4>
                            <span>Marketing</span>
                            <p>
                                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum
                                temporibus
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>William Anderson</h4>
                            <span>Content</span>
                            <p>
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro
                                des clara
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Trainers Section -->
@endsection
