<!-- Content -->
<div class="container d-flex justify-content-center my-4 mb-5">

    <div id="mobile-box">
        <!-- Card -->
        <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <canvas id="myCanvas" width="300" height="50"></canvas>
                <script src="js/audio.js"></script>
                <div class="center1">
                    <svg class="center1"height="130" width="350">
                        <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%"
                            style="stop-color:rgb(255,255,0);stop-opacity:1" />
                            <stop offset="100%"
                            style="stop-color:rgb(255,0,0);stop-opacity:1" />
                        </linearGradient>
                        </defs>
                        <ellipse cx="300" cy="70" rx="305" ry="75" fill="url(#grad1)" />
                        <text fill="#ffffff" font-size="45" font-family="Verdana" x="50" y="86">
                            Română
                        </text>
                    </svg>
                </div>
                <a href="#!">
                    <div class="mask"></div>
                </a>
            </div>
            <div class="card-body text-center">

            <audio controls>
                <source src="media/pizza.mp3" type="audio/mpeg">
                our browser does not support the audio element.
                </audio>
            </div>
        </div>
        <!-- Card -->
    </div>
</div>
<!-- Content -->