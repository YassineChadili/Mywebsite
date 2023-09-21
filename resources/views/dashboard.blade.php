<x-app-layout>
    <x-slot name="header">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welkom op mijn portfolio site!') }}
        </h2>
        <style>
            .dropbtn {
              background-color: black;
              color: white;
              padding: 11px;
              font-size: 16px;
              border: none;
              cursor: pointer;
            }
            .dropdown {
              position: relative;
              display: inline-block;
              margin-top: 30px
            }
            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f9f9f9;
              min-width: 100px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }
            .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
            }
            .dropdown-content a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-content {
              display: block;
            }
            .dropdown:hover .dropbtn {
              background-color: black;
            }
        </style>
        <div class="dropdown">
            <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="/">Homepagina</a>
                    <a href="/aboutme">About me</a>
                    <a href="projects">Mijn projecten</a>
                </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h1 style="margin-bottom: 20px">Projecten</h1>
                  <table class="table table-bordered">
                    <thead> 
                        <tr>
                            <th>Titel</th>
                            <th>Beschrijving</th>
                            <th>Afbeelding</th>
                            <th>Categorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td><img src="{{ $project->image }}" alt="Project Image" width=100px></td>
                                <td>{{ $project->category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
