<?php
$this->layout('../master', ['title' => 'Index']); ?>

<section>
    <div class="alert">
        <h1><i class="fa-regular fa-bell fa-shake"></i> Atenção! Tarefa atrasada: <?= $taskLate; ?></h1>
    </div>

    <div class="content">
        <div class="group">
            <div class="groupLine">
                <div class="col-group-line">
                    <h4>Registrar</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-plus" style="color: #ffffff;"></i></a>
                    </div>
                </div>

                <div class="col-group-line">
                    <h4>Trabalho</h4>
                    <div class="icon">
                        <a href="/task/showCategory/trabalho"><i class="fa-solid fa-business-time fa-sm" style="color: #ffffff;"></i></i></a>
                    </div>
                </div>

                <div class="col-group-line">
                    <h4>Lazer</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-umbrella-beach fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>
            </div>

            <div class="groupLine">
                <div class="col-group-line">
                    <h4>Estudo</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-desktop fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>
                <div class="col-group-line">
                    <h4>Pessoal</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-tag fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>
                <div class="col-group-line">
                    <h4>Saúde</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-dumbbell fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>
            </div>

            <div class="groupLine">
                <div class="col-group-line">
                    <h4>Finanças</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-credit-card fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>

                <div class="col-group-line">
                    <h4>Projetos</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-code fa-sm" style="color: #ffffff;"></i></i></a>
                    </div>
                </div>

                <div class="col-group-line">
                    <h4>Concluídas</h4>
                    <div class="icon">
                        <a href="/task/create"><i class="fa-solid fa-check fa-sm" style="color: #ffffff;"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="list">
            <ul>
                <?php foreach ($taskListFive as $task) { ?>
                    <li><i class="fa-thin fa-square fa-xs" style="color: #1969ca"></i> <?= $task->name; ?></li>
                    <li><i class="fa-thin fa-square fa-xs" style="color: #1969ca"></i>TesteTeste</li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="alert-recent">
        <h1>Tarefa mais recente: <?= $taskRecent->name; ?></h1>
    </div>
</section>