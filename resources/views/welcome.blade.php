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
            @auth
                <article class="text-2xl text-center"> Seleccione lo que necesite:</article>
                <article class="flex flex-wrap justify-around sm:mt-5">
                    @if (auth()->user()->is_admin)
                        <a data-tooltip-target="tooltip-categorias"
                            class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                      hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                            href="{{ route('categorias.show') }}"><i class="fa-solid fa-magnifying-glass fa-6x"
                                title="Gestionar Categorías"></i>
                        </a>
                        <div id="tooltip-categorias" role="tooltip"
                            class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Gestionar Categorías
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @endif
                    <a data-tooltip-target="tooltip-marcas"
                        class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                    hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('marcas.show') }}"><i class="fa-solid fa-briefcase fa-6x"
                            title="Gestionar Marcas"></i>
                    </a>
                    @if (auth()->user()->is_admin)
                        <div id="tooltip-marcas" role="tooltip"
                            class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Gestionar Marcas
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @else
                        <div id="tooltip-marcas" role="tooltip"
                            class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Ver Marcas
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @endif
                    <a data-tooltip-target="tooltip-articulos"
                        class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                  hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('articulos.show') }}" title="Ver Artículos">
                        <i class="fa-solid fa-tags fa-6x"></i>
                    </a>
                    <div id="tooltip-articulos" role="tooltip"
                        class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Ver Artículos
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <a data-tooltip-target="tooltip-citas"
                        class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                  hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('citas.show') }}"><i class="fa-solid fa-address-book fa-6x"
                            title="Gestionar Citas"></i>
                    </a>
                    <div id="tooltip-citas" role="tooltip"
                        class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Gestionar Citas
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @if (auth()->user()->carros()->count())
                        <a data-tooltip-target="tooltip-carro"
                            class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                      hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                            href="{{ route('carro.index') }}"><i class="fa-solid fa-cart-shopping fa-6x"
                                title="Gestionar Carro"></i>
                        </a>
                        <div id="tooltip-carro" role="tooltip"
                            class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Gestionar Carro
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    @endif
                    <a data-tooltip-target="tooltip-contacto"
                        class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                  hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('contacto.pintar') }}"><i class="fa-solid fa-envelope fa-6x" title="Contáctanos"></i>
                    </a>
                    <div id="tooltip-contacto" role="tooltip"
                        class="max-sm:hidden absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Contáctanos
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </article>
            @else
                <section class="grid grid-cols-2">
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-blue-500"
                        style="background-image: url({{ Storage::url('pantenep.png') }})">
                        <p class="text-2xl">Marcas</p>
                        <a class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                            href="{{ route('marcas.show') }}" title="Ver Marcas">
                            <i class="fa-solid fa-briefcase fa-2x"></i>
                        </a>
                    </div>
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-red-500"
                        style="background-image: url({{ Storage::url('planchap.webp') }})">
                        <p class="text-2xl">Artículos</p>
                        <a class="absolute absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                            href="{{ route('articulos.show') }}" title="Ver Artículos">
                            <i class="fa-solid fa-tags fa-2x"></i>
                        </a>
                    </div>
                    <div class="relative h-48 bg-auto bg-cover bg-center bg-no-repeat border border-double border-4 border-green-500"
                        style="background-image: url({{ Storage::url('citap.png') }})">
                        <p class="text-white text-2xl">Citas</p>
                        <a class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                            href="{{ route('citas.show') }}" title="Gestionar Citas">
                            <i class="fa-solid fa-address-book fa-2x"></i>
                        </a>
                    </div>
                    <div class="relative h-48 border border-double border-4 border-yellow-500">
                        <p class="text-white text-2xl">Contacto</p>
                        <p>Dir: C/ Memorias 87</p>
                        <p>Tel: 669206657</p>
                        <p>Correo de contacto:</p>
                        <p>dadacrijo@gmail.com</p>
                        <a class="absolute inset-x-0 bottom-0 text-blue-600 hover:text-gray-900 cursor-pointer"
                            href="{{ route('contacto.pintar') }}" title="Contáctanos">
                            <i class="fa-solid fa-envelope fa-2x"></i>
                        </a>   
                    </div>
                </section>
            @endauth
        </main>
    </x-miscomponentes.tablas>
</x-app-layout>
