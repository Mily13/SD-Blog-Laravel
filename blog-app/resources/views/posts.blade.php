<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@php
    use Illuminate\Support\Str;
@endphp

@include('navbar')

<style>
    body {
        background-color: lightgrey;
    }
    a.card-title {
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: black;
    }
    a.card-title:hover{
        color: goldenrod;
    }
</style>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="container mt-1">
    <button class="btn btn-warning btn-lg mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formCollapse"
            aria-expanded="false" aria-controls="formCollapse">Blogok szűrése<i class="bi bi-caret-down-fill ms-1"></i>
    </button>

    <div class="collapse" id="formCollapse">
        <form method="GET" action="{{ route('filter-post') }}" class="row g-3">
            @csrf
            <div class="col-md-5">
                <label for="CimkeInput" class="form-label"><b>Címkék:</b></label>
                <select class="form-select mb-3" name="tag" aria-label="Default select example">
                    @foreach($allTags as $tag)
                        <option value="{{ $tag->t_id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-warning">Szűrés<i class="bi bi-search ms-2"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('SD_Blog.jpg') }}" class="card-img" alt="Picture">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="{{ route('show-post', ['id' => $post->p_id]) }}" class="card-title">{{ $post->title }}</a>
                            <p class="card-text mt-3">{{Str::limit($post->content, 400) }}</p>
                            <p class="card-text"><b>Tags:</b>
                                @foreach ($post->tags as $tag)
                                    {{ $tag->name . ", "}}
                                @endforeach
                            </p>
                            <div class="btn-group">
                                <form method="POST" action="{{ route('delete-post', ['id' => $post->p_id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger me-2">Törlés</button>
                                </form>
                                <form method="GET" action="{{ route('edit-post', ['id' => $post->p_id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-warning">Módosítás</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



