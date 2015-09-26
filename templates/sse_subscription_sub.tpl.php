<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<?php drupal_add_js(drupal_get_path('module', 'sse_subscription') . '/js/sub.js'); ?>

<div class="container">
    <div class="center-box">
        <div id="sub-prompt" class="invi">
            <p id="sub-status">订阅设置已保存</p>
                <div>
                    <button id="revise-bu">返回修改</button>
                    <button id="close-bu">关闭</button>
                </div>
            </div>
            <h2>订阅通知</h2>
            <form action="javascript:void(0);" method="post" accept-charset="utf-8" class="sub-form">
                <p class="user-mail">为<?php print $email; ?>设置订阅</p>
                <div id="class-one">
                    <h3>面向群体</h3>
                    <?php foreach ($target as $layer) { ?>
                        <div class="class-layer">
                        <?php foreach ($layer as $item) { ?>
                            <input id="checkbox11" type="checkbox" name="group[]" value="<?php echo $item['tid']; ?>" class="css-checkbox">
                            <label for="checkbox11" class="css-label sme depressed" style="width: 395px;"><?php echo $item['name']; ?></label>
                        <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div id="class-two">
                    <h3>通知内容</h3>
                    <div class="class-layer">
                    <?php foreach ($category as $item) { ?>
                        <input id="checkbox11" type="checkbox" name="type[]" value="<?php echo $item['tid']; ?>" class="css-checkbox">
                        <label for="checkbox11" class="css-label sme depressed" style="width: 395px;"><?php echo $item['name']; ?></label>
                    <?php } ?>
                    </div>
                </div>
                <div class="class-layer">
                    <input type="submit" name="cancel" value="订阅" class="button button-sub" id="sub-bu">
                    <input type="submit" name="submit" value="退订" class="button button-unsub" id="unsub-bu">
                </div>
            </form>
        </div>
    </div>
