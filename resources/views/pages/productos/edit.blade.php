<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <x-dashboard.banners.edit-banner />

    @if($errors->any())
        <x-dashboard.alert.alert />
    @endif



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4 py-5">
            <form class="" method="POST" action="{{ route('productos.update', ['producto' => $producto->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-3 md:gap-3">
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                            del Producto</label>
                        <input value="{{$producto->nombre}}" type="text" id="nombre" name="nombre" placeholder="Ingrese el Nombre que tendra este Producto"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                    </div>
                    <div class="mb-6">
                        <label for="precio"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input value="{{$producto->precio}}"  type="number" id="precio" name="precio" placeholder="Ingrese el Precio que tendra este Producto"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                        <input value="{{$producto->cantidad}}"  type="number" id="cantidad" name="cantidad" placeholder="Ingrese las Cantidades que tenga del Producto"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>
                <div class="mb-6">
                    <label
                        for="text"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <input value="{{$producto->categoria}}"  type="text" id="categoria" name="categoria" placeholder="Ingrese La categoria que tendra este Producto"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        >
                </div>

                <label for="image"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cambiar Imagen
                    del Producto</label>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Foto actual" width="100" class="py-2 px-2">

                <div class="flex items-center justify-center w-full mb-6">
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file" name="imagen">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> PNG, JPG or GIF(MAX.
                        ).</p>
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar<button>

                    <a href="{{ route('productos') }}" class="text-white bg-gray-400 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-3 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Cancelar</a>
                    </div>
                    </form>
        </div>
    </div>
</x-app-layout>
