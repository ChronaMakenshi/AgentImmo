@if(session('success'))
    <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-vert" role="alert">
        <span class="font-medium">{{session('success')}}</span>
    </div>
@endif
@if(session('danger'))
    <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-rouge-clair" role="alert">
        <span class="font-medium">{{session('danger')}}</span>
    </div>
@endif
{{--            Pour trouver les erreurs d'entrée--}}
{{--            @if($errors->any())--}}
{{--                <div class="p-4 mb-4 text-sm text-blanc rounded-lg bg-rouge-clair" role="alert">--}}
{{--                    <span class="font-medium">--}}
{{--                    @foreach($errors->all() as $error) --}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            @endif--}}