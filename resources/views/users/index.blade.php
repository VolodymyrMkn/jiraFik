<x-layout>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <h2>Users</h2>
            </div>
        </section><!-- End Breadcrumbs -->
        <section id="team" class="team">

            <div class="container aos-init aos-animate" data-aos="fade-up">

                <header class="section-header">
                    <p>Our Users</p>
                </header>
                <div class="row gy-4">
                    @foreach($users as $user)
                        <div class="col-lg-4 col-md-6 align-items-stretch aos-init aos-animate"
                             data-aos="fade-up"
                             data-aos-delay="100"
                             onclick="location.href='{{ route('users.show', compact(['user'])) }}';" style="cursor:pointer;">
                            <div class="member">
                                <div class="member-img">
                                    <img src="{{ asset($user->user_photo) }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $user->name }}</h4>
                                    <span>{{ $user->role->title }}</span>
                                    <strong>Email:</strong> <a href="mailto:{{ $user->email }}" class="">{{ $user->email }}</a><br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                       {{ $users->links() }}
                    </div>
                </div>

            </div>

        </section>
    </main>

</x-layout>
