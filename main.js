var imgs = ["image/banner.jpg", "image/banner1.jpg", "image/banner2.png"];
var index = 0;

function slide() {
  document.getElementById("img").src = imgs[index];
  index++;
  if (index == 3) {
    index = 0;
  }
}
setInterval(slide, 2000);
function next() {
  index++;
  if (index > 2) {
    index = 0;
  }
  document.getElementById("img").src = imgs[index];
}
function pre() {
  index--;
  if (index < 0) {
    index = 2;
  }
  document.getElementById("img").src = imgs[index];
}




