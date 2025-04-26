<x-layouts.admin>
    <div class="mb-4">
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{route('admin.dashboard')}}">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item href="{{route('admin.posts.index')}}">
                Posts
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Editar
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="relative mb-2">
            <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="https://img.freepik.com/vector-premium/vector-icono-imagen-predeterminado-pagina-imagen-faltante-diseno-sitio-web-o-aplicacion-movil-no-hay-foto-disponible_87543-11093.jpg" alt="">
            <div class="absolute top-8 right-8">
                <label class="bg-white px-2 py-2 rounded-lg cursor-pointer">
                    Cambiar Imagen
                    <input class="hidden" type="file" name="image" accept="image/*" onchange="preview_image(event, '#imgPreview')">
                </label>
            </div>
        </div>

        <div class="bg-white px-6 py-8 dounded-lg shadow-lg space-y-4">
            <flux:input name="title" label="Título" value="{{old('title', $post->title)}}" />
            <flux:input name="slug" label="Slug" value="{{old('slug', $post->slug)}}" />
    
            <flux:select label="Categoría" name="category_id">
                @foreach ($categories as $category)
                    <flux:select.option value="{{$category->id}}" :selected="$category->id == old('category_id', $post->category_id)">
                        {{$category->name}}
                    </flux:select.option>
                @endforeach
            </flux:select>
    
            <flux:textarea label="Resumen" name="excerpt">{{old('excerpt', $post->excerpt)}}</flux:textarea>
            <flux:textarea label="Cuerpo" rows="12" name="content">{{old('content', $post->content)}}</flux:textarea>
    
            <div>
                <p class="text-sm font-semibold">Estado</p>
                <label>
                    <input type="radio" name="is_published" value="0" @checked(old('is_published', $post->is_published) == 0)>
                    No Publicado
                </label>
                <label>
                    <input type="radio" name="is_published" value="1" @checked(old('is_published', $post->is_published) == 1)>
                    Publicado
                </label>
            </div>
    
            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">
                    Guardar
                </flux:button>
            </div>
        </div>
    </form>

</x-layouts.admin>

