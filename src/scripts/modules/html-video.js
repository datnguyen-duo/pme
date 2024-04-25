import $ from 'jquery/src/jquery';
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export default () => {
    const nodeSelectors = {
        container: '[js-html-video="container"]',
    }

    function init() {
        if (!document.querySelector(nodeSelectors.container)) {
            return
        }

        const videosSections = document.querySelectorAll(nodeSelectors.container)

        if( videosSections ) {
            videosSections.forEach(function (videoHolder, index){
                let player
                let trigger = (videoHolder.dataset.trigger) ? videoHolder.dataset.trigger : videoHolder

                function initVideo() {
                    let el = videoHolder.getBoundingClientRect()
                    let elBottomPositionRelativeToPage = window.scrollY + el.bottom

                    if( elBottomPositionRelativeToPage > window.scrollY ) {
                        /**
                         In case if user refresh the page and page loading position is bellow the video holder
                         GSAP onEnter function will be fired and it will init(load) the video. Like that all videos above current scroll position will be loaded at once.
                         So in order to prevent this if statement is checking the element bottom position and document scroll position.
                         Like that video will be loaded only if user scrolled page to the video section from top or bottom side
                        **/

                        let htmlVideo = videoHolder.dataset.video
                        let htmlVideoType = videoHolder.dataset.videoType

                        if( htmlVideo) {
                            if( !$(videoHolder).find('video').length ) {
                                $(videoHolder).append(
                                    '<video playsinline="" muted="" autoplay="" loop="">' +
                                    '<source src="'+htmlVideo+'" type="'+htmlVideoType+'">' +
                                    'Your browser does not support the video tag.' +
                                    '</video>'
                                )
                            }

                            player = videoHolder.querySelector('video')
                        }
                    }
                }

                function playVideo() {
                    if( player ) {
                        videoHolder.classList.add('enabled')
                        player.play()
                    }
                }

                function pauseVideo() {
                    if( player ) {
                        videoHolder.classList.remove('enabled')
                        player.pause()
                    }
                }

                // load video tag
                ScrollTrigger.create({
                    trigger: trigger,
                    markers: false,
                    onEnter: function() {
                        initVideo();
                    },
                    onEnterBack: function () {
                        initVideo();
                    },
                    onLeaveBack: function () {
                        initVideo();
                    },
                });

                // play video
                // ScrollTrigger.create({
                //     trigger: trigger,
                //     markers: true,
                //     start: "20% 50%",
                //     end: "85% 50%",
                //     onEnter: function() {
                //         playVideo()
                //     },
                //     onEnterBack: function () {
                //         playVideo()
                //     },
                //     onLeave: function() {
                //         pauseVideo()
                //     },
                //     onLeaveBack: function () {
                //         pauseVideo()
                //     },
                // });
            })
        }
    }

    return Object.freeze({
        init,
    })
}