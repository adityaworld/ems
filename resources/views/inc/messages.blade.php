@if(count($errors) > 0)
    @foreach($errors->all() as $errors)    
        <script>
            $(document).ready(function(){
                $.toast({
                    heading: 'Error Message',
                    text: '{{$errors}}',
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 4500,
                    stack: 6
                });
            });  
        </script>
    @endforeach
@endif


@if(session('success'))
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Success Message',
                text: '{{session('success')}}',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 4500,
                stack: 6
            });
        });  
    </script>
@endif

@if (session('status'))
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Success Message',
                text: '{{session('status')}}',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 4500,
                stack: 6
            });
        });  
    </script>
@endif

@if(session('error'))            
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Error Message',
                text: '{{session('error')}}',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 4500
            });
        });  
    </script>
@endif

@if(session('warning'))            
    <script>
        $(document).ready(function(){
            $.toast({
                heading: 'Warning Message',
                text: '{{session('warning')}}',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 3500,
                stack: 6
            });
        });  
    </script>
@endif