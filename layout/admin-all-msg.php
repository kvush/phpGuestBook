<?php
/**
 * Created by PhpStorm.
 * User: KVUSH-NBOOK
 * Date: 05.09.2017
 * Time: 15:12
 */?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Все сообщения
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">все сообщения</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">Титл</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">Сообщение</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">Дата</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">Статус</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">IP</th>
                                        <th class="sorting" tabindex="0" rowspan="1" colspan="1">User Agent</th>
                                        <th>Выключить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach (get_all_messages() as $message):?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?=$message['id']?></td>
                                        <td><?=htmlspecialchars($message['title'])?></td>
                                        <td><?=$message['message']?></td>
                                        <td><?=date("j F, Y, g:i a", $message['date']);?></td>
                                        <td><?=$message['status']?></td>
                                        <td><?=$message['ip']?></td>
                                        <td><?=$message['user_agent']?></td>
                                        <td><a href="hide-msg.php?id=<?=$message['id']?>"><span class="glyphicon glyphicon-eye-close"></span></a></td>
                                    </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
<!-- /.content -->
