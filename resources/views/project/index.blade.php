@extends('layouts.master')

@section('content')


<header class='m-5'>
    <h1>Dokumentumkezelő</h1>
    <div class="toolbar">


        <a href="{{ route('projectPage.create') }}"><button class="btn-click">Új</button></a>
      <button class="btn-click" onclick="document.getElementById('upload').click()">Feltöltés</button>
      <input type="file" id="upload" class="file-input" accept=".txt,.docx" onchange="handleUpload(event)" />
    </div>
  </header>

  <main>
    <div class="m-5 project-list" id="projectList">
      <h2 class="m-2 mb-3"><strong>Projektek:</strong></h2>
        @foreach ($projects as $project)
                    <form action="{{ route('editor.index', ['project' => $project['id']]) }}"  method="POST">
                     @csrf
                     <button class=" m-1 project-item btn h-100 w-100 text-left" >
                        {{ $project['project_name'] }}
                        </button>
                    </form>
        @endforeach
    </div>
  </main>

  <script>
    const projectList = document.getElementById('projectList');
    let projects = JSON.parse(localStorage.getItem('projects') || '[]');

    function handleUpload(event) {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = () => {
        const content = reader.result;
        const name = file.name.replace(/\.[^/.]+$/, '');
        projects.push({ name, content });
        localStorage.setItem('projects', JSON.stringify(projects));
        renderProjects();
      };
      reader.readAsText(file);
    }


  </script>



@endsection
