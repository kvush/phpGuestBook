<?php
session_start();
require(__DIR__ . "/../script/config.php");
require(__DIR__ . "/../script/gb_functions.php");
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Гостевая книга - оставь свой отзыв на стене. Напиши, здесь был Вася.">
    <title>Гостевая книга - наскальная.</title>
    <script src="ckeditor/ckeditor.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>Оставь свой отзыв</h1>
        </div>

        <?php if (isset($_COOKIE['user_id'])):?>
            <div class="col-sm-6 align-self-end">
                <div class="float-right">
                    <?php $user = get_user($_COOKIE['user_id']);?>
                    <a href="logout.php" title="выход" class="close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                    <p style="margin-right: 20px;"> привет, <?=htmlspecialchars($user['name'])?>! <br>
                        твой email: <?=htmlspecialchars($user['email'])?>
                    </p>
                </div>
            </div>
        <?php endif;?>

        <?php if (isset($_SESSION['alert'])):?>
            <div class="col-12 alert alert-success alert-dismissible" role="alert">
                <?=$_SESSION['alert']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php unset($_SESSION['alert']); ?>
            </div>
        <?php endif;?>

        <div class="col-12 align-self-end">
            <?php if (isset($_COOKIE['user_id'])):?>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newMessageModal">
                    Написать новое сообщение
                </button>
            <?php else:?>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#loginModal">
                    Авторизоваться
                </button>
            <?php endif;?>
        </div>

        <?php
        $messages_data = get_messages();
        $pagination = $messages_data['pagination'];

        //рисуем постаричную навигацию
        render_pagination_control($pagination);

        //рисуем сообщения
        foreach ($messages_data['res'] as $message) {
            include(__DIR__ . "/../layout/front-message.php");
        }

        //рисуем постаричную навигацию
        render_pagination_control($pagination);
        ?>
    </div>
</div>

<!-- Modal add new message-->
<div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактор сообщений</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-message.php" method="post">
                <div class="modal-body">
                    <label for="title">
                        Заголовок сообщения:
                    </label>
                    <br>
                    <input type="text" name="title" id="title">
                    <br>
                    <label for="editor1">Текст сообщения:</label>
                    <textarea name="message" id="editor1" rows="10" cols="80"></textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <input type="submit" value="Отправить" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal login-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пожалуйста представьтесь</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="authorization.php" method="post">
                <div class="modal-body">
                    <label for="name">
                        Ваше имя:
                    </label>
                    <br>
                    <input type="text" name="name" id="name">
                    <br>
                    <label for="email">
                        Ваша почта:
                    </label>
                    <br>
                    <input type="text" name="email" id="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <input type="submit" value="Авторизоватся" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="back-top">
    <a href="#"><span></span></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $('#back-top').hide();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
    $('#back-top a').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
</script>
</body>
</html>

