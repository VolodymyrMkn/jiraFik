<x-layout>
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">
                <h2>Projects</h2>
            </div>
        </section>
        <section class="inner-page">
            <div class="container">
                <p>
                @foreach($projects as $project)
                    <div class="card mb-3">
                        <img src="{{ asset($project->image) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->description }}</p>
                            <a href="{{ route('projects.show', compact(['project']))}}" class="btn btn-secondary">Read
                                More</a>
                        </div>
                    </div>
                    @endforeach
                    </p>
            </div>
        </section>
    </main>
</x-layout>
