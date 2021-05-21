<script>
    (function ($) {
        var sections = $('.form-section');
        function naviagateTo(index) {
            title(index)
            sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigator .previous').toggle(index > 0);
            var atTheEnd = index >= sections.length - 1;
            $('.form-navigator .next').toggle(!atTheEnd);
            $('.form-navigator [type=submit]').toggle(atTheEnd);

        }

        function curIndex() {
            return sections.index(sections.filter('.current'))
        }

        $('.form-navigator .previous').click(function () {
            naviagateTo(curIndex() - 1)
        });

        $('.form-navigator .next').click(function () {
            $('.full-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function () {
                naviagateTo(curIndex() + 1);
            })
        });

        sections.each(function (index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index)
        })

        function title(index) {
            if (index === 0) {
                $('#title_text').text('Enter Your Hospital Information')
            } else if (index === 1) {
                $('#title_text').text('Continue Entering Your Information')
            } else if (index === 2) {
                $('#title_text').text('Your Presence In Social Site')
            } else {
                $('#title_text').text('Your Login Credentials')
            }
        }

        naviagateTo(0);
        title(0);


    })(jQuery);
</script>
