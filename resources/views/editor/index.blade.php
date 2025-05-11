@extends('layouts.master')

@section('content')
    {{-- TODO: COPY THE FUCKING WORD  --}}
    {{-- TODO: WATCH HOW CKEDITOR IS WORKING IN LARAVEL --}}
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor editor-container_include-word-count"
            id="editor-container">
            <div class="editor-container__editor">
                <div id="editor"></div>
            </div>
            <div class="editor_container__word-count" id="editor-word-count"></div>
        </div>
    </div>

    <div class="container">
        <button onclick="Save()">Mentés</button>
    </div>



@endsection

<script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.umd.js" crossorigin></script>
<script src="https://cdn.ckeditor.com/ckeditor5-premium-features/45.0.0/ckeditor5-premium-features.umd.js" crossorigin></script>
<script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>

<script>
    function Save(){
        console.log('====================================');
        console.log("Fasza");
        console.log('====================================');
    }

</script>
