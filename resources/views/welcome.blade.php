<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">


            <!DOCTYPE html>
            <html lang="en">
            <head>

                <!-- GENERAL METAS -->
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


                <!-- WEBSITE TITLE -->
                <title>THE AUTOSCRIPT - Speech To Text Converter</title>


                <!-- INCLUDE CSS FILES -->

                <link rel="stylesheet" href={{ asset('distr/css/bootstrap.min.css') }}>
                <link rel="stylesheet" href={{ asset('distr/css/all.min.css') }}>
                <!--<link rel="stylesheet" href="distr/css/main.css">-->

                <!-- INCLUDE FONTS -->
                <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700,800" rel="stylesheet">


            </head>
            <body>


                <!-- MAIN SECTION -->
                <section id="section">

                    <!-- CONTAINER FOR SECTION TITLE -->
                    <div class="container-fluid" id="title">

                        <div class="row">

                            <div class="col-md-12">

                                <!-- SECTION TITLE -->
                                <div class="text-center">

                                    <div>

                                        <h3><span class="highlight">THE AUTOSCRIPT</span> Speech to Text Converter</h3>

                                        <h6>Transcribe all your audio files quickly or create a live transcribed text</h6>

                                    </div>

                                </div> <!-- END SECTION TITLE -->

                            </div>

                        </div>

                    </div> <!-- END CONTAINER FOR SECTION TITLE -->




                    <!-- CONTAINER FOR DEMO BOX -->

                    <div class="container" id="demo">


                        <!-- TITLE -->
                        <div class="text-center">

                            <div>
                                <h3>Launch our Free Trials</h3>
                                <hr>
                            </div>

                        </div> <!-- TITLE -->



                        <div class="row">


                            @if (Route::has('login'))
                            <!-- LIVE TRANSCRIBE BOX -->
                            <div class="col-md-6 box-wrapper text-center">

                                <h6>Live <span>Transcribe</span></h6>

                                <div class="box box1">

                                    <!-- BOX HOVER EFFECT -->
                                    <div class="box-hover"></div>

                                    <!-- MASKED ACTION CONTENT -->
                                    <div class="box-button">

                                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                                    </div> <!-- END MASKED ACTION CONTENT -->

                                </div>

                                <p>*6 Different Languages & Dialects</p>

                            </div> <!-- END LIVE TRANSCRIBE BOX -->



                            <!-- FILE TRANSCRIBE BOX -->
                            <div class="col-md-6 box-wrapper text-center">

                                <h6>File Upload <span>Transcribe</span></h6>

                                <div class="box box2">

                                    <!-- BOX HOVER EFFECT -->
                                    <div class="box-hover"></div>

                                    <!-- MASKED ACTION CONTENT -->
                                    <div class="box-button">

                                        @auth
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    @endauth
                                    </div> <!-- END MASKED ACTION CONTENT -->

                                </div>

                                <p>*29 Different Languages & Dialects</p>

                            </div> <!-- END FILE TRANSCRIBE BOX -->

@endif

                        </div> <!-- END ROW -->


                    </div> <!-- END CONTAINER FOR DEMO BOX-->



                    <!-- CONTAINER FOR FEATURES -->
                    <div class="container-fluid" id="features">


                            <!-- TITLE -->
                            <div class="text-center">

                                <div>
                                    <h3>THE AUTOSCRIPT<span class="highlight"> Features</span></h3>
                                </div>

                            </div>



                            <div class="row">


                                <!-- AMAZON TRANSCRIBE FEATURE -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Transcribe streaming audio</p>
                                        <p>with http/2 and websockets</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURE -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Supports over</p>
                                        <p>29 Different Languages & Accents</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->



                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Support for various audio extentions</p>
                                        <p>MP3 | MP4 | WAV | FLAC</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Maximum audio file length</p>
                                        <p>up to 4 hours</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Maximum audio file size</p>
                                        <p>up to 2GB in size</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Support for custom vocabulary</p>
                                        <p>up to 50KB in size</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Up to 60Min/Month Free</p>
                                        <p>During Free Tier</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center">

                                    <div class="feature">

                                        <p>Payment Method</p>
                                        <p>Pay as you go model</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center no-btm-mg">

                                    <div class="feature">

                                        <p>Backend Via</p>
                                        <p>Deep Learning Process (ASR)</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center no-btm-mg">

                                    <div class="feature">

                                        <p>Billed monthly</p>
                                        <p>at a rate of $0.0004/second</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center no-btm-mg">

                                    <div class="feature">

                                        <p>Minimum charge</p>
                                        <p>15 seconds per request</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                                <!-- AMAZON TRANSCRIBE FEATURES -->
                                <div class="col-md-3 text-center no-btm-mg">

                                    <div class="feature">

                                        <p>Fully Customizable</p>
                                        <p>Easy to Implement</p>

                                    </div>

                                </div> <!-- END AMAZON TRANSCRIBE FEATURE -->


                            </div> <!-- END ROW -->


                            <!-- AWS LOGO -->
                            <!--<div class="row text-center">

                                <div class="col-md-12" id="logo">

                                    <img src="distr/img/aws-white.png" alt="">

                                </div>

                            </div> --><!-- END AWS LOGO -->


                    </div> <!-- END CONTAINER FOR FEATURES -->




                    <!-- CONTANER FOR SUPPORTED LANGUAGES -->
                    <div class="container" id="languages">


                        <!-- TITLE -->
                        <div class="text-center">

                            <div>
                                <h3>Supported <span>Live Transcribe</span> Languages</h3>
                            </div>

                        </div>


                        <div class="row">


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/au.svg" alt="">

                                </div>

                                <h6>Australian English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/gb.svg" alt="">

                                </div>

                                <h6>British English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/us.svg" alt="">

                                </div>

                                <h6>US English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/us.svg" alt="">

                                </div>

                                <h6>US Spanish</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/fr.svg" alt="">

                                </div>

                                <h6>French</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ca.svg" alt="">

                                </div>

                                <h6>Canadian French</h6>

                            </div> <!-- END LANGUAGE -->

                        </div>



                        <!-- TITLE -->
                        <div class="text-center">

                            <div>
                                <h3>Supported <span>Async Transcribe</span> Languages</h3>
                            </div>

                        </div>



                        <div class="row">


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ae.svg" alt="">

                                </div>

                                <h6>Gulf Arabic</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/sa.svg" alt="">

                                </div>

                                <h6>Modern Standard Arabic</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/cn.svg" alt="">

                                </div>

                                <h6>Chinese Mandarin - Mainland</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/nl.svg" alt="">

                                </div>

                                <h6>Dutch</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/au.svg" alt="">

                                </div>

                                <h6>Australian English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/gb.svg" alt="">

                                </div>

                                <h6>British English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/in.svg" alt="">

                                </div>

                                <h6>Indian English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ie.svg" alt="">

                                </div>

                                <h6>Irish English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/scotland.svg" alt="">

                                </div>

                                <h6>Scottish English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/us.svg" alt="">

                                </div>

                                <h6>US English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img id="welsh" src="distr/flags/4x3/welsh.jpg" alt="">

                                </div>

                                <h6>Welsh English</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/es.svg" alt="">

                                </div>

                                <h6>Spanish</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/us.svg" alt="">

                                </div>

                                <h6>US Spanish</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/fr.svg" alt="">

                                </div>

                                <h6>French</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ca.svg" alt="">

                                </div>

                                <h6>Canadian French</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ir.svg" alt="">

                                </div>

                                <h6>Farsi</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/de.svg" alt="">

                                </div>

                                <h6>German</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ch.svg" alt="">

                                </div>

                                <h6>Swiss German</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/il.svg" alt="">

                                </div>

                                <h6>Hebrew</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/id.svg" alt="">

                                </div>

                                <h6>Indonesian</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/it.svg" alt="">

                                </div>

                                <h6>Italian</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/jp.svg" alt="">

                                </div>

                                <h6>Japanese</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/kr.svg" alt="">

                                </div>

                                <h6>Korean</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/my.svg" alt="">

                                </div>

                                <h6>Malay</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/pt.svg" alt="">

                                </div>

                                <h6>Portuguese</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/br.svg" alt="">

                                </div>

                                <h6>Brazilian Portuguese</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/ru.svg" alt="">

                                </div>

                                <h6>Russian</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/in.svg" alt="">

                                </div>

                                <h6>Indian Hindi</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/in.svg" alt="">

                                </div>

                                <h6>Tamil</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center">

                                <div class="flag">

                                    <img src="distr/flags/4x3/in.svg" alt="">

                                </div>

                                <h6>Telugu</h6>

                            </div> <!-- END LANGUAGE -->


                            <!-- LANGUAGE -->
                            <div class="col-md-3 text-center no-btm-mg">

                                <div class="flag">

                                    <img src="distr/flags/4x3/tr.svg" alt="">

                                </div>

                                <h6>Turkish</h6>

                            </div> <!-- END LANGUAGE -->


                        </div>

                    </div> <!-- END CONTANER FOR SUPPORTED LANGUAGES -->






                    <!-- COPYRIGHT -->
                    <div class="container-fluid" id="copyright">

                        <div class="row">

                            <div class="col-md-12">

                                <!-- SECTION TITLE -->
                                <div class="text-center">

                                    <p>Copyright &copy; 2021 <span>Dotmart_Codes</span></p>
                                    <!--<p>Amazon Transcribe is a service that belongs to Amazon Web Services &trade;</p>-->

                                </div> <!-- END SECTION TITLE -->

                            </div>

                        </div>

                    </div> <!-- END COPYRIGHT -->



            </body>
            </html>
