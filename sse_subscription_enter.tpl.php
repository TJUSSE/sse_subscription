<div class="main-container" style="height: 250px">
        <div class="center-box">
            <h2>订阅通知</h2>
            <form action="javascript:void(0);" method="post" accept-charset="utf-8" class="sub-form">
                <p class="user-mail">我们提供基于邮箱的通知订阅：<br>每天晚上6点左右，当天新通知将一起发送到您的邮箱中。
                    请留下您的邮箱，我们将发送给您一封订阅确认邮件。点击邮件中的链接，即可自定义期望收到的通知类型，并完成订阅。</p>

                <input id="input-box-mail" type="email" placeholder="请输入您的有效邮箱...">

                <div class="class-layer">

                    <div class="button-wrap">
                        <button data-dialog="somedialog" class="trigger">
                            <input id="confirm-mail" type="submit" name="" value="发送确认邮件">
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="container">
        <div class="content">
            <div id="somedialog" class="dialog">
                <div class="dialog__overlay"></div>
                <div class="dialog__content">
                    <div class="morph-shape">
                        <svg width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
                            <rect x="3" y="3" fill="none" width="556" height="276"></rect>
                        </svg>
                    </div>
                    <div class="dialog-inner">
                        <img src="/<?php print path_to_theme(); ?>/resources/check.png">
                        <h2 id="sending-status"><strong>已发送</strong>请注意查收</h2>
                        <div><button id="btn-ok" class="action" data-dialog-close="">我知道了</button></div>
                    </div>
                </div>
            </div>
        </div><!-- /content -->
</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<?php drupal_add_js(drupal_get_path('module', 'sse_subscription') . '/js/dialogFx.js'); ?>
<script>
        var onReadyFunc = function() {

            var dlgtrigger = document.querySelector( '[data-dialog]' ),
                    somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
                    dlg = new DialogFx( somedialog );

            // dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );

            $('#confirm-mail').click(function() {
                $.ajax({
                    'url': './send',
                    'dataType': 'html',
                    'data': {
                        'mail': $('#input-box-mail').val()
                    },
                    'type': 'post',
                    'success': function(response) {
                        console.log('Success!');
                        // $("#sending-status").empty().append('<strong>已发送</strong>请注意查收');
                        dlg.toggle();
                        $('#btn-ok').click(function(){
                            window.location.href = '../infolist';
                        });
                    },
                    'error': function(err) {
                        //console.log(err);
                        console.log('Failed!');
                    }
                });
            });

        };

        $(document).ready(onReadyFunc);
    </script>
