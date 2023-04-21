@if($message = session('message'))
    <div id="toastsContainer" class="col-md-6">
    <div class="card card-default">
        <div class="card-body">
            <div class="alert alert-{{ session('type') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="removeToast()">×
                </button>
                <h5><i class="icon fas fa-check"></i></h5>
                {!! $message !!}
            </div>
        </div>
        </div>
    </div>
@endif

<script>
    function removeToast() {
        let toast = document.querySelector('#toastsContainer')
        if (toast) {
            toast.remove()
        }
    }

    setTimeout(removeToast, 5000);
</script>
