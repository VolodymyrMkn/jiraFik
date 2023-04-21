<x-layout>
    <section class="breadcrumbs">
        <div class="container">
            <h2>Update project</h2>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Update project</h1>
                <div class="entries">
                    <form method="POST"
                          action="{{ route('projects.update', ["project" => $project->id]) }}"
                          enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                        <div class="mb-3">
                            <label class="form-label">Title Project</label>
                            <input type="text" class="form-control" name="title" required="required"
                                   value="{{ $project->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description Project</label>
                            <input type="text" class="form-control" name="description" required="required"
                                   value="{{ $project->description }}">
                        </div>
                        <div class="mb-3">
                            <input id="image" type="file" class="form-control" name="image">
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
                                    <td>
                                        <div class="dropdown">
                                            <select class="form-select" name="status[][{{ $task->id }}]" id="myDropdown" onchange="saveSelectedValue()">
                                                @foreach($statuses as $status)
                                                        <option @if($status->id == $task->status_id) selected @endif value="{{ $status->id }}">{{ $status->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <button type="button" onclick="addInput()" class="btn btn-secondary d-block my-2 w-100">Tasks
                        </button>
                        <div id="input_container"></div>
                        <button type="submit" class="btn btn-primary">Update project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<script>
    var input_count = 0;

    function addInput() {
        input_count++;
        var input_container = document.getElementById("input_container");

        var input_div = document.createElement("div");
        input_div.classList.add("mb-3");

        var input_element = document.createElement("input");
        input_element.setAttribute("type", "text");
        input_element.setAttribute("name", "text_input[][" + input_count + "]");
        input_element.classList.add("form-control");

        var delete_button = document.createElement("button");
        delete_button.setAttribute("type", "button");
        delete_button.setAttribute("class", "btn btn-danger float-end");
        delete_button.innerHTML = "Delete";
        delete_button.onclick = function () {
            input_container.removeChild(input_div);
            input_count--;
        };

        input_div.appendChild(input_element);
        input_div.appendChild(delete_button);
        input_container.appendChild(input_div);
    }
</script>

<script>
    var selectedValue = '';

    function saveSelectedValue() {
        var dropdown = document.getElementById('myDropdown');
        selectedValue = dropdown.value;    }
</script>
