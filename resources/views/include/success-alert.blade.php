

    <!-- ~~~~~~~~~~~~~~ alert for any changes ~~~~~~~~~~~~~~~~~ -->
    @if (session('success'))
        <div class="alert alert-dismissible alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif
    <!-- ~~~~~~~~~~~~~~ alert for any changes ~~~~~~~~~~~~~~~~~ -->