var img = document.getElementsByTagName('img');

for (var i = 0; i < img.length; i++) {
    img[i].onclick = function() {
        this.style.height = '300px';
        this.style.width = '300px';
    };

    img[i].onmouseout = function() {
        this.style.height = '35px';
        this.style.width = '35px';
    };
}


