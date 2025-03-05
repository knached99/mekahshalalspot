@props(['sections'])
<div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Section Name</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Created At</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Updated At</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">#Menu Items</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">View</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-white uppercase">Delete</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach($sections as $section)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$section->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{{date('F jS, Y \a\t g:i A', strtotime($section->created_at))}}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{{date('F jS, Y \a\t g:i A', strtotime($section->updated_at))}}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{$section->menuItems->count()}}</td> <!-- Displaying number of menu items -->
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">View</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
              <form action="{{route('deleteSection', ['sectionID' => $section->menu_section_id])}}" method="post">
              @csrf 
              @method('DELETE')
              <button style="background-color: red; color: white; padding: 10px; margin: 10px; border-radius: 5px;">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
