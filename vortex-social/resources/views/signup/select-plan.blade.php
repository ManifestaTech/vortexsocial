<x-app-layout>
<!-- component -->
<!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->
<style>
  .-z-1 {
    z-index: -1;
  }

  .origin-0 {
    transform-origin: 0%;
  }

  input:focus ~ label,
  input:not(:placeholder-shown) ~ label,
  textarea:focus ~ label,
  textarea:not(:placeholder-shown) ~ label,
  select:focus ~ label,
  select:not([value='']):valid ~ label {
    /* @apply transform; scale-75; -translate-y-6; */
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
      skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    --tw-scale-x: 0.75;
    --tw-scale-y: 0.75;
    --tw-translate-y: -1.5rem;
  }

  input:focus ~ label,
  select:focus ~ label {
    /* @apply text-black; left-0; */
    --tw-text-opacity: 1;
    color: rgba(0, 0, 0, var(--tw-text-opacity));
    left: 0px;
  }
</style>


<div class="min-h-screen bg-gray-100 p-0 sm:p-12 pt-20 mt-5">
    
@foreach($plans as $plan)
        <section class="flex flex-col w-full max-w-sm p-12 space-y-6 mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg m-4 sm:rounded-3xl">
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
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
                    :class="{{ $plan->name == 'GURU' ? 'bg-indigo-500 text-white hover:bg-indigo-700' : 'hover:bg-indigo-500 hover:text-white' }}"
                    >{{ $plan->name }}</button>
          </form>
          </div>
        </section>
    @endforeach
</div>

<script>
  'use strict'

  document.getElementById('button').addEventListener('click', toggleError)
  const errMessages = document.querySelectorAll('#error')

  function toggleError() {
    // Show error message
    errMessages.forEach((el) => {
      el.classList.toggle('hidden')
    })

    // Highlight input and label with red
    const allBorders = document.querySelectorAll('.border-gray-200')
    const allTexts = document.querySelectorAll('.text-gray-500')
    allBorders.forEach((el) => {
      el.classList.toggle('border-red-600')
    })
    allTexts.forEach((el) => {
      el.classList.toggle('text-red-600')
    })
  }
</script>

</x-app-layout>