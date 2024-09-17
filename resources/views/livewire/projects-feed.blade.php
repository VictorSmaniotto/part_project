<div class="w-full">

    @foreach ($projects as $project)
        
    <article class="p-4 m-4 transition bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-lg sm:p-6">
        <span class="inline-block p-2 text-white bg-blue-600 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
        </span>

        <a href="{{ route('projects.show', $project->id) }}">
            <h3 class="mt-0.5 text-lg font-medium text-gray-900">
            {{ $project->title }}
            </h3>
        </a>
        

        <p class="w-full mt-2 text-gray-500 line-clamp-3 text-sm/relaxed">
           {{ $project->description }}
        </p>
        

        <a href="{{ route('projects.show', $project->id) }}" class="inline-flex items-center gap-1 mt-4 text-sm font-medium text-blue-600 group">
           Conheça o projeto

            <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                &rarr;
            </span>
        </a>
    </article>
    @endforeach

</div>
