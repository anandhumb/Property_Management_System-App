<x-admin.layout>
    <table class="table table-bordered table-bordered-bd-warning mt-4">
        <thead>
            <tr>
                <th scope="col">Manager</th>
                <th scope="col">Property</th>
                <th scope="col">Image</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $properties as $property )
            <tr>
                <td>{{ $property->users->name}}</td>
                <td>{{ $property->property_name }}</td>
                <td><img src="{{Storage::url($property->upload_image) }}" alt="Image" width="150" height="100"></td>
                
                <td>
                    <!-- Approve Button -->
                    <button onclick="Approve({{ $property->id }})" class="badge badge-success">Approve</button>

                    <!-- Reject Button -->
                    <button onclick="Reject({{ $property->id }})" class="badge badge-danger">Reject</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        // Function to approve a property
        function Approve(propertyId) {
            $.ajax({
                type: "POST",
                // Use Blade to inject the actual URL with the propertyId
                url: "{{ route('admin.approve', ':propertyId') }}".replace(':propertyId', propertyId),
                data: {
                    _token: "{{ csrf_token() }}"  // CSRF Token for security
                },
                dataType: "json",
                success: function(response) {
                    console.log("Approval response:", response);
                    if (response.success) {
                        
                        $.notify({
                            icon: ' la la-circle',
                            title: 'Property approved successfully!',
                            message: '',
                        },{
                            type: 'success',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 1000,
                        });
                        // Optionally, you can update the UI (like changing the button text or status)
                    } else {
                        alert("Approval failed: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                    alert("An error occurred while processing the request.");
                }
            });
        }
    
        // Function to reject a property (similar to approve)
        function Reject(propertyId) {
            $.ajax({
                type: "POST",
                // Same fix for the reject request URL
                url: "{{ route('admin.reject', ':propertyId') }}".replace(':propertyId', propertyId),
                data: {
                    _token: "{{ csrf_token() }}"  // CSRF Token for security
                },
                dataType: "json",
                success: function(response) {
                    console.log("Reject response:", response);
                    if (response.success) {
                        $.notify({
                            icon: 'la la-trash',
                            title: 'Property Rejected successfully!',
                            message: '',
                        },{
                            type: 'danger',
                            placement: {
                                from: "bottom",
                                align: "right"
                            },
                            time: 1000,
                        });
                    } else {
                        alert("Rejection failed: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                    alert("An error occurred while processing the request.");
                }
            });
        }
    </script>
    
</x-admin.layout>
