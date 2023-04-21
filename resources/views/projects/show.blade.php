<x-layout>
    <section class="breadcrumbs">
        <div class="container">
            <h2>Projects</h2>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{ asset($project->image) }}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a>{{ $project->title }}</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{ $project->users->name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html">
                                        <time datetime="2020-01-01">{{ $project->created_at }}</time>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <blockquote>
                                <p>{{ $project->description }}</p>
                            </blockquote>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tasks</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            @foreach($project->tasks as $index => $task)
                                <tbody>
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->status->title }}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        @auth()
                        <div class="entry-footer">
                            <i class="bi bi-trash"></i>
                            <ul class="cats">
                                <li><a href="#" onclick="sendForm('deleteForm')">DELETE</a></li>
                            </ul>
                            <i class="bi bi-arrow-repeat"></i>
                            <ul class="tags">
                                <li><a href="{{ route('projects.edit', compact(['project']))}}">Update</a></li>
                            </ul>
                            <form action="{{ route('projects.destroy', compact(['project'])) }} "
                                  id="deleteForm"
                                  method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                        @endauth
                    </article>
                </div>
            </div>
        </div>
    </section>
</x-layout>

<script>
    function sendForm(id) {
        document.querySelector('#' + id).submit()
    }
</script>
