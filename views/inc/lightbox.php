<?php

    class Lightbox {

        public static function showLightbox($img) {
            echo '
            <div id="lightbox" class="lightbox-modal">
                <div class="lightbox-modal-inner">
                    <span class="lightbox-close pointer" onclick="closeLightbox()">&times;</span>
                    <div class="lightbox-modal-content">
                        <div class="lightbox-slide">
                            <img src="'.$img.'" class="lightbox-image-slide" alt="" />
                        </div>
                        <div class="lightbox-slide">
                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                        </div>    
                        <div class="lightbox-slide">
                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                        </div>
                        <div class="lightbox-slide">
                            <img src="app/public/img/default.jpg" class="lightbox-image-slide" alt="" />
                        </div>
                
                        <div class="lightbox-dots">
                            <div class="lightbox-col">
                                <img src="'.$img.'" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(1)" alt="" />
                            </div>
                            <div class="lightbox-col">
                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(2)" alt="" />
                            </div>
                            <div class="lightbox-col">
                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(3)" alt="" />
                            </div>
                            <div class="lightbox-col">
                                <img src="app/public/img/default.jpg" class="lightbox-modal-preview lightbox-hover-shadow" onclick="toSlideLightbox(4)" alt="" />
                            </div>
                        </div>
                    </div>
                    <a class="lightbox-previous" onclick="changeSlideLightbox(-1)">&#10094;</a>
                        <a class="lightbox-next" onclick="changeSlideLightbox(1)">&#10095;</a>
                </div>
            </div>
            ';
        }
    }
?>