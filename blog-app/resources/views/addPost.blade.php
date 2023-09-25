<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Add Post</title>

    <style>
        body {
            background-color: lightgrey;
        }
    </style>
</head>
<body>
    @include('navbar')

    <div class="container">
        <h2 class="mb-4">Create your new Blog post</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('store-post') }}">
            @csrf
            <div class="form-group">
                <label for="title">Cím:</label>
                <input type="text" class="form-control" id="title" name="title" maxlength="100" style="width: 50%" required>
            </div>
            <div class="form-group mb-4">
                <label for="content">Tartalom:</label>
                <textarea class="form-control" id="content" name="content" rows="5" maxlength="4000" required></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="select2">Címkék:</label>
                <select id="select2" class="js-example-basic-multiple" name="tags[]" multiple="multiple" style="width: 50%">
                    @foreach($allTags as $tag)
                        <option value="{{ $tag->t_id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Create</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                maximumSelectionLength: 5,
                tags: true,
                tokenSeparators: [',', ' '],
                createTag: function (params) {
                    var term = $.trim(params.term);

                    if (term === '') {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true // add additional parameters
                    }
                }
            });
        });

        // ajax: {
        //     url: '/api/tags', // Állítsd be a helyes URL-t a saját Laravel API-dhoz
        //     dataType: 'json',
        //     delay: 250,
        //     processResults: function (data) {
        //         return {
        //             results: $.map(data, function (item) {
        //                 return {
        //                     text: item.name, // Az adatbázisból származó címke nevének megjelenítése
        //                     id: item.id // Az adatbázisból származó címke azonosítója
        //                 }
        //             })
        //         };
        //     },
        //     cache: true
        // },
    </script>
</body>
</html>






