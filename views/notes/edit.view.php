
<?php

require base_path("views/partials/head.php");
require base_path("views/partials/nav.php");

?>

    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg w-96">
        <h2 class="text-2xl font-bold mb-4 text-center">Edit a Note</h2>
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">

            <div class="mb-4">
                <label class="block text-gray-700">Note</label>
                <textarea name="body" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" rows="4"><?= $note['body'] ?? ''  ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Update Note</button>
        </form>
        <p>
            <a href="/notes">Cancel</a>
        </p> 
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit">Delete</button>
        </form> 
    </div>

<?php

require base_path("views/partials/footer.php");

?>