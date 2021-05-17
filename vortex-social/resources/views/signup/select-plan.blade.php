<x-app-layout>
    <!-- component -->
<style>
    [x-cloak] {
    display: none;
    }
</style>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

<div class="container mx-auto antialiased text-gray-900 bg-white" x-data="setup()">
  <!-- Navbar -->
 
  <main class="mx-4 my-16 pt-10">
    <div class="text-center">
      <h1 class="mb-4 text-2xl font-normal md:text-3xl lg:text-4xl">
        Our <span class="font-semibold">plans</span> for your <span class="font-semibold">strategies</span>
      </h1>
      <p class="text-sm font-normal text-gray-400">
        See below our main three plans for your business, for your startup and agency.
      </p>
      <p class="text-sm font-normal text-gray-400">
        It start from here! You can teach yourself what you really like.
      </p>
    </div>

   
   

    <!-- Plans -->
    <div
         class="flex flex-col items-center justify-center mt-16 space-y-8 lg:flex-row lg:items-stretch lg:space-x-8 lg:space-y-0"
         >
    @foreach($plans as $plan)
        <section class="flex flex-col w-full max-w-sm p-12 space-y-6 bg-white rounded-lg shadow-md">
          <!-- Price -->
          <div class="flex-shrink-0">
            <span
                  class="text-4xl font-medium tracking-tight"
                  :class="{{$plan->name == 'Basic' ? 'text-green-500' : '' }}"
                  >{{ $plan->price }}/month</span>
          </div>

          <!--  -->
          <div class="flex-shrink-0 pb-6 space-y-2 border-b">
            <h2 class="text-2xl font-normal">{{ $plan->name }}</h2>
            <p class="text-sm text-gray-400">{{ $plan->description }}</p>
          </div>

          <!-- Features -->
          <ul class="flex-1 space-y-4">
            @foreach($plan->features as $feature)
              <li class="flex items-start">
                <svg
                     class="w-6 h-6 text-green-300"
                     aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                     fill="currentColor"
                     >
                  <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                        />
                </svg>
                <span class="ml-3 text-base font-medium">{{ $feature->description }}</span>
              </li>
            @endforeach
          </ul>

          <!-- Button -->
          <div class="flex-shrink-0 pt-4">
          <form action="{{ route('signup.billingAccount', $plan) }}" method="GET">
              

            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
          
            <button
                    type='submit'
                    class="inline-flex items-center justify-center w-full max-w-xs px-4 py-2 transition-colors border rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    :class="{{ $plan->name == 'GURU' ? 'bg-indigo-500 text-white hover:bg-indigo-700' : 'hover:bg-indigo-500 hover:text-white' }}"
                    >{{ $plan->name }}</button>
          </form>
          </div>
        </section>
    @endforeach
    </div>
  </main>

  <!-- Author links -->
  <div class="fixed flex items-center space-x-4 bottom-5 left-5">
    <a href="https://twitter.com/ak_kamona" target="_blank" class="transition-transform transform hover:scale-125">
      <span class="sr-only">Twitter</span>
      <svg
           aria-hidden="true"
           class="w-8 h-8 text-blue-500"
           fill="currentColor"
           xmlns="http://www.w3.org/2000/svg"
           viewBox="0 0 24 24"
           >
        <path
              d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"
              ></path>
      </svg>
    </a>
    <a href="https://github.com/Kamona-WD" target="_blank" class="transition-transform transform hover:scale-125">
      <span class="sr-only">Github</span>
      <svg
           aria-hidden="true"
           class="w-8 h-8 text-black"
           fill="currentColor"
           xmlns="http://www.w3.org/2000/svg"
           viewBox="0 0 24 24"
           >
        <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z"
              ></path>
      </svg>
    </a>
  </div>
</div>

<script>
    const setup = () => {
    return {
        isNavOpen: false,

        billPlan: 'monthly',

        plans: [
        {
            name: 'Easy',
            discretion: 'All the basics for businesses that are just getting started.',
            price: {
            monthly: 29,
            annually: 29 * 12 - 199,
            },
            features: ['One project', 'Your dashboard'],
        },
        {
            name: 'Basic',
            discretion: 'Better for growing businesses that want more customers.',
            price: {
            monthly: 59,
            annually: 59 * 12 - 100,
            },
            features: ['Two projects', 'Your dashboard', 'Components included', 'Advanced charts'],
        },
        {
            name: 'Custom',
            discretion: 'Advanced features for pros who need more customization.',
            price: {
            monthly: 139,
            annually: 139 * 12 - 100,
            },
            features: ['Unlimited projects', 'Your dashboard', '+300 Components', 'Chat support'],
        },
        ],
    }
}
</script>
</x-app-layout>