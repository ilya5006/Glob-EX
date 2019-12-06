<?php

$img = base64_encode(file_get_contents('ftp://user587s:CgIc6Wbt@user587s.beget.tech/Data/Картинки и баннеры/Логотипы/1.jpg'));
?>

<div class="content">
    <div class="slider_header">
        <h2> Бренды </h2>
        <div class="slide_left slide_anim"> <span>&#60;</span> </div>
        <div class="slide_right slide_anim"> <span>&#62;</span> </div>
    </div>
    <div class="scroll">
        <a href="#" class="brand"><img src="data:image/png;base64,<? echo $img; ?>"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
        <a href="#" class="brand"><img src="./resource/img/brands/1.jpg"></a>
    </div>
</div>