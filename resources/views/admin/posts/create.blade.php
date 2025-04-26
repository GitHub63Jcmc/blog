<x-layouts.admin>
    <div class="mb-4">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Posts
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.posts.index')}}">
                Nuevo
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.posts.store')}}" method="POST" class="bg-white px-6 py-8 dounded-lg shadow-lg space-y-4">
        @csrf
        <flux:input name="title" label="Título" value="{{old('title')}}" oninput="string_to_slug(this.value, '#slug')" />
        <flux:input name="slug" id="slug" label="Slug" value="{{old('slug')}}" />

        <flux:select label="Categoría" name="category_id">
            @foreach ($categories as $category)
                <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id')">
                    {{$category->name}}
                </flux:select.option>
            @endforeach
        </flux:select>

        <div class="flex justify-end">
            <flux:button type="submit" variant="primary">
                Guardar
            </flux:button>
        </div>
    </form>


</x-layouts.admin>

