<x-layout>
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <h2>Users</h2>
            </div>
        </section>
        <section id="team" class="team">
            <section id="about" class="about">
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    <div class="row gx-0">
                        <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate"
                             data-aos="fade-up" data-aos-delay="200">
                            <div class="content">
                                <form name="saveForm"
                                      method="POST"
                                      action="{{ route('users.update', ["user" => $user->id]) }}"
                                      enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                                    <input type="hidden" name="role" value="{{ $user->roles_id }}">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" required="required"
                                               value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" required="required"
                                               value="{{ $user->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <input type="file" class="form-control" name="user_photo"
                                               value="{{ asset($user->user_photo) }}" >
                                    </div>
                                    <div class="text-center text-lg-start">
                                        <a href="{{ route('users.index') }}"
                                           class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                            <span>Back</span>
                                            <i class="bi bi-arrow-left"></i>
                                        </a>
                                        <a href="#"
                                           class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center"
                                        onclick="event.preventDefault();if(document.querySelector('form[name=\'saveForm\']').checkValidity()) document.querySelector('form[name=\'saveForm\']').submit()">
                                            <span>Save</span>
                                            <i class="bi bi-save"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center aos-init aos-animate" data-aos="zoom-out"
                             data-aos-delay="200">
                            <img src="{{ asset($user->user_photo) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
</x-layout>
