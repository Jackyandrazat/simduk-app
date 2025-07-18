<x-app-layout>
    <div class="gradient py-5">
        <div class="pt-1">
            <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
              <!--Left Col-->
              <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full text-white">What business are you?</p>
                <h1 class="my-4 text-5xl font-bold leading-tight text-white">
                  Main Hero Message to sell yourself!
                </h1>
                <p class="leading-normal text-2xl mb-8 text-white">
                  Sub-hero message, not too long and not too short. Make it just right!
                </p>
                <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Subscribe
                </button>
              </div>
              <!--Right Col-->
              <div class="w-full md:w-3/5 py-6 text-center">
                <img class="w-full md:w-4/5 z-50" src="{{asset('Landing-Page-master/hero.png')}}" />
              </div>
            </div>
          </div>
    </div>
</x-app-layout>
