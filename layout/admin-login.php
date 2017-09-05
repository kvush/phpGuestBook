<?php
/**
 * Created by PhpStorm.
 * User: KVUSH-NBOOK
 * Date: 05.09.2017
 * Time: 14:30
 */
?>

<div class="row" style="margin-top: 100px;">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Вход в админ панель</h3>
            </div>
            <div class="panel-body">
                <form action="authorization.php" method="post">
                    <div class="modal-body">
                        <label for="name">
                            Имя: (admin)
                        </label>
                        <br>
                        <input type="text" name="name" id="name">
                        <br>
                        <label for="pass">
                            Пароль: (admin)
                        </label>
                        <br>
                        <input type="text" name="pass" id="pass">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                        <input type="submit" value="Авторизоватся" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
