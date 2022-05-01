<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dependent Drop Down Using Ajax</title>
</head>

<body>
    <h1>Dependent Drop Down</h1>
    <select name="country" id="country">
        <option hidden>Select Country</option>
        @foreach($country as $list)
        <option value="{{$list->id}}">{{$list->country}}</option>
        @endforeach
    </select>

    <select name="state" id="state">
        <option hidden>Select State</option>
        <option value=""></option>
    </select>

    <select name="city" id="city">
        <option hidden>Select City</option>
        <option value=""></option>
    </select>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#country').change(function() {
            // jQuery('#city').html(result)
            // alert('ss')
            let country_id = jQuery(this).val();
            jQuery('#city').html('<option hidden>Select City</option>')
            // alert(country_id);
            jQuery.ajax({
                url: '/getstate',
                type: 'post',
                data: 'country_id=' + country_id + '&_token= {{csrf_token()}}',
                success: function(result) {
                    jQuery('#state').html(result)
                }
            })
        })

        jQuery('#state').change(function() {
            // alert('ss')
            let state_id = jQuery(this).val();
            // alert(state_id);
            // return false;
            jQuery.ajax({
                url: '/getcity',
                type: 'post',
                data: 'state_id=' + state_id + '&_token= {{csrf_token()}}',
                success: function(result) {
                    jQuery('#city').html(result)
                }
            })
        })
    })
</script>

</html>