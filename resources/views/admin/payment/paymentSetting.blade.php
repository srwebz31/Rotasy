@extends('admin.layout.app')

@section('title')
    Admin - Payment Settings
@endsection

@section('heading')
    Payment Settings
@endsection

@section('content')
@livewire('admin.payment-setting')

@endsection
@push('endScripts')
<script>
    $(document).ready(function () {
    $('#online_payment').click(function (event) {
        if (this.checked) {
            $('#stripe_payment').val(function () { //loop through each checkbox
                $(this).prop('checked', false); //check 
                $('#Strip_form').hide();
            });
        }
    });
    $('#stripe_payment').click(function (event) {
        if (this.checked) {
            $('#online_payment').val(function () { //loop through each checkbox
                $(this).prop('checked', false); //check 
                $('#Strip_form').show();
            });
        }else{
            $('#Strip_form').hide();
        }
    });
});
</script>
@endpush