    <!-- Navigation Bar -->
    <nav class="bg-blue-500 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-xl font-bold">My Website - <?= $page ?></a>
            <div class="flex items-center space-x-4">
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:underline <?= urlIs('/') ? 'text-yellow-300' : '';  ?> ">Home</a></li>
                    <li><a href="/about.php" class="hover:underline <?= urlIs('/about.php') ? 'text-yellow-300' : '';  ?>">About</a></li>
                    <li><a href="/contacts.php" class="hover:underline <?= urlIs('/contacts.php') ? 'text-yellow-300' : '';  ?>">Contact</a></li>
                </ul>
                <div id="authLinks" class="flex space-x-4">
                    <a href="#" class="bg-white text-blue-500 px-4 py-2 rounded-lg hover:bg-gray-200">Login</a>
                    <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Register</a>
                </div>
            </div>
        </div>
    </nav>