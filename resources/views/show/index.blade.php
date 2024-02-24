<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>
    <head>
        <!-- Include other stylesheets and scripts -->

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include lightbox2 library (after jQuery) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    </head>
    <body>
        <br>
        <section class="bg-black">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <!-- Other content -->

                <div id="macy-container" class="macy-container grid grid-cols-2 md:grid-cols-3 gap-4 bg-black">
                    <?php
                    $directory = public_path('storage/images/posts/featured-images');
                    $files = scandir($directory);
                    $counter = 1;

                    foreach ($files as $file) {
                        // Exclude . and .. (current directory and parent directory)
                        if ($file !== '.' && $file !== '..') {
                            $filePath = asset("storage/images/posts/featured-images/$file");
                            echo "<a href='$filePath' data-lightbox='gallery' data-title='Image $counter'>
                                      <div class='image-container relative overflow-hidden'>
                                          <div class='loading-spinner hidden'></div>
                                          <img class='h-64 w-full object-cover rounded-lg grayscale transform transition-transform duration-300 hover:scale-105' 
                                          src='$filePath' alt=''>
                                          <div class='lightbox-caption absolute bottom-0 left-0 w-full bg-gray-800 text-white p-2'>
                                              Image $counter of " . (count($files) - 2) . "
                                          </div>
                                      </div>
                                  </a>";
                            $counter++;
                        }
                    }
                    ?>
                </div>

                <style>
                    .image-container {
                        position: relative;
                        transition: transform 0.3s ease-in-out;
                    }

                    .image-container img:hover {
                        filter: grayscale(0%);
                        transform: scale(1.05); /* Zoom in on hover */
                    }

                    .lightbox-caption {
                        opacity: 0.8;
                    }

                    .loading-spinner {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        border: 4px solid rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        border-top: 4px solid #3498db;
                        width: 30px;
                        height: 30px;
                        animation: spin 1s linear infinite;
                    }

                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var macyInstance = Macy({
                            container: '#macy-container',
                            trueOrder: false,
                            waitForImages: false,
                            margin: {
                                x: 20,
                                y: 20
                            },
                            columns: 3,
                            breakAt: {
                                1200: 2,
                                940: 1
                            }
                        });

                        // Triple click event to close lightbox
                        var clicks = 0;
                        document.body.addEventListener('click', function (event) {
                            clicks++;
                            if (clicks === 3) {
                                lightbox.end();
                                clicks = 0;
                            }

                            // Check if the click is on the left half of the page
                            if (event.clientX < window.innerWidth / 2) {
                                history.back();
                            }
                        });
                        
                        // Show loading spinner when an image is clicked
                        $('[data-lightbox="gallery"]').on('click', function() {
                            var spinner = $(this).find('.loading-spinner');
                            spinner.removeClass('hidden');
                        });

                        // Hide loading spinner when the lightbox is closed
                        lightbox.option({
                            'onClose': function () {
                                $('.loading-spinner').addClass('hidden');
                            }
                        });
                    });
                </script>
            </div><br><br>    
        </section>

        <!-- Other scripts -->
    </body>    
</x-app-layout>
