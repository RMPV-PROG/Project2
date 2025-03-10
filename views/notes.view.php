<?php
require "partials/nav.php";
require "partials/head.php";
dd($notes)
?>
    
<!-- Home Page Body -->
<div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-4">Notes page</h1>
    <p class="text-gray-700 text-center">
        <?php foreach ($notes as $note) : ?>
            <li><?= $note['body'] ?></li>
        <?php endforeach; ?>
    </p>
</div>
    
<?php

require "partials/footer.php";

?>