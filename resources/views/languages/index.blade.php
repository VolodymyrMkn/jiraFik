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
                                        <th>Language</th>
                                        <th>Slug</th>
                                        <th>Sort</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($languages as $language)
                                        <tr>
                                            <td>{{ $language->id }}</td>
                                            <td>{{ $language->title }}</td>
                                            <td>{{ $language->slug }}</td>
                                            @if(!isset($noSort))
                                                <td><input type="text" name="sort[]" value="{{ $language->id }}" hidden>
                                                    <span class="handle">
                                                          <i class="fas fa-ellipsis-v"></i>
                                                          <i class="fas fa-ellipsis-v"></i>
                                                    </span>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('languages.create') }}" class="btn btn-app bg-success m-0">
                            <i class="fas fa-plus"></i> Create Language
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
