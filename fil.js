  function shflip(arg) {
  // alert(arg);
    var post = document.getElementById(arg);
    var flipCardInner = post.querySelector('.flip-card-inner');

    if (flipCardInner.style.transform === "rotateY(180deg)") {
      flipCardInner.style.transform = "rotateY(0deg)";
    } else {
      flipCardInner.style.transform = "rotateY(180deg)";
    }
  }