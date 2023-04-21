<x-admin.layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Striped Full Width Table</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="col-md-4 p-0">
                                    <div class="card card-dark">
                                        <div class="card-header">
                                            <form action="{{ route('options.store') }}"
                                                  method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text"
                                                           name="title"
                                                           class="form-control">
                                                </div>
                                                <button class="btn btn-app bg-success m-0">
                                                    <i class="fas fa-plus"></i> Save site content
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

