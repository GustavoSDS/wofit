<x-header-navigation>
    @if (Session::has('message'))
    <x-alert-sugest>
        {{ session('message') }}
    </x-alert-sugest>
    @endif
    <section>
        <div class="bg-black text-white py-20">
            <div class="container mx-auto flex flex-col md:flex-row my-6 md:my-24">

                <div class="flex flex-col w-full lg:w-1/3 p-8">
                    <p class="ml-6 text-yellow-300 text-lg uppercase tracking-loose">PÁGINA EN DESARROLLO</p>
                    <p class="text-3xl md:text-5xl my-4 leading-relaxed md:leading-snug">¡Déjanos una sugerencia!</p>
                    <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                        Proporcione sus valiosos comentarios y algo más ...
                    </p>
                </div>

                <div class="flex flex-col w-full lg:w-2/3 justify-center">
                    <div class="container w-full px-4">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-6/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
                                    <div class="flex-auto p-4 lg:p-6">
                                        <h4 class="text-2xl mb-4 text-black font-semibold">¿Tiene una sugerencia?</h4>
                                        <form id="feedbackForm" action="{{ route('suggestions.post') }}"
                                            method="POST">
                                            @csrf
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="email">Email</label><input type="email" name="email" id="email"
                                                    class="border-0 px-3 py-3 rounded text-sm shadow w-full bg-gray-300 placeholder-black text-gray-800 outline-none focus:bg-gray-400"
                                                    placeholder=" " style="transition: all 0.15s ease 0s;" required />
                                                    @error('email')
                                                        <div class="bg-red-300 text-red-800">{{$message}}</div>
                                                    @enderror
                                            </div>
                                            <div class="relative w-full mb-3">
                                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                                    for="message">Mensaje</label><textarea maxlength="255"
                                                    name="mensaje" id="feedback" rows="6" cols="80"
                                                    class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full"
                                                    placeholder="" required></textarea>
                                                    @error('mensaje')
                                                        <div class="bg-red-300 text-red-800">{{$message}}</div>
                                                    @enderror
                                            </div>
                                            <div class="text-center mt-6">
                                                <button id="feedbackBtn"
                                                    class="bg-yellow-300 text-black text-center mx-auto active:bg-yellow-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                                    type="submit" style="transition: all 0.15s ease 0s;">Enviar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-header-navigation>
