<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {{$current->name}}
            <p>Indice: {{$this->index}}</p>
            <p>Previous: @if ($this->previous)
                {{$this->previous->id}}
            @endif</p>
            <p>Next: @if ($this->next)
                {{$this->next->id}}
            @endif</p>
        </div>

        <div class="col-span-1 card">   
            <div class="card-body">
                <h1>{{$course->title}}</h1>
                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div class="">
                        <p>{{$course->teacher->name}}</p>
                        <a href="" class="text-blue-500">{{'@' . Str::slug($course->teacher->name,'')}}</a>
                    </div>

                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold" href="">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})" >{{$lesson->id}} @if ($lesson->completed)
                                            (Completado)
                                        @endif</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
