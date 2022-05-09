@if(count($tagsCloud) != 0)
    <div class="col-md-4">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Теги</h4>
            @include('tags', ['tags' => $tagsCloud])
        </div>
    </div>
@endif
