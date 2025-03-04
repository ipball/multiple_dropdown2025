$(document).ready(function() {
    $('#province').change(function() {
        var province_id = $(this).val();
        $('#district').html('<option value="">เลือกอำเภอ</option>').prop('disabled', true);
        $('#subdistrict').html('<option value="">เลือกตำบล</option>').prop('disabled', true);
        $('#postcode').val('');
        
        if (province_id) {
            $.ajax({
                url: 'get_districts.php',
                type: 'POST',
                data: {province_id: province_id},
                dataType: 'json',
                success: function(response) {
                    if(response.status == 'success'){
                        $('#district').prop('disabled', false);
                        $.each(response.data, function(key, value) {
                            $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    });
    
    $('#district').change(function() {
        var district_id = $(this).val();
        $('#subdistrict').html('<option value="">เลือกตำบล</option>').prop('disabled', true);
        $('#postcode').val('');
        
        if (district_id) {
            $.ajax({
                url: 'get_subdistricts.php',
                type: 'POST',
                data: {district_id: district_id},
                dataType: 'json',
                success: function(response) {
                    if(response.status == 'success'){
                        $('#subdistrict').prop('disabled', false);
                        $.each(response.data, function(key, value) {
                            $('#subdistrict').append('<option value="' + value.id + '" data-postcode="' + value.postcode + '">' + value.name + '</option>');
                        });
                    }
                }
            });
        }
    });
    
    $('#subdistrict').change(function() {
        var postcode = $('option:selected', this).data('postcode');
        $('#postcode').val(postcode);
    });
});