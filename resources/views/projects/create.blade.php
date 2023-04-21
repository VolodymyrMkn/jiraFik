<x-layout>
    <section class="breadcrumbs">
        <div class="container">
            <h2>Create Project</h2>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1>Create project</h1>
                <div class="entries">
                    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                        <div class="mb-3">
                            <label class="form-label">Title Project</label>
                            <input type="text" class="form-control" name="title" required="required">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description Project</label>
                            <input type="text" class="form-control" name="description" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <button type="button" onclick="addInput()" class="btn btn-secondary d-block my-2 w-100">Tasks
                        </button>
                        <div id="input_container"></div>
                        <button type="submit" class="btn btn-primary">Save project</button>
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


