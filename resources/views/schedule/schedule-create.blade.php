<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Schedule ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{route('schedule.store')}}" method="POST">
                    @csrf

                    <!-- Start Date -->
                    <div class="mb-4">
                        <label for="start_date" class="block dark:text-white text-lg font-bold mb-2">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>

                    <!-- End Date -->
                    <div class="mb-4">
                        <label for="end_date" class="block dark:text-white text-lg font-bold mb-2">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>

                    <!-- Course -->
                    <div class="mb-4">
                        <label for="course_id" class="block dark:text-white text-lg font-bold mb-2">Course</label>
                        <select name="course_id" id="course_id" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Session -->
                    <div class="mb-4">
                        <label for="session" class="block dark:text-white text-lg font-bold mb-2">Session</label>
                        <select name="session" id="session" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                                <option value="">--choose-one--</option>
                                <option value="weekdays">Weekdays</option>
                                <option value="weekend">Weekend</option>
                        </select>
                    </div>

                    <!-- Student Limit -->
                    <div class="mb-4">
                        <label for="student_limit" class="block dark:text-white text-lg font-bold mb-2">Student Limit</label>
                        <input type="number" name="student_limit" id="student_limit" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                    </div>

                    <!-- Schedule Description -->
                    <div class="mb-4">
                        <label for="schedule_description" class="block dark:text-white text-lg font-bold mb-2">Schedule Description</label>
                        <textarea name="schedule_description" id="schedule_description" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-row justify-between">
                        <x-button-cancel :cancelRoute="route('schedule')">
                            {{__('Cancel')}}
                        </x-button-cancel>
                        <x-button class="ms-4">
                            {{ __('Post') }}
                        </x-button>                                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
