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
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($options as $option)
                                        <tr>
                                            <td>{{ $option->id }}</td>
                                            <td>{{ $option->title }}</td>
                                            <td>{{ $option->slug }}</td>
                                            <td class="p-1">
                                                <a href="{{ route('options.edit', compact(['option'])) }}" type="button" class="btn btn-default">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('options.create') }}" class="btn btn-app bg-success m-0">
                            <i class="fas fa-plus"></i> Content Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

