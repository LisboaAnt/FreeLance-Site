@props(['project'])

<x-ui.card class="col-span-2 ">
    <div class="flex items-start justify-between pb-4">
        <div class="flex flex-col gap-[16px] w-full">
                    <h5>
                        <span class="{{ $project->status->label() === 'Encerrado' ? 'bg-[#ffffff80] text-black' : 'bg-[#C0F7B4] text-[#1D8338]' }} rounded-full font-bold text-center uppercase py-[6px] px-[14px] text-[12px] tracking-wide leading-0">
                            {{ $project->status->label() }}
                        </span>
                    </h5>
            <h1 class="text-[28px] text-white leading-9 ">
                <div class="flex justify-between items-center">
                    <div class="truncate w-[530px]">
                        {{ $project->title }}
                    </div>
                </div>
            </h1>
            
            <div class="text-[#8C8C9A] text-[14px] leading-6 flex items-center">
                Publicado {{ $project->created_at->diffForHumans() }}            
                <div class="text-[#8C8C9A] pl-5 pr-2 leading-6">Encerra em:</div>
                <div class="font-bold flex items-center space-x-1">
                    <span class="text-white">01</span><span>:</span>
                    <span class="text-white">12</span><span>:</span>
                    <span class="text-white">26</span><span>:</span>
                    <span class="text-white">64</span>
                </div>
            </div>
        </div>
    </div>


    <div class="py-4 space-y-4">
    <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Tecnologias</div>
    <div class="flex gap-[8px] items-center pb-2">
        @foreach(json_decode($project->tech_stack) as $tech) 
            <x-ui.tech :icon="$tech" :text="$tech"/>
        @endforeach
    </div>
</div>


    <div class="pt-4 space-y-4">
        <div class="uppercase font-bold text-[#8C8C9A] text-[12px]">Publicado Por</div>
        <div class="flex gap-[8px] items-center">
            <div>
                <x-ui.avatar src="{{ $project->author->avatar }}"/>
            </div>

            <div>
                <div class="text-white text-[14px] font-bold tracking-wide">
                    {{ $project->author->name }}
                </div>
                <div class="flex items-center space-x-[4px]">
                    @foreach(range(1, $project->author->stars) as $star)
                        <x-ui.icons.star class="h-[14px]"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-ui.card>
