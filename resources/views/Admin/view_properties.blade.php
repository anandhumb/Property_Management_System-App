<x-admin.layout>

    <table class="table table-bordered table-bordered-bd-warning mt-4">
        <thead>
            <tr>
                <th scope="col">Property</th>
                <th scope="col">Image</th>
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

</x-admin.layout>