<x-slot name="modal">
    <x-modal2 id="selesai">
        <div class="flex flex-col max-w-xl p-8 rounded-xl lg:p-12">
            <div class="flex flex-col items-center w-full">
                <h2 class="text-3xl font-semibold text-center">Form Feedback</h2>
                <div class="flex flex-col items-center py-6 space-y-3">
                    <span class="text-center">Berikan Masukan dan Rating kepada Pengajar</span>
                    <form class="w-full" action="/order/feedback/{{ $order->id }}" method="post">
                        @csrf
                        @method('put')

                        <div class="rating gap-4 my-3 flex justify-center items-center">
                            <input type="radio" value="1" name="rate" class="mask mask-star-2 bg-orange-400"
                                checked />
                            <input type="radio" value="2" name="rate"
                                class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" value="3"name="rate" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" value="4"name="rate" class="mask mask-star-2 bg-orange-400" />
                            <input type="radio" value="5"name="rate" class="mask mask-star-2 bg-orange-400" />
                        </div>

                        <div class="flex flex-col w-full">
                            <textarea name="message" rows="3" placeholder="Message..." class="p-4 rounded-md resize-none"></textarea>
                            <button type="submit"
                                class="py-4 mt-8 font-semibold rounded-md bg-primary text-white">Leave
                                feedback</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </x-modal2>
</x-slot>
