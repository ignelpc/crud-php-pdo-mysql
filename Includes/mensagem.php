<div class="row">
<div class="col"></div>
<div class="col"></div>
<div class="col">
    <?php

    session_start();
    if (isset($_SESSION['mensagem'])) {
        $msg = $_SESSION['mensagem'];
        echo '<div id="hid" class="alert alert-success" role="alert">' . $msg . '</div>';
    }
    session_unset();

    ?>
</div>
</div>