<div class="max-w-sm rounded overflow-hidden shadow-lg mx-0.5 dark:bg-blanc">
    <div class="px-6 py-4">
        @if($property->image)
            <img src="{{ image($property->image , 360, 200) }}" alt="">
        @endif
        <div class="font-semibold underline text-xl my-2"><a
                    href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">{{ $property->title }}</a>
        </div>
        <p class="text-gris-foncer text-justify line-clamp-3">
            {{ $property->description }}
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <span class="inline-block bg-gris-clair rounded-full px-3 py-1 text-sm  text-gris-foncer mr-2 mb-2">{{ $property->surface }} m² - {{ $property->city }} {{ $property->postal_code }}</span>
        <span class="inline-block bg-gris-clair rounded-full px-3 py-1 text-sm  text-gris-foncer mr-2 mb-2">{{ number_format($property->price, thousands_separator: '') }} €</span>
        @foreach($property->options as $option)
        <span class="inline-block bg-gris-clair rounded-full px-3 py-1 text-sm  text-gris-foncer mr-2 mb-2">{{ $option->name}}</span>
        @endforeach
    </div>
</div>