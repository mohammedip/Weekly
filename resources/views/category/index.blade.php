<x-app-layout>
        <div class="container mx-auto mt-10">
            <div class="flex justify-center">
                <!-- Increase the width of the card container here -->
                <div class="w-full md:w-3/4 lg:w-3/4 xl:w-4/5">
                    @if(session('status'))
                    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <h4 class="text-xl font-semibold">Category List</h4>
                            
                            <a href="{{ url('category/create') }}" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                                Add Category
                            </a>
                        </div>
                        <div class="mt-2 ">
                            <table class="table-auto w-full divide-y divide-gray-200 border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Id</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Slug</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->nom }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->slug }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ route('category.edit', $category->id) }}" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-700">Edit</a>
                                            <a href="{{ route('category.show', $category->id) }}" class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-700">Show</a>
                                            
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
