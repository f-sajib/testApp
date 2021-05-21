<script>
    (function ($) {

        let statusValid = $('.status-valid');
        let statusInvalid = $('.status-invalid');
        let statusCheck = $('.status-check');
        $( "#domain" ).keyup(function(){
            statusCheck.addClass('current');
            statusInvalid.removeClass('current');
            statusValid.removeClass('current');
            setTimeout(function(){
                domainCheck()
            }, 1000);


        });

        function domainCheck() {
            $.ajax({
                type: 'GET',
                url: '{{url("hospital/domain-check")}}',
                data: {
                    domain: $("#domain").val()
                },
                success: function (data) {
                    if(data && data.status === true) {
                        statusCheck.removeClass('current');
                        statusInvalid.removeClass('current');
                        statusValid.addClass('current');
                    } else if(data && data.status === false) {
                        statusValid.removeClass('current');
                        statusCheck.removeClass('current');
                        statusInvalid.addClass('current');
                    } else {
                        statusValid.removeClass('current');
                        statusCheck.removeClass('current');
                        statusInvalid.removeClass('current')
                    }
                },
                error: function (e) {
                    console.log(e)
                }
            });
        }
    })(jQuery);
</script>
