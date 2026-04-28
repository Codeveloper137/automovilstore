{{-- packages/Webkul/Shop/src/Resources/views/components/categories/carousel.blade.php --}}
@props([
'title' => '',
'categories' => collect(),
'navigationLink' => '#',
])

<div class="kv-categories-carousel">
  @if ($title)
  <h2 class="kv-section-title">{{ $title }}</h2>
  @endif

  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse ($categories as $category)
    <a href="{{ $category->url_path ? url($category->url_path) : ($category->url ?? '#') }}" class="killa-category-card bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:-translate-y-1 transition-transform duration-300 flex flex-col">
      {{-- Imagen --}}
      <div class="h-48 bg-gray-50 relative overflow-hidden">
        @php
        $image = $category->banner_url
        ?? $category->image_url
        ?? ($category->image ? asset('storage/' . $category->image) : null);
        @endphp

        @if ($image)
        <img src="{{ $image }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
        @else
        <div class="flex items-center justify-center h-full opacity-20">
          <span class="text-3xl font-black uppercase">{{ $category->name }}</span>
        </div>
        @endif
      </div>

      {{-- Info --}}
      <div class="p-5 flex flex-col flex-grow">
        <h3 class="font-black text-gray-900 uppercase text-base leading-none mb-2">
          {{ $category->name }}
        </h3>
        @if (!empty($category->description))
<p class="text-gray-400 text-xs leading-relaxed flex-grow">
    {!! html_entity_decode(strip_tags($category->description)) !!}
</p>
        @endif
        <span class="mt-3 text-blue-600 font-bold text-xs uppercase tracking-widest">
          Ver Colección →
        </span>
      </div>
    </a>
    @empty
    <p class="col-span-4 text-center text-gray-400 py-10">Sin categorías por mostrar.</p>
    @endforelse
  </div>

  @if ($navigationLink && $navigationLink !== '#')
  <div class="text-center mt-8">
    <a href="/collections" class="inline-block border border-gray-300 text-gray-700 px-8 py-3 rounded-full text-sm font-bold hover:bg-black hover:text-white transition-colors">
      Ver todas las categorías
    </a>
  </div>
  @endif

</div>
