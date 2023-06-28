<x-app-layout>
    <div class="bg-blanc p-5 mb-5 text-center dark:bg-noir dark:text-blanc">
{{--        @if($user->email_verified_at)--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Email validé') }}--}}
{{--            </x-primary-button>--}}
{{--        @else--}}
{{--            <x-danger-button>--}}
{{--                <a class="underline" href="{{ route('verification.notice') }}">{{ __('Email non validé ') }}Cliquer sur ce lien</a>--}}
{{--            </x-danger-button>--}}
{{--        @endif--}}
        <div class="container mx-auto">
            <h1 class="my-3 font-bold text-2xl underline">Agende de Périgueux</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id molestiae nesciunt nisi officia
                quaerat rerum soluta unde veritatis. Adipisci
                aut exercitationem itaque porro soluta vitae voluptatem? Aliquid architecto inventore nostrum.</p>
        </div>
    </div>

    <div class="container mx-auto">
        <h2 class="dark:text-blanc font-bold text-3xl my-5 underline">Nos derniers biens</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach($properties as $property)
                <div class="my-3">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>