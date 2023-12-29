<?php

session_destroy();
echo "<script>
        window.location = '" . $_ENV['BASE_URL'] . "login';
    </script>";
 