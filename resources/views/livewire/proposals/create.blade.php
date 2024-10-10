<div x-data="{ showModal: @entangle('modal') }">
    <button class="bg-[#5354FD] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px]
                    hover:bg-[#1f20a6] transition duration-300 ease-in-out"
            @click="showModal = true">
        Enviar uma proposta
    </button>

    <!-- Background Blur Overlay -->
    <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm" @click="showModal = false"></div>

    <dialog x-ref="modal" 
        class="fixed inset-0 rounded-lg w-full max-w-md bg-[#181826] shadow-lg text-white border-[#1E1E2C] border p-8 flex flex-col gap-6 z-50"
        @click.away="showModal = false" 
        x-show="showModal" 
        @close="showModal = false">

        <div>
            <button class="bg-[#1E1E2C] hover:bg-[#313145] transition duration-300 ease-in-out p-[8px] rounded-md"
                    @click="showModal = false">
                <x-ui.icons.x class="w-[32px] h-[32px] text-white" />
            </button>
        </div>

        <form class="flex flex-col gap-6" wire:submit.prevent="save">
            <div>
                <div class="text-[28px]">Envie sua proposta</div>
                <div class="text-[16px] text-[#C3C3D1]">Faça sua oferta em horas mensais que você pode contribuir com o projeto.</div>
            </div>
            <div class="flex gap-4">
                <div class="w-2/3 gap-2 flex flex-col">
                    <label class="text-[14px] text-[#C3C3D1]">E-mail</label>
                    <input wire:model="email" type="email" class="w-full bg-[#1E1E2C] text-white p-3.5 focus:outline-none focus:ring-0 border border-[#1E1E2C]" placeholder="Insira o seu e-mail" />
                </div>
                <div class="w-1/3 gap-2 flex flex-col">
                    <label class="text-[14px] text-[#C3C3D1]">Horas</label>
                    <div class="flex" x-data="{ count: 0 }">
                        <button type="button" class="bg-[#1E1E2C] hover:bg-[#313145] transition duration-300 ease-in-out text-[#C3C3D1] py-2 px-3 text-3xl" @click="count--">-</button>
                        <input wire:model="hours" type="number" class="bg-[#1E1E2C] text-white py-2 pl-3 w-[40px] font-bold focus:outline-none focus:ring-0 border border-[#1E1E2C] focus:ring-blue-500" x-model="count" />
                        <button type="button" class="bg-[#1E1E2C] hover:bg-[#313145] transition duration-300 ease-in-out text-[#C3C3D1] py-2 px-3 text-3xl" @click="count++">+</button>
                    </div>
                </div>
            </div>
            <div>
                <label for="agree" class="flex cursor-pointer items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-300">
                    <div class="relative flex items-center">
                        <input id="agree" type="checkbox" class="cursor-pointer" />
                        <x-ui.icons.check class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-white" />
                    </div>
                    <span class="text-[#8C8C9A] text-[14px]">Concordo com os Termos e Políticas de privacidade.</span>
                </label>
            </div>
            <button type="submit" class="bg-[#5354FD] text-white font-bold tracking-wide uppercase px-8 py-3 rounded-[4px]
                            hover:bg-[#1f20a6] transition duration-300 ease-in-out w-full">
                Enviar uma proposta
            </button>
        </form>

        <div class="flex justify-center space-x-2">
            <x-ui.icons.secure class="w-6 h-6 text-[#5354FD]" />
            <span>Suas informações estão seguras.</span>
        </div>
    </dialog>
</div>
