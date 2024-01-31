<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pay With Bkash</title>
    @include('layout.head')
</head>
<body>
   
    <form method="get" action="
    {{ route('bkash-create-payment') }}
    " class="btn-image-primary h-screen flex justify-center items-center">
   
        <button type="submit" class="btn-image py-3 rounded-lg shadow-lg flex items-center justify-center flex-col">
            <img src="{{ asset('./assets/images/bkash-logo.png') }}" class="w-[70%]  h-[40%]" width="300px" height="100" alt="bkash payment" class="btn-icon" />
            <p class="font-bold text-pink-600">Click to Pay With Bkash</p>
        </button>
    </form>
    @include('layout.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>