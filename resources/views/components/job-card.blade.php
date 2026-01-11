<div class="p-4 bg-white/5 rounded-xl flex flex-col text-center border border-transparent hover:border-blue-600 group transition-colors duration-300">
    <div class="self-start text-sm">Employer Name</div>
    <div class="py-8">
        <h3 class="group-hover:text-blue-600 text-xl font-bold transition-colors duration-300">Title</h3>
        <p class="text-sm mt-4">Salary</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
        </div>

        <x-employer-logo :width="42" :height="42" />
    </div>
</div>
