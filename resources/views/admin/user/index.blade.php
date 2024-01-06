<x-dashboard-layout page-title="Users">
    <div class="card w-full p-6 bg-base-100 shadow-xl mt-2">
        <div class="text-xl font-semibold inline-block">
            All Users
            <form class="inline-block float-right">
                <div class="inline-block mr-2">
                    <div class="input-group  relative flex flex-wrap items-stretch w-full ">
                        <input type="search" name="search" aria-label="Search" placeholder="Search name, email, phone" class="input input-sm input-bordered w-full max-w-xs" value="{{ request('search') }}" required />
                    </div>
                </div>
                <button class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>
        <div class="divider mt-2"></div>
        <div class='h-full w-full pb-6 bg-base-100'>
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Register At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users->items() as $user)
                        <tr>
                            <td><div class="font-bold">{{ $user->name }}</div></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-5">
                {{ $users->links('components.admin-pagination') }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
