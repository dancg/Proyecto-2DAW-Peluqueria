<x-app-layout>
    <x-miscomponentes.tablas>
        <main class="text-center">
            <nav aria-label="Migas de Pan (Breadcrumbs)" class="mb-2 ml-2">
                <ol class="list-none p-0 inline-flex">
                    <li>Inicio</li>
                    <li class="mx-2">
                        <i class="fa-solid fa-chevron-right "></i>
                    </li>
                    @auth
                        <li>
                            @if (!auth()->user()->is_admin)
                                <a data-tooltip-target="tooltip-usuario"
                                    href="{{ Storage::url('pdfs/Manual_Usuario_Peluquerias_Dbarb.pdf') }}"
                                    download="usuario.pdf" target="_blank" title="Manual de Usuario">
                                    <i class="fa-solid fa-circle-info text-blue-700"></i>
                                </a>
                                <div id="tooltip-usuario" role="tooltip"
                                    class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Manual de Usuario
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            @else
                                <a data-tooltip-target="tooltip-administrador"
                                    href="{{ Storage::url('pdfs/Manual_Administrador_Peluquerias_Dbarb.pdf') }}"
                                    download="administrador.pdf" target="_blank" title="Manual de Administrador">
                                    <i class="fa-solid fa-circle-info text-blue-700"></i>
                                </a>
                                <div id="tooltip-administrador" role="tooltip"
                                    class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Manual de Administrador
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            @endif
                        </li>
                    @else
                        <li>
                            <a data-tooltip-target="tooltip-manualpr"
                                href="{{ Storage::url('pdfs/Manual_Primer_Usuario_Peluquerias_Dbarb.pdf') }}"
                                download="primerUsuario.pdf" target="_blank" title="Manual de Primer Usuario">
                                <i class="fa-solid fa-circle-info text-blue-700"></i>
                            </a>
                            <div id="tooltip-manualpr" role="tooltip"
                                class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Manual de Primer Usuario
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </li>
                    @endauth
                </ol>
            </nav>
            <h1 class="font-effect-neon text-4xl mt-4 mb-6">Peluquerias Dbarb</h1>
            <section class="grid grid-cols-2">
                <a class="relative inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                    href="{{ route('marcas.show') }}" title="Ver Marcas">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-blue-500"
                        style="background-image: url({{ Storage::url('pantenep.png') }})">
                        <p class="text-2xl text-black">Marcas</p>
                        <div class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"><i class="fa-solid fa-briefcase fa-2x"></i></div>
                    </div>
                </a>
                <a class="relative inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                    href="{{ route('articulos.show') }}" title="Ver Artículos">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-red-500"
                        style="background-image: url({{ Storage::url('planchap.webp') }})">
                        <p class="text-2xl text-black">Artículos</p>
                        <div class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"><i class="fa-solid fa-tags fa-2x"></i></div>
                    </div>
                </a>
                <a class="relative inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                    href="{{ route('citas.show') }}" title="Gestionar Citas">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-green-500"
                        style="background-image: url({{ Storage::url('citap.png') }})">
                        <p class="text-2xl text-white">Citas</p>
                        <div class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"><i class="fa-solid fa-address-book fa-2x"></i></div>
                    </div>
                </a>
                @if (auth()->user() && auth()->user()->is_admin)
                <a class="relative inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                    href="{{ route('categorias.show') }}" title="Gestionar Categorías">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-yellow-500"
                        style="background-image: url({{ Storage::url('categoria.png') }})">
                        <p class="text-2xl text-white">Categorías</p>
                        <div class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"><i class="fa-solid fa-magnifying-glass fa-2x"></i></div>
                    </div>
                </a>
                @else
                <a class="relative inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                    href="{{ route('contacto.pintar') }}" title="Contáctanos">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-yellow-500"
                        <div class="relative h-48 border border-double border-4 border-yellow-500">
                        <p class="text-white text-2xl">Contacto</p>
                        <p class="text-black">Dir: C/ Memorias 87</p>
                        <p class="text-black">Tel: 669206657</p>
                        <p class="text-black">Correo de contacto:</p>
                        <p class="text-black">dadacrijo@gmail.com</p>
                        <div class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"><i class="fa-solid fa-envelope fa-2x"></i></div>
                    </div>
                </a>
                @endif
            </section>
        </main>
    </x-miscomponentes.tablas>
</x-app-layout>
