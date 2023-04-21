<x-layout>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <h2>Projects</h2>
            </div>
        </section><!-- End Breadcrumbs -->

        <section class="inner-page">

            <div class="container">
                <div class="blog-details">
                        <a href="{{ route('tasks.index', ['s'=> 1]) }}" class="btn btn-secondary">new</a>
                        <a href="{{ route('tasks.index', ['s'=> 2]) }}" class="btn btn-secondary">at work</a>
                        <a href="{{ route('tasks.index', ['s'=> 3]) }}" class="btn btn-secondary">done</a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Project</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    @foreach($tasks as $index => $task)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->projects->title }}</td>
                            <td>{{ $task->status->title }}</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </section>

    </main>

</x-layout>
