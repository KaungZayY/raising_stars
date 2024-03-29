<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{route('course.update',$course->id)}}" method="POST">
                    @csrf

                    <!-- Course Name -->
                    <div class="mb-4">
                        <label for="course" class="block dark:text-white text-lg font-bold mb-2">Course</label>
                        <input type="text" name="course" id="course" value="{{$course->course}}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>

                    <!-- From Age -->
                    <div class="mb-4">
                        <label for="from_age" class="block dark:text-white text-lg font-bold mb-2">From Age</label>
                        <input type="number" name="from_age" id="from_age" value="{{$course->from_age}}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- To Age -->
                    <div class="mb-4">
                        <label for="to_age" class="block dark:text-white text-lg font-bold mb-2">To Age</label>
                        <input type="number" name="to_age" id="to_age" value="{{$course->to_age}}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Fees -->
                    <div class="mb-4">
                        <label for="fees" class="block dark:text-white text-lg font-bold mb-2">To Age</label>
                        <input type="number" name="fees" id="fees" value="{{$course->fees}}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block dark:text-white text-lg font-bold mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>{{$course->description}}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-row justify-between">
                        <x-button-cancel :cancelRoute="route('course')">
                            {{__('Cancel')}}
                        </x-button-cancel>
                        <x-button class="ms-4">
                            {{ __('Update') }}
                        </x-button>                                            
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
