<div id="video-container" style="position: relative;overflow: hidden; height: 480px">
    <video
        autoplay
        loop="loop"
        muted
        id="teaser-video"
        class="teaser-video"
        playsinline=""
        onloadedmetadata="this.muted = true"
    >

        <source src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $destination->hero_video) }}" type="video/mp4">
    </video>
    <script>
        const video = document.getElementById('hero-video');
        video.oncanplaythrough = function () {
            video.muted = true;
            video.play();
        };
    </script>
    <div class="meta"
         style="position: absolute; bottom: 35%; left: 60px; color: #fff;display: flex;flex-direction: column;justify-content: flex-start;align-items: flex-start;font-weight: 500;z-index: 99;padding-right: 45px;">
        <div id="mute" class="btn"
             style="background-size: 50px; padding-bottom: 50px; padding-left: 50px; width: 5px; background-repeat: no-repeat;"></div>
    </div>
</div>
