<?php
/* @var $message array from foreach cycle in index.php */
?>

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <?=date("j F, Y, g:i a", $message['date']);?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9">
                    <h4 class="card-title"><?=htmlspecialchars($message['title'])?></h4>
                    <p class="card-text"><?=($message['message'])?></p>
                </div>
                <div class="col-sm-3">
                    <p class="h5">автор</p>
                    <?php $user = get_user($message['user_id']);?>
                    <p>
                        <?=htmlspecialchars($user['name'])?> <br>
                        email: <?=htmlspecialchars($user['email'])?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 10px;"></div>
</div>