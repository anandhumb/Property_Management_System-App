<x-manager.layout>
    <table class="table table-bordered table-bordered-bd-warning mt-4">
        <thead>
            <tr>
                
            
                <th scope="col">Property</th>
            
                <th scope="col">Image</th>
                
                <th>Edit<th>Delete</th></th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach( $properties as $property )
        <tbody>
            <tr>
                <td>{{ $property->property_name }}</td>
                <td>
                    <img src="{{Storage::url($property->upload_image) }}" alt="Image" width="150" height="100">
                </td>
                <td>
                    <a href="{{ route('manager.edit',$property->id)}}" class="btn btn-success la la-edit"></a>
                </td>
                <td>
                    <form action="{{ route('manager.delete',$property->id)}}" method="POST">
                        @method('delete')
                        @csrf
                    <button class="btn btn-danger la la-trash"></button>
                    </form>
                </td>
            </form>
            <td>
                {{-- {{ dd($property->status)}} --}}
            @if ($property->status == 1 )
                <a href=""  class="btn btn-success" disabled="disabled">Approved</a>
            @elseif($property->status == 0 )
                <a href=""class="btn btn-danger" disabled="disabled">Rejected</a>
            @else
                <span class="badge badge-secondary">Pending</span>
            </td>
            </tr>
            @endif
            @endforeach
            
        </tbody>
    </table>
</x-manager.layout>