<x-layout>
    <div class="space-y-10">
        <section>
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                <x-job-card/>
                <x-job-card/>
                <x-job-card/>
            </div>
        </section>
        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 space-x-1 space-y-2">
                <x-tag>Backend</x-tag>
                <x-tag>Frontend</x-tag>
                <x-tag>Manager</x-tag>
                <x-tag>PHP</x-tag>
                <x-tag>C#</x-tag>
                <x-tag>Laravel</x-tag>
                <x-tag>Symfony</x-tag>
                <x-tag>TypeScript</x-tag>
                <x-tag>Java</x-tag>
                <x-tag>Python</x-tag>
                <x-tag>Vue</x-tag>
                <x-tag>React</x-tag>
            </div>
        </section>
        <section>
            <x-section-heading>Recent Jobs</x-section-heading>
            <div class="mt-6 space-y-6">
                <x-job-card-wide></x-job-card-wide>
                <x-job-card-wide></x-job-card-wide>
                <x-job-card-wide></x-job-card-wide>
            </div>
        </section>
    </div>
</x-layout>
