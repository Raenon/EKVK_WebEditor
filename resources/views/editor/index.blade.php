@extends('layouts.master')

@section('content')
		<div class="main-container">
			<div class="editor-container editor-container_classic-editor editor-container_include-word-count" id="editor-container">
				<div class="editor-container__editor">
                    <div id="editor"></div>
                </div>
				<div class="editor_container__word-count" id="editor-word-count"></div>
			</div>
		</div>
    <div class="container">
        <form action="{{ route('editor.update',$project) }}" method="POST">
            @csrf
            <button class="btn-click p-2" onclick="Save()">Mentés</button>
            <input id="getJson" value="" type="hidden" name="data">
        </form>
    </div>



@endsection
	<script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.umd.js" crossorigin></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/45.0.0/translations/hu.umd.js" crossorigin></script>
<script defer>
    function Save(){
        let titleTag = document.getElementsByTagName("h1");
        const titleText = titleTag[0].innerHTML;
        let pTag = document.getElementsByTagName("p");
        const pText = pTag[0].innerHTML;
        const obj = JSON.parse('{"title": "", "p": ""}');
        obj.title = titleText;
        obj.p = pText;
        document.getElementById("getJson").value = JSON.stringify(obj);
        console.log(document.getElementById("getJson").value);
    }
</script>
