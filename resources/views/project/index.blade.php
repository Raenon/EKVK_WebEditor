@extends('layouts.master')

@section('content')


<header>
    <h1>Dokumentumkezelő</h1>
    <div class="toolbar">
      <a href="{{ route('create') }}"><button class="btn-click">Új</button></a>
      <button class="btn-click" onclick="document.getElementById('upload').click()">Feltöltés</button>
      <button class="btn-click" onclick="downloadProjectList()">Mentés</button>
      <input type="file" id="upload" class="file-input" accept=".txt,.docx" onchange="handleUpload(event)" />
    </div>
  </header>

  <main>
    <div class="project-list" id="projectList">
      <h2>Projektek</h2>
      
    </div>
  </main>

  <script>
    const projectList = document.getElementById('projectList');
    let projects = JSON.parse(localStorage.getItem('projects') || '[]');

    function renderProjects() {
      projectList.innerHTML = '<h2>Projektek</h2>';
      projects.forEach((proj, index) => {
        const div = document.createElement('div');
        div.className = 'project-item';
        div.textContent = proj.name;
        div.onclick = () => {
          localStorage.setItem('currentProject', JSON.stringify(proj));
          /* window.location.href = 'editor.html'; */
        };
        projectList.appendChild(div);
      });
    }

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

    function downloadProjectList() {
      const blob = new Blob([JSON.stringify(projects)], { type: 'application/json' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'projektek.json';
      a.click();
      URL.revokeObjectURL(url);
    }

    function createNewProject() {
      const emptyProject = { name: 'Új dokumentum', content: '' };
      localStorage.setItem('currentProject', JSON.stringify(emptyProject));
      window.location.href = 'editor.html';
    }

    renderProjects();
  </script>



@endsection