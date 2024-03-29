@push('scripts')
    <!-- JQuery Ajax -->
    <!-- '@'push to push to master layout, '@'stack('scripts')in master to fetch this script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-500 leading-tight">
            "{{$group->name}}" Group Members
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3 flex flex-row justify-center">
                <input type="text" name="search" id="search" class="w-1/3 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" placeholder="Search Member..&#x1F50E;&#xFE0F; "/>
                <input type="hidden" name="groupId" id="groupId" value="{{$group->id}}" />
            </div>
            <div class="flex flex-row justify-between">
                <form action="{{route('group')}}" method="GET">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg mb-2">
                        Back
                    </button>
                </form>
                <form action="{{route('group.addMember',$group->id)}}" method="GET">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg mb-2">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="16" viewBox="0 0 448 512" class="mr-2">
                                <path fill="#FFFFFF" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                            </svg>
                            Add Members
                        </div>
                    </button>
                </form>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 border-separate">
                  <thead class="with-larasort">
                    <tr>
                        <th class="py-2 px-4 border-b bg-cyan-300">No</th>
                        <th class="py-2 px-4 border-b bg-cyan-300">Member Name</th>
                        <th class="py-2 px-4 border-b bg-cyan-300">Email</th>
                        <th class="py-2 px-4 border-b bg-cyan-300">Role</th>
                        <th class="py-2 px-4 border-b bg-cyan-300">Member Since</th>
                        <th class="py-2 px-4 border-b bg-cyan-300">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @if ($group->users->count())
                    @foreach ($group->users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b text-center bg-gray-200">{{$loop->iteration}}</td>
                        <td class="py-2 px-4 border-b text-center bg-gray-200">{{$user->name}}</td>
                        <td class="py-2 px-4 border-b text-center bg-gray-200">{{$user->email}}</td>
                        <!-- Role -->
                        <td class="py-2 px-4 border-b text-center bg-gray-200">
                            @if($user->role_id == 1)
                                Student
                            @elseif($user->role_id == 2)
                                Lecturer
                            @elseif($user->role_id == 3)
                                Moderator
                            @elseif($user->role_id == 4)
                                Admin
                            @else
                                Unknown Role
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b text-center bg-gray-200">{{$user->pivot->created_at->diffForHumans()}}</td>
                        <td class="py-2 px-4 border-b text-center bg-gray-200">
                            <div class="inline-block">
                                <form action="{{route('group.removeMember',['groupId'=>$group->id,'userId'=>$user->id])}}" method="POST" onsubmit="return confirm('Remove this member from the group?');">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="22" width="20" viewBox="0 0 640 512">
                                            <path fill="#EF4444" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM472 200H616c13.3 0 24 10.7 24 24s-10.7 24-24 24H472c-13.3 0-24-10.7-24-24s10.7-24 24-24z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="py-2 px-4 text-center" colspan="6">No Data found</td>
                    </tr>
                @endif
                  </tbody>
                </table>
              </div>

        </div>
    </div>
</x-app-layout>

<script>
    $('#search').on('keyup',function(){
        $value = $(this).val();
        var groupId = $('#groupId').val();
        var url = "{{route('group.searchMember',":id")}}";
        url = url.replace(':id',groupId);
        $.ajax({
            url: url,
            method: 'GET',
            data: {
                '_token': '{{ csrf_token() }}',
                'search': $value,
            },
            success: function(data) {
                $('tbody').html(data);
            },
            // debug: function(data){
            //     console.log(data);
            // },
        });
    });
</script>