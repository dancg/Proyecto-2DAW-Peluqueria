<x-app-layout>
    <x-miscomponentes.tablas>
        <main>
            <nav aria-label="Migas de Pan (Breadcrumbs)" class="mb-2">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="/">Inicio</a>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li class="flex items-center">Dashboard</li>
                </ol>
            </nav>
            <article class="text-4xl text-center"> Peluquerias Dbarb</article>
            <article class="text-2xl text-center"> Seleccione lo que necesite:</article>
            <article class="flex flex-wrap justify-around sm:mt-5">
                @if (auth()->user()->is_admin)
                    <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('categorias.show') }}"><i class="fa-solid fa-magnifying-glass fa-6x"
                            title="Gestionar Categorías"></i>
                    </a>
                    <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('marcas.show') }}"><i class="fa-solid fa-briefcase fa-6x"
                            title="Gestionar Marcas"></i>
                    </a>
                @endif
                <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                    href="{{ route('articulos.show') }}" title="Ver Artículos">
                    <i class="fa-solid fa-tags fa-6x"></i>
                </a>
                <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                    href="{{ route('citas.show') }}"><i class="fa-solid fa-address-book fa-6x" title="Ver Citas"></i>
                </a>
                @if (auth()->user()->carros()->count())
                    <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                        href="{{ route('carro.index') }}"><i class="fa-solid fa-cart-shopping fa-6x"
                            title="Gestionar Carro"></i>
                    </a>
                @endif
                <a class="shadow-md rounded-lg my-4 text-blue-600 hover:text-gray-900
                hover:bg-blue-500 border border-blue-600 hover:border-white cursor-pointer mx-2"
                    href="{{ route('contacto.pintar') }}"><i class="fa-solid fa-envelope fa-6x" title="Contáctanos"></i>
                </a>
            </article>
        </main>
    </x-miscomponentes.tablas>
</x-app-layout>
