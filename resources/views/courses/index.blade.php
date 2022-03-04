<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/cursos/code-g307372a36_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Los mejores cursos </h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis impedit neque fuga repellat dolorum! Et, autem corporis provident ipsa quos corrupti voluptatibus eligendi veritatis, explicabo impedit iste aut quibusdam. Dolor.</p>
                
                
                @livewire('search')



            </div>     
        </div>
    </section>{{-- PORTADA --}}

    @livewire('course-index')
</x-app-layout>