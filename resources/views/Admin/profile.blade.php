<x-admin.layout>
    <div>
       
        <!-- Use a simple button for triggering the AJAX request -->
        <button type="button" id="create-token-btn" true ? 'Token Has already created' : 'Click to create' >
           token
        </button>
        <table class="table">
            <tr>
            
            </tr>
            <tr>
                <td>
                    Token_ID
                </td>
                <td id="token">

                </td>
            </tr>
           

    </div>

    <!-- Include jQuery -->
    <script src="{{ asset('dashboard/assets/js/core/jquery.3.2.1.min.js') }}"></script>

    <script type="text/javascript">
        // Function to handle the button click event
        $('#create-token-btn').on('click', function(e) {
            e.preventDefault();  // Prevent the default form submission behavior
            
            // Send an AJAX POST request
            $.ajax({
                type: "POST",
                url: "{{ route('admin.token') }}",  // The route that handles the request
                data: {
                    _token: "{{ csrf_token() }}",  // CSRF Token for security
                    user_id: "{{ Auth::user()->id }}"  // Send the current user's ID
                },
                dataType: "json",
                beforeSend: function() {
                    // Disable the button while processing to avoid duplicate submissions
                    $('#create-token-btn').prop('disabled', true);
                },
                success: function(response) {
                    console.log("Response:", response);
                    
                    if (response.success) {
                        // alert('Token created successfully!');
                        $('#token').html(response.token); 
                    } else {
                        alert('Token creation failed: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", error);
                    alert("An error occurred while processing the request. Status: " + xhr.status);
                },
                complete: function() {
                    // Re-enable the button after request completion
                    $('#create-token-btn').prop('disabled', false);
                }
            });
        });
    </script>
</x-admin.layout>
