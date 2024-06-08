<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Session indítása, ha még nem indult el
}

?>
<?php if (isset($_SESSION['message_ok']) || isset($_SESSION['message_nok'])): ?>
    <?php if (isset($_SESSION['message_nok'])): ?>
    <div class="alert alert-danger" role="alert">
    <h6><?php echo $_SESSION['message_nok']?></h6>
    </div>
    <?php unset($_SESSION['message_nok']) ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['message_ok'])): ?>
    <div class="alert alert-success" role="alert">
    <h4><?php echo $_SESSION['message_ok']?></h4>
    </div>
    <?php unset($_SESSION['message_ok']) ?>
    <?php endif; ?>
 <?php else:?>
   <!-- "Nincs üzenet a session változóban."; -->
<?php endif; ?>
