
<?php

require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");

?>
    
<!-- Home Page Body -->
<div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-3xl font-bold text-center mb-4">Edit a Note</h1>
    <p class="text-gray-700 text-center">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <label for="body">Description</label>
            <div>
                <textarea id="body" name="body"><?= $note['body'] ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>
            <p>
                <button type="submit">Update Note</button>
            </p>
            <p>
                <a href="/notes">Cancel</a>
            </p>                  
        </form>

        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit">Delete</button>
        </form> 
    </p>
</div> 

<?php

require base_path("views/partials/footer.php");

?>