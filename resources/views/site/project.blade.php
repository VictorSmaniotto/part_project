@extends('layouts.project')



@section('content')
   

    <livewire:project-show :projectId="$project->id" />
    <!-- Renderização do PDF -->
    <div class="w-2/3 p-4">
        <iframe src="{{ asset('storage/' . $project->file_path) }}" class="w-full h-screen border-t rounded-lg shadow"></iframe>
    </div>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
   
@endsection