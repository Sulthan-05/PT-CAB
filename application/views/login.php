<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="min-h-screen bg-white relative overflow-hidden">
        <!-- Diagonal background -->
        <div
            class="absolute inset-0 bg-gradient-to-br from-cyan-700 to-cyan-900 transform -skew-y-6 origin-top-right z-0">
        </div>

        <div class="min-h-screen bg-white relative overflow-hidden">
            <!-- Diagonal background -->
            <div
                class="absolute inset-0 bg-gradient-to-br from-cyan-700 to-cyan-900 transform -skew-y-6 origin-top-right z-0">
            </div>

            <div class="min-h-screen flex relative z-10">
                <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                    <div class="mx-auto w-full max-w-sm lg:w-96 bg-white p-8 rounded-lg border border-gray-100">
                        <div>
                            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                                Login Ke akun
                            </h2>
                            <p class="mt-2 text-sm text-gray-600">
                                Selamat Datang
                            <div class="font-medium text-cyan-700 hover:text-cyan-600 border-b border-cyan-700 pb-0.5">
                                Silahkan Login
                            </div>
                            </p>
                        </div>
                        <?php if($this->session->flashdata('alert')) ?>
                        <div class="mt-8">
                            <div class="mt-6">
                                <form action="<?= base_url('auth/login') ?>" method="POST" class="space-y-6">
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">
                                            Username
                                        </label>                                        
                                        <div class="mt-1 relative rounded-md">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                </svg>
                                            </div>
                                            <input name="username" type="text" required
                                                class="appearance-none block w-full pl-10 pr-3 py-3 border-b-2 border-gray-200 placeholder-gray-400 focus:outline-none focus:border-cyan-700 sm:text-sm rounded-t-md bg-gray-50">
                                        </div>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            Password
                                        </label>
                                        <div class="mt-1 relative rounded-md">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fillRule="evenodd"
                                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                        clipRule="evenodd" />
                                                </svg>
                                            </div>
                                            <input id="password" name="password" type="password"
                                                autocomplete="current-password" required
                                                class="appearance-none block w-full pl-10 pr-3 py-3 border-b-2 border-gray-200 placeholder-gray-400 focus:outline-none focus:border-cyan-700 sm:text-sm rounded-t-md bg-gray-50">
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between">

                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-cyan-700 hover:bg-cyan-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block relative w-0 flex-1">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="max-w-md w-full p-6">
                            <div class="text-white text-center">
                                <h2 class="text-3xl font-bold mb-6">Welcome to our platform</h2>
                                <p class="text-cyan-100 mb-8">Discover a new way to manage your projects and collaborate
                                    with your team.</p>
                                <div class="flex justify-center space-x-3">
                                    <div class="h-3 w-3 rounded-full bg-white"></div>
                                    <div class="h-3 w-3 rounded-full bg-white opacity-60"></div>
                                    <div class="h-3 w-3 rounded-full bg-white opacity-30"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>