<html>
    <head>
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Login</title>
    </head>
    <body>
        <!--Background with gradient-->
        <div class="bg-teal-400 absolute top-0 left-0 bg-gradient-to-b from-teal-700 via-teal-500 to-teal-400 bottom-0 leading-5 h-full w-full overflow-hidden">
        </div>

        <div class="relative   min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-3xl shadow-xl">
            <div class="flex-col flex  self-center lg:px-14 sm:max-w-4xl xl:max-w-md  z-10">
                <div class="self-start hidden lg:flex flex-col  text-gray-300">
                    <h1 class="my-3 font-semibold text-4xl"></h1>
                    <p class="pr-3 text-sm opacity-75"></p>
                </div>
            </div>
            <!--Form-->
            <div class="flex justify-center self-center  z-10">
                <div class="p-12 bg-white mx-auto rounded-3xl w-96 br-10 md:mb-0 border border-teal-400">
                    <form action="" method="post">
                        
                        <div class="mb-7">
                            <h3 class="font-semibold text-2xl text-gray-800">Sign Up</h3>
                            <p class="text-gray-400">You already have an account? 
                                <a href="login" class="text-sm text-teal-700 hover:text-teal-700">Sign In</a></p>
                        </div>

                        <div class="space-y-6">
                            <!--Box utente-->
                            <div class="">
                                <input name="email" class=" w-full text-sm  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg 
                                focus:outline-none focus:valid:border-green-400  focus:invalid:border-red-400" type="email" placeholder="Email" required>
                            </div>

                            <div class="relative">
                                <!--Box password-->
                                <input name="pwd" id="password" placeholder="Password" type="password" class="text-sm text-black-200 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-teal-400" required>
                                <div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">
                                </div>
                            </div>

                            <div class="relative">
                                <!--Box password verifica-->
                                <input placeholder="Repeat password" oninput="check(this)" type="password" class="text-sm text-black-200 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200
                                focus:outline-none focus:valid:border-green-400  focus:invalid:border-red-400" required>
                                <div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">
                                </div>
                            </div>
                            <script language='javascript' type='text/javascript'>
                                function check(input) {
                                  if (input.value != document.getElementById('password').value) {
                                    input.setCustomValidity('Password does not match');
                                  } else {
                                    input.setCustomValidity('');
                                  }
                                }
                            </script>
                            <div class="flex items-center justify-between">
                                <div class="text-sm ml-auto">
                                    <a href="#" class="text-red-400">
                                        <?php echo $errore; ?>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="w-full flex justify-center bg-teal-800  hover:bg-teal-700 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <svg class="absolute bottom-0 left-0 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,0L40,42.7C80,85,160,171,240,197.3C320,224,400,192,480,154.7C560,117,640,75,720,74.7C800,75,880,117,960,154.7C1040,192,1120,224,1200,213.3C1280,203,1360,149,1400,122.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
    </body>
</html>