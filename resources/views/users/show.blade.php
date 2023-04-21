<x-layout>
        <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <h2>Users</h2>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="team" class="team">
            <section id="about" class="about">
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    <x-toasts.simpleSite/>
                    <div class="row gx-0">
                        <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="content">
                                <h2>{{ $user->name }}</h2>
                                <h5>{{ $user->role->title }}</h5>
                                <p><a href="mailto:{{ $user->email }}" class="">{{ $user->email }}</a></p>
                                <div class="text-center text-lg-start">
                                    <a href="{{ route('users.index') }}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                        <span>Back</span>
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                    @auth()
                                        @if(auth()->id()==$user->id)
                                                <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                                    <span>Edit</span>
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                          @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out" data-aos-delay="200">
                            <img src="{{ asset($user->user_photo)  }}" class="img-fluid" alt="">
                        </div>

                    </div>
                </div>

            </section>

        </section>
    </main>

</x-layout>
