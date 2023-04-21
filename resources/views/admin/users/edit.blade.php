<x-admin.layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">ADD USER</h3>
                            </div>

                            <div class="card-body p-0">
                                <div class="col-md-6 p-0">
                                    <div class="card card-dark">
                                        <div class="card-header">
                                            <form action="{{ route('admin.users.update', ['user' => $user]) }}"
                                                  method="post"
                                                  enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="form-group">
                                                    <label for="title">Name</label>
                                                    <input type="text"
                                                           name="name"
                                                           value="{{ $user->name }}"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Email</label>
                                                    <input type="text"
                                                           name="email"
                                                           value="{{ $user->email }}"
                                                           class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Password</label>
                                                    <input type="text"
                                                           name="password"
                                                           placeholder="leave empty to not change password"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">User photo</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="user_photo" class="custom-file-input"
                                                               value="{{ $user->user_photo }}">
                                                        <label class="custom-file-label">Choose photo</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Role</label>
                                                    <div class="dropdown">
                                                        <select class="form-control" name="role">
                                                            @foreach($roles as $role)
                                                                <option @if($role->id == $user->roles_id) selected
                                                                        @endif value="{{ $role->id }}">{{ $role->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <br>
                                                    <button type="submit" class="btn btn-app bg-info m-0">
                                                        <i class="fas fa-save"></i> Update User
                                                    </button>
                                                    <button type="button" class="btn bg-danger btn-app m-0"
                                                            onclick="sendForm('deleteForm')" data-target="#modal-delete">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>

                                            <form action="{{ route('admin.users.destroy', $user->id) }} "
                                                  id="deleteForm"
                                                  method="POST">
                                                @csrf
                                                @method('delete')
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

<script>
    function sendForm(id) {
        document.querySelector('#' + id).submit()
    }
</script>
